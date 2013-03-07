<?php

error_reporting(E_ALL);

$site_path = realpath(dirname(__FILE__));

define ('__SITE_PATH', $site_path);

require('app/application.php');

$app = new Application();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'default';
}

dispatch($action, $app);

// TODO: move the dispatcher out of index.php
function dispatch($action, $app)
{
    if ($action != 'login') {
        if (!$app->authenticated()) {
            $app->loginForm();
            return;
        }
    }

    switch ($action) {
        case 'login':
            // TODO: sanitise input before passing to $app
            // to keep the application logic simpler
            $app->checkLogin($_POST['email'], $_POST['password']);

            if ($app->authenticated()) {
                $app->landing();
            } else {
                $app->loginForm();
            }

            break;
        case 'details':
            $app->details();
            break;
        case 'appointments':
            $app->appointments();
            break;
        case 'logout':
            $app->logout();
            $app->loginForm();
            break;
        default:
            if ($app->authenticated()) {
                $app->landing();
            } else {
                $app->loginForm();
            }
    }
}

?>
