<?php

namespace Libreria;
class Pages
{
    /**
     * Le mete header y footer ha una view.
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
        require_once "Views/Layout/Header.php";
        require_once "Views/$pageName.php";
        require_once "Views/Layout/Footer.php";
    }
}