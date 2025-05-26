<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);

define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'],['127.0.0.1','::1']) ? true : false );
define('PORT', IS_LOCAL ? '80' : '0000');
define('URL', IS_LOCAL ? '127.0.0.6:'. PORT . DS : 'https://bibliogest.onrender.com');

define('DB_HOST', IS_LOCAL ? 'localhost' : 'dpg-d0q9bknfte5s73ajf130-a.oregon-postgres.render.com');
define('DB_PORT', IS_LOCAL ? '5432' : '5432');
define('DB_USER', IS_LOCAL ? 'postgres' : 'blibliogest');
define('DB_PASS', IS_LOCAL ? '3355776Ea' : '4MOQ6CmwGKteRqAIE0ukUiONfanBNCxY');
define('DB_NAME', IS_LOCAL ? 'bibliogest' : 'bibliogest');

define('CLASSES'        , ROOT . 'classes' . DS);
define('CLASSES_PATH'   , ROOT . '..' . DS);
define('CONTROLLERS'    , ROOT . 'controllers' . DS);
define('RESOURCES'      , ROOT . 'resources' . DS);
define('ASSETS'         , DS . 'assets' . DS);
define('CSS'            , ASSETS . 'css' . DS);
define('JS'             , ASSETS . 'js' .DS);
define('LAYOUTS'        , RESOURCES . 'layouts' .DS);
define('VIEWS'          , RESOURCES . 'views' . DS);
define('FUNCTIONS'      , RESOURCES . 'functions' .DS);