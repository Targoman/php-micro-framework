<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\core;

use TargomanFramework;

class Application extends Components {

    public function __construct($_config) {
        TargomanFramework::$app = $this;

        parent::__construct($_config);

        if (isset($_config["app"])) {
            foreach ($_config["app"] as $k => $v) {
                if (property_exists($this, $k) == false)
                    throw new \Exception("unknown class member: " . $k);
                $this->$k = $v;
            }
            unset($_config["app"]);
        }

        if (empty($_config) == false)
            throw new \Exception("unknown confif items found: " . implode(', ', array_keys($_config)));
    }

    public function run() { throw new \Exception("Application::run not implemented."); }

}
