<?php

namespace Dspacelabs\Component\Filesystem;

use Dspacelabs\Component\Filesystem\Adapter\AdapterInterface;
use Psr\Log\LoggerInterface;

/**
 * Filesystem
 */
class Filesystem implements FilesystemInterface
{
    /**
     * @var string
     */
    const PROTOCOL = 'dspace';

    /**
     * @var \Dspacelabs\Component\Filesystem\Adapter\AdapterInterface
     */
    protected $adapter;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * Creates a new instance of Filesystem
     *
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

        /**
         * It might be worth putting a caching layer in
         */
        //$default[self::PROTOCOL]['cache']  = $this->cache;

        stream_context_set_default($default);
    }
}
