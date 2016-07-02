<?php
namespace Hal\Core;

define('BASE_URL', $app['config']->setting('site_url'));

# Define the path to vendors
define('VENDOR_PATH', BASE_PATH . 'vendor/');

# Define the path to Core dir
define('CORE_PATH', BASE_PATH . 'app/code/core/');

# Define path to System
define('SYSTEM_PATH', CORE_PATH . 'system/');
define('MODULES_PATH', BASE_PATH . 'app/code/module/');
define('MODULES_URL', $app['config']->setting('site_url') . 'app/code/module/');
define('TEMPLATE_URL', $app['config']->setting('template_url'));

# Third party plugins
define('EXTENSIONS_PATH', CORE_PATH . 'override/');

/*
 * Define system and System paths
 * System folder contains core system files
 * System folder is the "public" directory where
 * all controllers, models, views, template files,
 * plugins, hooks, etc are stored
 */
define('PUBLIC_PATH', BASE_PATH . 'public/');
define('CONFIG_PATH', CORE_PATH . 'config/');
define('CACHE_DIR', BASE_PATH . 'var/cache/');
define('LOG_PATH', BASE_PATH . 'var/logs/');

# User-created blocks/controllers/models/views
define('CONTROLLERS_DIR', PUBLIC_PATH . 'controllers/');
define('MODELS_DIR', PUBLIC_PATH . 'models/');
define('VIEWS_DIR', PUBLIC_PATH . 'views/');
define('BLOCKS_DIR', PUBLIC_PATH . 'blocks/');


# User created documents / text files
define('DOCS_DIR', CACHE_DIR . 'documents/');

# Maxmind GeoIP directory
define('GEOIP_DIR', MODULES_PATH . 'geoip/');

# User pictures directory
define('USER_PICS', BASE_PATH . 'media/images/profile/');
define('USER_PICS_URL', BASE_URL . 'media/images/profile/');
