<?php

require(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use timedoctor\App;

$config = require ('../config/config.php');

$app = new App($config);

$app->run();