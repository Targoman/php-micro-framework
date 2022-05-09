<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\core;

class BaseObject {
    private $properties = [];

    public function __construct(&$_config) {
    }

    public function __get($name) {
        if (isset($this->properties[$name])) {
            return $this->properties[$name];
        }

        throw new \Exception("$name not found");
    }
}
