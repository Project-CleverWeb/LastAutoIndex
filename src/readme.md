#LastAutoIndex

The last auto indexer (aka directory index) you will ever need.

LastAutoIndex is a completely customizable auto index, and is designed to
replace Apache's pre-installed auto index. To start customizing, checkout
the `src/public/themes` directory.

Confused? [See the full README on Github](https://github.com/Project-CleverWeb/LastAutoIndex)

---

### Apache Installation

Installation is very simple, in your server root `.htaccess`, just disable
Apache's default indexer, and a add LastAutoIndex as a directory index.

**NOTICE:** The path to LastAutoIndex in your `.htaccess` file must absolute
from your servers document root.

**Requirements**<br>
- The ablity to set the directory index
- PHP 5.4 or later
- [Composer](https://getcomposer.org/)

```apache
Options -Indexes
DirectoryIndex index.php index.html index.htm /path/to/LastAutoIndex/index.php
```

### Configuring
You can configure your installation by editing your `src/config.php` file

### Changelog

See the [releases](https://github.com/Project-CleverWeb/LastAutoIndex/releases) page on github

### Copyright &amp; Licensing

Copyright &copy; Nicholas Jordon 2015 - All Rights Reserved

**Source-code License:** MIT<br>
**Documentation License:** CC BY NC SA<br>
**NOTICE:** All included works (aka libraries) are licensed under the MIT license
**OR** are compatible with the MIT License.

The LastAutoIndex documentation by Nicholas Jordon is licensed under the
Creative Commons Attribution-ShareAlike 4.0 International License. To view a
copy of this license, visit http://creativecommons.org/licenses/by-nc-sa/4.0/deed.en_US

The LastAutoIndex source code by Nicholas Jordon is licensed under the MIT
License. To view a copy of this license, visit http://opensource.org/licenses/MIT

Third party works that may also be included with this work are also not subject
to this work's copyright &amp; license(s). Copyright &amp; licensing of all
included works are determined by their respective owners.
