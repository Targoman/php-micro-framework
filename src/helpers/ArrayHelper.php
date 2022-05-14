<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\helpers;

class ArrayHelper
{

    public static function dump($array, $lvl = 0) {

        $return = "";

        $sub = $lvl+1;
        $indent = str_repeat("    ", $sub);

        if ($lvl == null) {
            $return = str_repeat("    ", $lvl) . "[\n";
        }

        foreach ($array as $key => $mixed) {
            $key = trim($key);

            if (is_string($mixed))
                $mixed = trim($mixed);

            if (empty($key) && empty($mixed))
                continue;

            if (!is_numeric($key) && !empty($key)) {
                if ($key == "[]")
                    $key = null;
                else
                    $key = "'" . addslashes($key) . "'";
            }

            if ($mixed === null)
                $mixed = 'null';
            elseif ($mixed === false)
                $mixed = 'false';
            elseif ($mixed === true)
                $mixed = 'true';
            elseif ($mixed === "")
                $mixed = "''";

            //CONVERT STRINGS 'true', 'false' and 'null' TO true, false and null
            //uncomment if needed
            elseif (is_string($mixed)) {
                if ($mixed != 'false' && $mixed != 'true' && $mixed != 'null')
                    $mixed = "'" . addslashes($mixed) . "'";
            }

            if (is_array($mixed)) {
                if ($key !== null) {
                    $return .= $indent . "$key => [\n";
                    $return .= static::dump($mixed, $sub);
                    $return .= $indent . "],\n";
                } else {
                    $return .= $indent . "[\n";
                    $return .= static::dump($mixed, $sub);
                    $return .= $indent . "],\n";
                }
            } else {
                if (is_string($mixed))
                    $sMixed = "'" . $mixed . "'";
                else
                    $sMixed = $mixed;

                if ($key !== null)
                    $return .= $indent . "$key => $mixed,\n";
                else
                    $return .= $indent . $mixed . ",\n";
            }
        }

        if ($lvl==null)
            $return .= str_repeat("    ", $lvl) . "]\n";

        return $return;
    }

}
