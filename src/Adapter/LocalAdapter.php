<?php

namespace Dspacelabs\Component\Filesystem\Adapter;

class LocalAdapter implements AdapterInterface
{
    /**
     * @param string
     */
    protected $prefix;

    /**
     * @param string $prefix
     */
    public function __construct($prefix)
    {
        $this->prefix = $prefix;
    }
}
