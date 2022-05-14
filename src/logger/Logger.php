<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\logger;

use TargomanFramework;

class Logger
{
    use \Targoman\Framework\core\ComponentTrait;

    public function formatLog($_category, $_message) {
        $out = '[' . date('Y/m/d H:i:s') . '] ' . "[$_category] " . $_message;
        return $out;
    }

    public function log($_message) {
        echo $this->formatLog('INFO', $_message) . "\n";
    }

    public function logException(\Throwable $_exp) {
        echo $this->formatLog('EXCEPTION', $_exp->getMessage()) . "\n";
    }

}
