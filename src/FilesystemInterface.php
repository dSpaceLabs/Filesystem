<?php

namespace Dspacelabs\Component\Filesystem;

/**
 */
interface FilesystemInterface
{
    /**
     * @param string $filename
     * @param string $mode
     * @param boolean $useIncludePath
     * @param resource $context
     * @return resource|false
     */
    public function fopen($filename, $mode, $useIncludePath = false, $context = null);

    /**
     * @param string $filename
     * @param boolean $useIncludePath
     * @param resource $context
     * @param integer $offset
     * @param integer $maxlength
     * @return string|false
     */
    public function fileGetContents($filename, $useIncludedPath = false, $context = null, $offset = -1, $maxlength = -1);

    /**
     * @param resource $handle
     */
    public function closedir($handle);

    /**
     * @param string $path
     * @param resource $context
     * @return resource|false
     */
    public function opendir($path, $context = null);

    public function readdir($handle);

    public function rewinddir($handle);

    public function mkdir($path, $mode = 0777, $recursive = false, $context = null);

    public function rename($from, $to, $context = null);

    public function rmdir($path, $context = null);

    public function fclose($handle);

    public function feof($handle);

    public function fflush($handle);

    public function flock($handle, $operation, &$wouldBlock = null);

    public function filePutContents($filename, $data, $flags = 0, $context = null);

    public function touch($filename, $time = -1, $atime = -1);

    public function chmod($filename, $mode);

    public function chown($filename, $user);

    public function chgrp($filename, $group);

    public function fread($handle, $length);

    public function fgets($handle, $length = -1);

    public function fseek($handle, $offset, $whence = SEEK_SET);

    public function fstat($handle);
}
