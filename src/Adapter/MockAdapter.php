<?php

namespace Dspacelabs\Component\Filesystem\Adapter;

/**
 * Mock Adapter
 *
 * Used for testing and some other edge cases
 */
class MockAdapter implements AdapterInterface
{
    protected $pointer;

    /**
     * {@inheritDoc}
     */
    public function eof()
    {
        if (null === $this->pointer) {
            $this->pointer = false;
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function open($path, $mode)
    {
        $pointer = new \SplFileInfo($path);
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function flush()
    {
        return true;
    }

    public function read($bytes)
    {
        return false;
    }

    public function stat($path, $flags)
    {
        return array(
            'dev'     => 0,
            'ino'     => 0,
            'mode'    => 0,
            'nlink'   => 0,
            'uid'     => 0,
            'gid'     => 0,
            'rdev'    => 0,
            'size'    => 0,
            'atime'   => 0,
            'mtime'   => 0,
            'ctime'   => 0,
            'blksize' => 0,
            'blocks'  => 0,
        );
    }
}
