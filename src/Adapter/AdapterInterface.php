<?php

namespace Dspacelabs\Component\Filesystem\Adapter;

use Dspacelabs\Component\Filesystem\StreamWrapperInterface;

/**
 * Adapter Interface
 *
 * All Adapters MUST implement this interface
 */
interface AdapterInterface //extends StreamWrapperInterface
{
    public function stream_open($path, $mode, $options, &$openedPath);
    public function stream_read($bytes);
    public function stream_write($data);
    public function stream_eof();
    public function stream_seek($offset, $whence = SEEK_SET);
    public function stream_flush();
}
