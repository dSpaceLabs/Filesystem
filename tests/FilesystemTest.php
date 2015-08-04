<?php

namespace Dspacelabs\Component\Filesystem\Tests;

use Dspacelabs\Component\Filesystem\Filesystem;
use Dspacelabs\Component\Filesystem\Adapter\MockAdapter;

class FilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MockAdapter
     */
    private $adapter;

    protected function setUp()
    {
        $this->adapter = new MockAdapter();
    }

    public function testFilesystem()
    {
        $filesystem = new Filesystem($this->adapter);

        $handle = fopen('dspace://path/to/file.ext', 'r');
        fclose($handle);
    }
}
