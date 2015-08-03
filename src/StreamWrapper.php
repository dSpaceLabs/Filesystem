<?php

namespace Dspacelabs\Component\Filesystem;

abstract class StreamWrapper implements StreamWrapperInterface
{
    /**
     * {@inheritDoc}
     */
    public function dir_closedir()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function dir_opendir($path, $options)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function dir_readdir()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function dir_rewinddir()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function mkdir($path, $mode, $options)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function rename($from, $to)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function rmdir($path, $options)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_cast($castAs)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_close()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_eof()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_flush()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_lock($operation)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_metadata($path, $options, $value)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_open($path, $mode, $options, &$openedPath)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_read($count)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_seek($offset, $whence = SEEK_SET)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_set_option($option, $arg1, $arg2)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_stat()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_tell()
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_truncate($size)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_write($data)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function unlink($path)
    {
        trigger_error('Not Implemented', E_WARNING);
    }

    /**
     * {@inheritDoc}
     */
    public function url_stat($path, $flags)
    {
        trigger_error('Not Implemented', E_WARNING);
    }
}
