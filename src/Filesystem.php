<?php

namespace Dspacelabs\Component\Filesystem;

use Dspacelabs\Component\Filesystem\Adapter\AdapterInterface;
use Psr\Log\LoggerInterface;

class Filesystem implements FilesystemInterface
{
    /**
     * just a thought
     */
    const MODE_READ   = 1;
    const MODE_WRITE  = 2;
    const MODE_APPEND = 4;
    const MODE_CREATE = 8;

    /**
     * @var string
     */
    const PROTOCOL = 'dspace';

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @param AdapterInterface
     */
    public function __construct(AdapterInterface $adapter, LoggerInterface $logger = null)
    {
        $this->adapter = $adapter;
        $this->logger  = $logger;

        if (null === $this->logger) {
            $this->logger = new \Psr\Log\NullLogger();
        }

        $this->register();
    }

    /**
     * Registers the dspace scheme
     */
    protected function register()
    {
        if (in_array(self::PROTOCOL, stream_get_wrappers())) {
            stream_wrapper_unregister(self::PROTOCOL);
        }

        stream_wrapper_register(self::PROTOCOL, '\Dspacelabs\Component\Filesystem\StreamWrapper', STREAM_IS_URL);

        $default = stream_context_get_options(stream_context_get_default());

        $default[self::PROTOCOL]['adapter'] = $this->adapter;
        $default[self::PROTOCOL]['logger']  = $this->logger;
        //$default[self::PROTOCOL]['cache']  = $this->cache;

        stream_context_set_default($default);
    }
}
