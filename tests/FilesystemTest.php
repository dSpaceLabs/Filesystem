<?php

namespace Dspacelabs\Component\Filesystem\Tests;

use Dspacelabs\Component\Filesystem\Filesystem;
use Dspacelabs\Component\Filesystem\Adapter\MockAdapter;
use Dspacelabs\Component\Filesystem\Adapter\LocalAdapter;
use Dspacelabs\Component\Filesystem\Adapter\AmazonS3Adapter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Aws\Result;
use Aws\MockHandler;
use Aws\S3\S3Client;

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
    }

    public function testFilesystem()
    {
        $filesystem = new Filesystem(new LocalAdapter('/tmp'), $this->logger);

        $handle = fopen('dspace://file.txt', 'w+');
        fwrite($handle, 'testing');
        fseek($handle, 0);
        do {
            $content = fread($handle, 1024);
        } while (!feof($handle));
        fclose($handle);

        $dhandle = opendir('dspace://');
        while (($file = readdir($dhandle)) !== false) {
            $this->logger->debug($file);
        }
        closedir($dhandle);
    }

    public function testAmazonS3Adapter()
    {
        $this->markTestIncomplete();
        $handler = new MockHandler();
        $client = new S3Client(array(
            'region'      => 'us-east-1',
            'version'     => '2006-03-01',
            'handler'     => $handler,
            'credentials' => false,
        ));
        $adapter = new AmazonS3Adapter($client);
        $filesystem = new Filesystem($adapter, $this->logger);

        $handle = fopen('dspace://file.txt', 'x');
        fwrite($handle, 'testing');
        fseek($handle, 0);
        do {
            $content = fread($handle, 1024);
        } while (!feof($handle));
        fclose($handle);

        $dhandle = opendir('dspace://');
        while (($file = readdir($dhandle)) !== false) {
            $this->logger->debug($file);
        }
        closedir($dhandle);
    }
}
