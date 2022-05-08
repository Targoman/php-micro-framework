<?php
/**
 * @author: Kambiz Zandi <kambizzandi@gmail.com>
 */

namespace Targoman\Framework\core;

trait ComponentTrait {
    private $componentInitialized = false;

    public function getInitialized() {
        if ($this->componentInitialized == false)
            $this->initComponent();

        return $this;
    }

    /// virtual
    public function initComponent() {
        $this->componentInitialized = true;
    }
}
