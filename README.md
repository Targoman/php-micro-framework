# php-micro-framework

create a folder for your project:
```
mkdir testproject
cd testproject
```

run:
```
composer init
```

modify composer.json and put this in "require" section:
```
"targoman/php-micro-framework" : "dev-dev"
```

run:
```
composer update
```

create .gitignore file with this contents:
```
/vendor/
*-local.*
composer.lock
```

create app folder:
```
mkdir app
cd app
```

create Application.php with this contents:
```
namespace myTestApp\app;

use Targoman\Framework\core\Application as BaseApplication;

class Application extends BaseApplication {
    public $myParamA;

    public function run() {
        // put your code here

        echo $this->myParamA;

        return 0; //exit code
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

create config folder:
```
cd ..
mkdir config
cd config
```

create App.conf.php with this contents:
```
<?php
return [
    "app" => [
        "myParamA" => "original value",
    ],
    "components" => [
        "db" => [
            "class" => "Targoman\\Framework\\db\\MySql",
        ],
    ],
];
```

create params.php with this contents:
```
<?php
return [
    "app" => [
        "myParamA" => "override original value",
    ],
];
```

create params-local.php with this contents:
```
<?php
return [
    "app" => [
        "myParamA" => "override original value for my local use value",
    ],
];
```

back to your project root folder
```
cd ..
```

create autoload.php with this contents:
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
