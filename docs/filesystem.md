Filesystem
==========

There are a lot of libraries out there that rely on some type of file system to
store things, for example cached files or images, etc. This library has the main
goal to make a file system that can be used during testing, development, and
production. Testing could use a MockFilesystem, development could use a local
disk and production could use S3 or some other cloud service.

It might be possible to support streams or other service provided by php.

## Interfaces

- `AdapterInterface` - All Adapters implement this
- `FilesystemInterface` - Main API to use
- `FileInterface` - Wraps a file
- `DirectoryInterface` - Wraps a directory
- `StreamWrapperInterface` - Extends the PHP stream wrapper prototype

## Adapters

- `LocalAdapter` - stores on local disk
- `AmazonS3Adapter` - stores files on Amazon S3
- `MockAdapter` - Used for testing

## References

- http://php.net/manual/en/class.streamwrapper.php
- http://php.net/manual/en/wrappers.php
- http://php.net/fileinfo
- http://php.net/manual/en/book.dir.php
- http://php.net/manual/en/spl.files.php

## Examples

- Should be able to work with existing code that uses things like `fopen`
- Uses `dspace` scheme

```php
$filesystem = Filesystem::getInstance(new LocalAdapter('/var/assets'));

// gets the content of file `/var/assets/path/to/file.ext`
$content = file_get_contents('dspace://path/to/file.ext');
```

```php
// There would be more config for S3 adapter
$filesystem = Filesystem::getInstance(new AmazonS3Adapter());

// Fetches content from S3
$content = file_get_contents('dspace://bucket/file.ext');
```
