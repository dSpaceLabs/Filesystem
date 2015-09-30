<?php
/**
 */

namespace Dspacelabs\Component\Filesystem\Adapter;

/**
 * Local Adapter
 *
 * Used for handling files on the local filesystem
 *
 * Usage:
 * ```php
 * ```
 */
class LocalAdapter implements AdapterInterface
{
    /**
     * The prefix is added to all paths
     *
     * @param string
     */
    protected $prefix;

    /**
     * @var resource
     */
    private $handler;

    /**
     * @param string $prefix
     */
    public function __construct($prefix = '/')
    {
        $this->setPrefix($prefix);
    }

    /**
     * Used to normalize the prifix so it always has same
     * format
     */
    protected function setPrefix($prefix)
    {
        if ('/' === substr($prefix, -1, 1)) {
            $prefix = substr($prefix, 0, (strlen($prefix) - 1));
        }

        $this->prefix = $prefix;
    }

    /**
     * {@inheritDoc}
     */
    public function stream_open($path, $mode, $options, &$openedPath)
    {
        $parts = explode('://', $path);
        $fileInfo = new \SplFileInfo($this->prefix.'/'.$parts[1]);

        $this->handle = fopen($this->prefix.'/'.$parts[1]);

        // Check and make sure the file was opened and if it was not
        // than we need to return false
        if (null === $this->handle) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function stream_read($bytes)
    {
        return fread($this->handle, $bytes);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_write($data)
    {
        return fwrite($this->handle, $data);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_eof()
    {
        return feof($this->handle);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_stat()
    {
        return fstat($this->handle);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_flush()
    {
        return fflush($this->handle);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_seek($offset, $whence = SEEK_SET)
    {
        return fseek($this->handle, $offset, $whence);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_close()
    {
        return fclose($this->handle);
    }

    /**
     * {@inheritDoc}
     */
    public function dir_opendir($path, $options)
    {
        $path = $this->prefix.'/'.$path;

        if ($this->handler = opendir($path)) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function dir_readdir()
    {
        return readdir($this->handler);
    }

    /**
     * {@inheritDoc}
     */
    public function dir_closedir()
    {
        return closedir($this->handler);
    }

    /**
     * {@inheritDoc}
     */
    public function url_stat($path, $flags)
    {
        $parts = explode('://', $path);
        $path  = $this->prefix.'/'.$parts[1];

        if ($flags & STREAM_URL_STAT_QUIET || !file_exists($path)) {
            return @stat($path);
        }
        else {
            return stat($path);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function mkdir($path, $mode, $options)
    {
        $parts = explode('://', $path);
        $path  = $this->prefix.'/'.$parts[1];

        return mkdir($path, $mode, true);
    }
}
