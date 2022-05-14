<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\core;

use TargomanFramework;
use Component;

class Components extends BaseObject {

    private $components = [];

    public function __construct(&$_config) {

        $this->components = $this->coreComponents();

        if (isset($_config["components"])) {
            $this->components = array_replace_recursive($this->components, $_config["components"]);
            unset($_config["components"]);
        }

        parent::__construct($_config);
    }

    public function __get($name) {
        if (isset($this->components[$name])) {
            if (is_array($this->components[$name])) {
                $component = TargomanFramework::instantiateClass($this->components[$name]);

                if (is_null($component))
                    throw new \Exception("Could not create $name");

                $this->components[$name] = $component;
            }

            return $this->components[$name]->getInitialized();
        }

        return parent::__get($name);
    }

    public function coreComponents() : Array {
        return [];
    }
}
