<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\logger;

use TargomanFramework;

class Logger
{
    use \Targoman\Framework\core\ComponentTrait;

    public function formatLog($_message) {
        $out = '[' . date('Y/m/d H:i:s') . '] ' . $_message;
        return $out;
    }

    public function log($_message) {
        echo $this->formatLog($_message) . "\n";
    }

}
