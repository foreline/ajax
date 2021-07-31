# ajax library

Example 1. Simple html output:

```php
<?php
require_once 'ajax.class.php';

$ajax = new Ajax;

if ( $error ) {
  $ajax->error('error message', 'error code');
}

$ajax->output('<h1>ajax output</h1>');
```

Example 2. Return array as JSON:

```php
<?php
require_once 'ajax.class.php';

$ajax = new Ajax;

if ( $error ) {
  $ajax->error('error message', 'error code');
}

$ajax->output(
  [
    'key1' => 'value1',
    'key2' => 'value2',
  ]
);
```
