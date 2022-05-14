<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\logger;

use TargomanFramework;

class Logger
{
    use \Targoman\Framework\core\ComponentTrait;

    public $Actor;

    public function setActor($_actor) {
        $this->Actor = $_actor;
    }

    public function formatLog($_category, $_message) {
        $out = '';

        $out .= '[' . date('Y/m/d H:i:s') . '] ';

        if (empty($this->Actor) == false)
            $out .= "[$this->Actor] ";

        $out .= "[$_category] ";

        $out .= $_message;

        return $out;
    }

    public function log($_message) {
        echo $this->formatLog('INFO', $_message) . "\n";
    }

    public function logException(\Throwable $_exp) {
        echo $this->formatLog('EXCEPTION', $_exp->getMessage()) . "\n";
    }

}
