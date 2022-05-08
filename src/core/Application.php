<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\core;

use TargomanFramework;

class Application extends Components {
    // private static $config = null;

    public function __construct($_config) {
        TargomanFramework::$app = $this;

        parent::__construct($_config);

        // $this->setConfig($_config);

        if (isset($_config["app"])) {
            foreach ($_config["app"] as $k => $v) {
                if (property_exists($this, $k) == false)
                    throw new \Exception("unknown class member: " . $k);
            }
            unset($_config["app"]);
        }

        if (empty($_config) == false)
            throw new \Exception("unknown confif items found: " . implode(', ', array_keys($_config)));
    }

    // public function config() {
    //     return self::$config;
    // }
    // public function setConfig($_config) {
    //     self::$config = $_config;
    // }

    public function run() { throw new \Exception("Application::run not implemented."); }

}
