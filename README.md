dspacelabs/filesystem
=====================

Filesystem is generic PHP wrapper around the filesystem that allows you to setup
your application to store files almost anywhere. The problem this solves is that
during development you want to store things on disk, next you deploy your
application to Heroku and now you are having to deal with messy code that is
checking to see if you are on localhost or on a Heroku instance.

## Features

- Store assets on:
  - Local Disk
  - S3
  - More coming soon
- Mock Filesystem for testing
- Support for logging using `psr/log` package

## Installation

```shell
composer require "dspacelabs/filesystem:0.1@dev"
```

## Configuration

Each adapter has it's own configuration, I've tried to document that in the
adapter files. Use the source.

## Usage

```php
<?php

$adapter    = new \Dspacelabs\Component\Filesystem\Adapter\LocalAdapter('/tmp');
$filesystem = new \Dspacelabs\Component\Filesystem\Filesystem($adapter);

// Everything uses the `dspace` protocol, you can swap out different adapters
// but the protocol will always stay the same.
$handle = fopen('dspace://file.txt', 'w+');
fwrite($handle, 'testing');
fclose($handle);
```

```shell
$ cat /tmp/file.txt
testing
```

For more usage example, check out the tests directory.

## Change Log

See [CHANGELOG.md].

## License

See [LICENSE].

[CHANGELOG.md]: CHANGELOG.md
[LICENSE]: LICENSE
