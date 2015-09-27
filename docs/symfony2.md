Symfony 2
=========

Guide goes over how to hook this beast up to a Symfony 2 application.

## Installation

See [Installation] guide for details on how to install this library.

## Configuration

Create a few new services.

```yaml
services:
    app.dspacelabs.filesystem.adapter:
        class: Dspacelabs\Component\Filesystem\Adapter\LocalAdapter
        arguments: [ '/tmp' ]

    app.dspacelabs.filesystem:
        class: Dspacelabs\Component\Filesystem\Filesystem
        arguments: [ '@app.dspacelabs.filesystem.adapter' ]
```

## Logging

If you want to enable logging, you may also want to put it in it's own file to
keep the other logs from filling up with trash you do not care about.

```yaml
monolog:
    handlers:
        filesystem:
            type:   stream
            path:   "%kernel.logs_dir%/filesystem_%kernel.environment%.log"
            level:  debug

services:
    app.dspacelabs.filesystem.adapter:
        class: Dspacelabs\Component\Filesystem\Adapter\LocalAdapter
        arguments: [ '/tmp' ]

    app.dspacelabs.filesystem:
        class: Dspacelabs\Component\Filesystem\Filesystem
        arguments: [ '@app.dspacelabs.filesystem.adapter', '@monolog.logger.filesystem' ]
```
