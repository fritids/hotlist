<?php
require_once('config.php');
$srv = $_SERVER['SERVER_ADDR'];

if ( $srv == '67.207.142.230' ) {
// staging
    define('SERVER', 'localhost');
    define('USER', 'railsuser');
    define('PASS', 'test');

} else if ( $srv == '127.0.0.1' ) {
// local
    define('SERVER', 'localhost');
    define('USER', 'root');
    define('PASS', 's1mpl3');
} else if ( $srv == '96.126.105.198' ) {
// production
    define('SERVER', 'localhost');
    define('USER', 'nambe');
    define('PASS', 'xQO7271JA3');
}

