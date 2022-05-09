# php-micro-framework

create a folder for your project

create composer.json and put this in "require" section:
    "targoman/php-micro-framework" : "dev-dev"

run composer update

create .gitignore file
```
/vendor/
*-local.*
composer.lock
```

create folder app under root and cd to it

create Application.php
```
namespace myTestApp\app;
use Targoman\Framework\core\Application as BaseApplication;
class Application extends BaseApplication {
    public function run() {
    }
}
```

create Runner.php
```
<?php
defined('FW_DEBUG') or define('FW_DEBUG', true);
defined('FW_ENV_DEV') or define('FW_ENV_DEV', true);

require(__DIR__ . "/../vendor/autoload.php");
require(__DIR__ . "/../vendor/targoman/php-micro-framework/src/TargomanFramework.php");

$config = array_replace_recursive(
    require(__DIR__ . "/config/App.conf.php"),
    require(__DIR__ . "/config/params.php"),
    @require(__DIR__ . "/config/params-local.php")
);

exit((new \myTestApp\app\Application($config))->run());
```

create folder config under root and cd to it

create App.conf.php
```
<?php
return [
    "app" => [
    ],
    "components" => [
        "db" => [
            "class" => "Targoman\\Framework\\db\\MySql",
        ],
    ],
];
```

create App.conf.php
```
return [
    "app" => [
    ],
];
```

create params.php
```
<?php
return [
    "app" => [
    ],
];
```

create params-local.php
```
<?php
return [
    "app" => [
    ],
];
```

back to your project root folder

create autoload.php
```
<?php
return [
    "myTestApp\\app\\" => __DIR__ . '/app'
];
```

run:
```
php app/Runner.php
```
