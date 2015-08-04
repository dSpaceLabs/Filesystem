<?php

namespace Dspacelabs\Component\Filesystem;

use Dspacelabs\Component\Filesystem\Adapter\AdapterInterface;

class Filesystem
{
    /**
     * just a thought
     */
    const MODE_READ   = 1;
    const MODE_WRITE  = 2;
    const MODE_APPEND = 4;
    const MODE_CREATE = 8;

    /**
     * @var Filesystem
     */
    protected $instance;

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var string
     */
    protected $protocol = 'dspace';

    /**
     * @param AdapterInterface
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        $this->register();
    }

    /**
     * Registers the dspace scheme
     */
    protected function register()
    {
        if (in_array($this->protocol, stream_get_wrappers())) {
            stream_wrapper_unregister($this->protocol);
        }

        stream_wrapper_register($this->protocol, '\Dspacelabs\Component\Filesystem\StreamWrapper', STREAM_IS_URL);

        $default = stream_context_get_options(stream_context_get_default());
        $default[$this->protocol]['adapter'] = $this->adapter;
        // There could be a logger here as well
        // $default[$this->protocol]['logger'] = $logger;
        // @TODO implement cache interface from Cache component
        // $default[$this->protocol]['cache'] = $cacheInterface;

        stream_context_set_default($default);
    }
}
