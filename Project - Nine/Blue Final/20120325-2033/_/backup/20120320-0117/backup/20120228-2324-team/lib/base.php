<?php

class Base {
    protected function render($file_name, $environment = null)
    {
        if ($environment) {
            extract($environment);
        }

        require(__SITE_PATH . '/views/' . $file_name . '.php');
    }
}
