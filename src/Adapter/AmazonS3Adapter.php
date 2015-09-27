<?php
/**
 */

namespace Dspacelabs\Component\Filesystem\Adapter;

use Dspacelabs\Component\Filesystem\Filesystem;
use Aws\S3\S3Client;
use Aws\S3\StreamWrapper;
use Aws\LruArrayCache;

/**
 * Amazon S3 Adapter
 *
 * Store Assets in the cloud
 */
class AmazonS3Adapter extends StreamWrapper implements AdapterInterface
{
    /**
     * @var S3Client
     */
    protected $client;

    /**
     * @param string $prefix
     */
    public function __construct(S3Client $client)
    {
        $protocol     = 'dspace';
        $this->client = $client;

        $default = stream_context_get_options(stream_context_get_default());
        $default[$protocol]['client'] = $client;

        if (!isset($default[$protocol]['cache'])) {
            // Set a default cache adapter.
            $default[$protocol]['cache'] = new LruArrayCache();
        }

        stream_context_set_default($default);
    }
}
