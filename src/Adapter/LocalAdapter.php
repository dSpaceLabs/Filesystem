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
     * @param string $prefix
     */
    public function __construct($prefix = '/')
    {
        $this->prefix = $prefix;
    }

    /**
     * {@inheritDoc}
     */
    public function stream_open($path, $mode, $options, &$openedPath)
    {
        $fileInfo = new \SplFileInfo($this->prefix.$path);

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
}
