<?php

namespace Dspacelabs\Component\Filesystem;

/**
 * Stream Wrapper Interface
 *
 * @link http://php.net/manual/en/class.streamwrapper.php
 */
interface StreamWrapperInterface
{
    /**
     * Construct a new StreamWrapper
     *
     * Is called right before `stream_open`
     */
    //public function __construct();

    /**
     * Destructs the StreamWrapper
     */
    //public function __destruct();

    /**
     * Closes a directory handle
     *
     * @see closedir()
     *
     * @return boolean
     *   Returns true if successful
     */
    public function dir_closedir();

    /**
     * Opens a directory handle
     *
     * @see opendir()
     *
     * @param string $path
     * @param integer $options
     * @return boolean
     */
    public function dir_opendir($path, $options);

    /**
     * Read entry from directory handle
     *
     * @see readdir()
     *
     * @return string|false
     *   Returns the path and filename of next file, if there is no next file
     *   this will return false
     */
    public function dir_readdir();

    /**
     * Rewind directory handle
     *
     * @see rewinddir()
     *
     * @return boolean
     */
    public function dir_rewinddir();

    /**
     * Create a new directory
     *
     * @see mkdir()
     *
     * @param string $path
     * @param integer $mode
     * @param integer $options
     * @return boolean
     */
    public function mkdir($path, $mode, $options);

    /**
     * Rename a file or directory
     *
     * @see rename()
     * @param string $from
     * @param string $to
     * @return boolean
     */
    public function rename($from, $to);

    /**
     * Remove a directory
     *
     * @see rmdir()
     * @param string $path
     * @param integer $options
     */
    public function rmdir($path, $options);

    /**
     * @see stream_select()
     * @param integer $castAs
     * @return resource|false
     */
    public function stream_cast($castAs);

    /**
     * Close a resource
     *
     * @see fclose()
     */
    public function stream_close();

    /**
     * Tests for End-Of-File on a file pointer
     *
     * @see feof()
     * @return boolean
     */
    public function stream_eof();

    /**
     * Flushs the output
     *
     * @see fflush()
     * @return boolean
     */
    public function stream_flush();

    /**
     * @see flock()
     * @param integer $operation
     * @return boolean
     */
    public function stream_lock($operation);

    /**
     * @param string $path
     * @param integer $options
     * @param mixed $value
     * @return boolean
     */
    public function stream_metadata($path, $options, $value);

    /**
     * Opens file or URL
     *
     * @param string $path
     * @param string $mode
     * @param integer $options
     * @param string $openedPath
     * @return boolean
     */
    public function stream_open($path, $mode, $options, &$openedPath);

    /**
     * Read from stream
     *
     * @param integer $count
     *   How many bytes to read
     * @return string|false
     */
    public function stream_read($count);

    /**
     * @param integer $offset
     * @param integer $whence
     * @return boolean
     */
    public function stream_seek($offset, $whence = SEEK_SET);

    /**
     * @param integer $option
     * @param integer $arg1
     * @param integer $arg2
     * @return boolean
     */
    public function stream_set_option($option, $arg1, $arg2);

    /**
     * @return array
     */
    public function stream_stat();

    /**
     * @return integer
     */
    public function stream_tell();

    /**
     * @param integer $size
     * @return boolean
     */
    public function stream_truncate($size);

    /**
     * @param string $data
     * @return integer
     */
    public function stream_write($data);

    /**
     * @param string $path
     * @return boolean
     */
    public function unlink($path);

    /**
     * Retrieve information about a file
     *
     * @param string $path
     * @param integer $flags
     * @return array
     */
    public function url_stat($path, $flags);
}
