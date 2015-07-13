<?php

// Composer Autoload
define('ROOT_PATH', dirname(dirname(__FILE__)));
$autoloader = require_once (ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

class WebTestCase extends \Silex\WebTestCase {
    public function createApplication() {
        global $autoloader;

        $app = \Sifoni\Engine::getInstance()->init()->bootstrap(array(
            'path.root' => ROOT_PATH,
            'autoloader' => $autoloader,
            'debug' => true
        ))->start()->getApp();

        $app['exception_handler']->disable();
        $app['session.test'] = true;

        return $app;
    }
}
