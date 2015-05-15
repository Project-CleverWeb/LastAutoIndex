#LastAutoIndex

The last auto indexer (aka directory index) you will ever need.

LastAutoIndex is a completely customizable auto index, and is designed to
replace Apache's pre-installed auto index. To start customizing, checkout
the `src/public/themes` directory.

---

### Installation

**Requirements**<br>
- The ablity to set the directory index
- PHP 5.4 or later

**Note:** The path to LastAutoIndex must absolute from your servers document root

**Installing On Apache**<br>
Installation is very simple, in your server root `.htaccess`, just disable
Apache's default indexer, and a add LastAutoIndex as a directory index.

```apache
Options -Indexes
DirectoryIndex index.php index.html index.htm /path/to/LastAutoIndex/index.php
```

**Installing On Nginx**
```nginx
autoindex off;
index index.php index.html index.htm /path/to/LastAutoIndex/index.php;
```

### Configuring
You can configure your installation by editing your `src/config.php` file


### Contributing

Everyone is welcome to submit their own ideas, and it is my hope that you do. I 
especially encourage people to create &amp; submit their own themes, as most
people (myself included) enjoy having variety.

**How to contribute**<br>

1. Fork the repo on Github: [github.com/Project-CleverWeb/LastAutoIndex](https://github.com/Project-CleverWeb/LastAutoIndex)
2. Make your changes
3. Send a pull request to have your changes reviewed.


### Changelog

See the [releases](https://github.com/Project-CleverWeb/LastAutoIndex/releases) page on github


### Screenshots

The standard index<br>
![standard directory index listing in LastAutoIndex](http://i.imgur.com/jfr7wq8.png)

Filtering the current index
![filter the directory index listing in LastAutoIndex](http://i.imgur.com/Mbi5oC1.png)

Searching the current directory and its sub-directories
![Preforming a search in LastAutoIndex](http://i.imgur.com/l22CHzO.png)

### Copyright &amp; Licensing

Copyright &copy; Nicholas Jordon - All Rights Reserved

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
