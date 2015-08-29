<?php

namespace Dspacelabs\Component\Filesystem\Tests;

use Dspacelabs\Component\Filesystem\Filesystem;
use Dspacelabs\Component\Filesystem\Adapter\MockAdapter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * These are not real tests, these are just me playing around
 */
class FilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MockAdapter
     */
    private $adapter;

    /**
     * @var Filesystem
     */
    private $filesystem;

    protected function setUp()
    {
        $this->logger = new Logger('app');
        $this->logger->pushHandler(new StreamHandler('php://stdout'));
        $this->adapter    = new MockAdapter();
        $this->filesystem = new Filesystem($this->adapter, $this->logger);
    }

    public function testFilesystem()
    {
        $handle = fopen('dspace://path/to/file.ext', 'rw');
        do {
            $content = fread($handle, 1024);
        } while (!feof($handle));
        fclose($handle);

        $stats = stat('dspace://path/to/file.ext');

        $this->assertFalse(is_dir('dspace://path/to/file.ext'));
    }
}
