#Sudo-Plugins
Sudo-Plugins are scripts that are used as if they were plugins even though they are not. Sudo-Plugins cannot be disabled, and are usually required in order for <abbr title="LastAutoIndex">LAI</abbr> to run properly. Also, unlike plugins, Sudo-Plugins fall under the [Copyright & Licensing](https://github.com/Project-CleverWeb/LastAutoIndex#copyright--licensing) of the project.

On top of all this, Sudo-Plugins are often given special treatment in terms of what they can effect. This means that they can play large rolls within <abbr title="LastAutoIndex">LAI</abbr>, and can cause unexpected result if they are modified.

##Modifying Sudo-Plugins
To help overcome the problem of modifing them, Sudo-Plugins can have a function called `modify_output()`. This function, as it's name implies, allows you to modify the output of a particular function within that Sudo-Function.

**Note:** `modify_output()` usually does not support all functions of a Sudo-Plugin. To find out what functions are supported, check that Sudo-Plugin's documentation.

Additonally, `modify_output()` has the helper functions `modify_output_get()` and `modify_output_config()` that both work as their names describe. 

####Usage

```php
// usage: $_lai->dir->modify_output_config( $options_array );
$_lai->dir->modify_output_config(array(
	'allow_other_modifiers' => FALSE
));

// usage: $_lai->dir->modify_output_get( $func_name , $args=FALSE );
$original = $_lai->dir->modify_output_get('folders');

$modified = my_awesome_function($original);

// usage: $_lai->dir->modify_output( $func_name , $changed_output );
$_lai->dir->modify_output( 'folders' , $modified );
```

##TL;DR
Sudo-Plugins are special, they are under the [license](https://github.com/Project-CleverWeb/LastAutoIndex#copyright--licensing), modify them with care.