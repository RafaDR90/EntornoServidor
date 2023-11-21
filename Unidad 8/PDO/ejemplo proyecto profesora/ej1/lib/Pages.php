<?php

namespace lib;
class Pages
{
    /**
     * Le mte header y footer ha una view.
     * @param string $pageName
     * @param array|null $params
     * @return void
     */
    public function render(string $pageName, array $params = null){
        if ($params != null) {
            foreach ($params as $name => $value) {
                $$name = $value;
            }
        }
        require_once "views/Layout/Header.php";
        require_once "views/$pageName.php";
        require_once "views/Layout/Footer.php";
    }
}