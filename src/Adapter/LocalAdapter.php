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
     * @var \SplFileObject
     */
    private $file;

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

        $this->file = $fileInfo->openFile($mode);

        // Check and make sure the file was opened and if it was not
        // than we need to return false
        if (null === $this->file) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function stream_read($bytes)
    {
        return $this->file->fread($bytes);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_write($data)
    {
        return $this->file->fwrite($data);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_eof()
    {
        return $this->file->eof();
    }

    /**
     * {@inheritDoc}
     */
    public function stream_flush()
    {
        return $this->file->fflush();
    }

    /**
     * {@inheritDoc}
     */
    public function stream_seek($offset, $whence = SEEK_SET)
    {
        return $this->file->fseek($offset, $whence);
    }

    /**
     * {@inheritDoc}
     */
    public function stream_close()
    {
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
}
