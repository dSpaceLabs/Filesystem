dspacelabs/filesystem
=====================

Filesystem is generic PHP wrapper around the filesystem that allows you to setup
your application to store files almost anywhere. The problem this solves is that
during development you want to store things on disk, next you deploy your
application to Heroku and now you are having to deal with messy code that is
checking to see if you are on localhost or on a Heroku instance.

## Features

- Store assets on:
-- Disk
-- S3
-- More coming soon
- Mock Filesystem for testing

## Installation

```shell
composer require dspacelabs/filesystem
```

## Configuration

## Usage

## Change Log

See [CHANGELOG.md].

## License

See [LICENSE].

[CHANGELOG.md]: CHANGELOG.md
[LICENSE]: LICENSE
