Piwigo Coding Standards
=======================

This is a PHP Code Sniffer (phpcs) ruleset for enforcing
the [coding standards](https://piwigo.org/doc/doku.php?id=dev:coding_conventions)
of [Piwigo](https://piwigo.org/).

* Author: Sam Wilson
* Homepage: https://github.com/samwilson/piwigo-coding-standards
* Packagist: https://packagist.org/packages/samwilson/piwigo-coding-standards
* License: GPL 3.0 or later, first published 2019
* [![Packagist](https://img.shields.io/packagist/v/samwilson/piwigo-coding-standards.svg)](https://packagist.org/packages/samwilson/piwigo-coding-standards)

## Installation

    composer require --dev samwilson/piwigo-coding-standards

## Usage

Create a `.phpcs.xml` file such as the following:

```xml
<?xml version="1.0"?>
<ruleset>
    <rule ref="vendor/samwilson/piwigo-coding-standards/Piwigo/ruleset.xml" />
    <file>.</file>
    <exclude-pattern>./vendor</exclude-pattern>
</ruleset>
```

Then run:

    ./vendor/bin/phpcs
