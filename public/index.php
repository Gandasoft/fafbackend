<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';



// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';
require __DIR__ . '/../src/Utils/DBUtil.php';
require __DIR__.'/../src/Utils/Flatutil.php';
require __DIR__.'/../src/Utils/UserUtil.php';
require __DIR__ . '/../src/Utils/UserTypeUtil.php';
require __DIR__ . '/../src/Utils/ErrorUtil.php';
// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();
