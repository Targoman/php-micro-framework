<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\core;

use TargomanFramework;

class Component extends BaseObject {
    private $components = [];

    public function __construct(&$_config) {

        if (isset($_config["components"])) {
            $this->components = $_config["components"];
            unset($_config["components"]);
        }

        parent::__construct($_config);
    }

    public function __get($name) {
        if (isset($this->components[$name])) {
            if (is_array($this->components[$name])) {
                if (empty($this->components[$name]["class"]))
                    throw new \Exception("Class not defined. Could not create $name");

                $component = TargomanFramework::instantiateClass($this->components[$name]["class"]);
                if (is_null($component))
                    throw new \Exception("Could not create $name");

                $this->components[$name] = $component;
            }

            return $this->components[$name];
        }

        return parent::__get($name);
    }
}
