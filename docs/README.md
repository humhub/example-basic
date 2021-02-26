[![PHP Codeception Tests](https://github.com/humhub/humhub-modules-example-basic/actions/workflows/php-test.yml/badge.svg)](https://github.com/humhub/humhub-modules-example-basic/actions/workflows/php-test.yml)

# Basic Example Module

Is a simple module skeleton to illustrate the module interface of HumHub.

Alternatively you can use a module generator for HumHub in the [DevTools module](https://github.com/humhub-contrib/devtools).

## Use Boilerplate

1.) Checkout module

Clone the module and then delete the Git files. This is necessary to move the module to a new Git repository later.

``` 
cd my-new-project
git clone https://github.com/humhub/humhub-modules-example-basic.git .
rm .git -rf
```


2.) Modify the file `docs/rewrite-module-id.php` and set the variables `$newModuleId` and `$newNamespace`.

** Example: **

```php
// docs/rewrite-module-id.php

// ...

$newModuleId = "formbuilder";
$newNamespace = 'coolSoft\humhub\modules\formbuilder';

// ...
```

3.) Run the `docs/rewrite-id.php` from shell.

``` 
cd docs/
php rewrite-module-id.php
```

4.) Run the `docs/rewrite-id.php` from shell.
