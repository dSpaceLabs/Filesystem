<?php

namespace Dspacelabs\Component\Filesystem;

use Dspacelabs\Component\Filesystem\Filesystem;

class StreamWrapper implements StreamWrapperInterface
{
    /**
     * @var resource
     */
    public $context;

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        $defaults      = stream_context_get_options(stream_context_get_default());
        $this->adapter = $defaults[Filesystem::PROTOCOL]['adapter'];
        $this->logger  = $defaults[Filesystem::PROTOCOL]['logger'];
        $this->logger->debug(__METHOD__);
    }

    /**
     * {@inheritDoc}
     */
    public function __destruct()
    {
        $this->logger->debug(__METHOD__);
    }

    /**
     * {@inheritDoc}
     */
    public function dir_closedir()
    {
        $this->logger->debug(__METHOD__);

        return $this->adapter->dir_closedir();
    }

    /**
     * {@inheritDoc}
     */
    public function dir_opendir($path, $options)
    {
        $path = str_replace(Filesystem::PROTOCOL.':/', '', $path);
        $this->logger->debug(__METHOD__, array(
            'path'    => $path,
            'options' => $options,
        ));

        return $this->adapter->dir_opendir($path, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function dir_readdir()
    {
        $this->logger->debug(__METHOD__);

        return $this->adapter->dir_readdir();
    }

    /**
     * {@inheritDoc}
     */
    public function dir_rewinddir()
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function mkdir($path, $mode, $options)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function rename($from, $to)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function rmdir($path, $options)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_cast($castAs)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_close()
    {
        $this->logger->debug(__METHOD__);
        $this->adapter->stream_close();
    }

    /**
     * {@inheritDoc}
     */
    public function stream_eof()
    {
        $this->logger->debug(__METHOD__);

        return $this->adapter->stream_eof();
    }

    /**
     * {@inheritDoc}
     */
    public function stream_flush()
    {
        $this->logger->debug(__METHOD__);

        return $this->adapter->stream_flush();
    }

    /**
     * {@inheritDoc}
     */
    public function stream_lock($operation)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_metadata($path, $options, $value)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_open($path, $mode, $options, &$openedPath)
    {
        // Drop the protocol
        $path = str_replace(Filesystem::PROTOCOL.':/', '', $path);
        $this->logger->debug(__METHOD__, array(
            'path'    => $path,
            'mode'    => $mode,
            'options' => $options
        ));

        if (!$this->adapter->stream_open($path, $mode, $options, $openedPath)) {
            throw new \Exception('Something dun fucked up');
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function stream_read($count)
    {
        $this->logger->debug(__METHOD__, array(
            'count' => $count,
        ));

        return $this->adapter->stream_read($count);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_seek($offset, $whence = SEEK_SET)
    {
        $this->logger->debug(__METHOD__);
        return $this->adapter->stream_seek($offset, $whence);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_set_option($option, $arg1, $arg2)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_stat()
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_tell()
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_truncate($size)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_write($data)
    {
        $this->logger->debug(__METHOD__, array(
            'data' => $data,
        ));

        return $this->adapter->stream_write($data);
    }

    /**
     * {@inheritDoc}
     */
    public function unlink($path)
    {
        $this->logger->debug(__METHOD__);
        $this->logger->debug(__METHOD__.' Not Implemented');

        trigger_error('Not Implemented', E_USER_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function url_stat($path, $flags)
    {
        $this->logger->debug(__METHOD__, array(
            'path'  => $path,
            'flags' => $flags,
        ));

        return $this->adapter->url_stat($path, $flags);
    }
}
