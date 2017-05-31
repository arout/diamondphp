<?php
namespace Hal\Core;

define('BASE_URL', $app['config']->setting('site_url'));
define('ADMIN_URL', BASE_URL.$app['config']->setting('admin_controller').'/');

# Define the path to vendors
define('VENDOR_PATH', BASE_PATH.'vendor/');

# Define the path to Core dir
define('CORE_PATH', BASE_PATH.'app/code/core/');

# Define path to System
define('SYSTEM_PATH', CORE_PATH.'system/');
define('MODULES_PATH', BASE_PATH.'app/code/module/');
define('MODULES_URL', $app['config']->setting('site_url').'app/code/module/');
define('TEMPLATE_URL', $app['config']->setting('template_url'));
define('ADMIN_TEMPLATE_URL', $app['config']->setting('admin_template_url'));

/*
 * Define system and System paths
 * System folder contains core system files
 * System folder is the "public" directory where
 * all controllers, models, views, template files,
 * plugins, hooks, etc are stored
 */
define('PUBLIC_PATH', BASE_PATH.'public/');
define('CONFIG_PATH', CORE_PATH.'config/');
define('CACHE_PATH', BASE_PATH.'var/cache/');
define('LOG_PATH', BASE_PATH.'var/logs/');
define('CRON_PATH', BASE_PATH.'var/crons/');
define('VAR_PATH', BASE_PATH.'var/');
define('SMARTY_PATH', BASE_PATH.'vendor/smarty/');

# Override core files
define('CORE_OVERRIDE_PATH', BASE_PATH.'app/code/override/');
# Override public files
define('PUBLIC_OVERRIDE_PATH', PUBLIC_PATH.'override/');

# User-created blocks/controllers/models/views
define('CONTROLLERS_PATH', $app['config']->setting('controllers_path'));
define('MODELS_PATH', $app['config']->setting('models_path'));
define('VIEWS_PATH', BASE_PATH.'app/design/frontend/'.$app['config']->setting('template_name').'/views');
define('ADMIN_VIEWS_PATH', BASE_PATH.'app/design/admin/'.$app['config']->setting('template_name').'/views');
define('BLOCKS_DIR', PUBLIC_PATH.'blocks/');

# Maxmind GeoIP directory
define('GEOIP_DIR', MODULES_PATH.'geoip/');

# Media folder
define('MEDIA_DIR', BASE_PATH.'media/');
define('MEDIA_URL', BASE_URL.'media/');

# Images folder
define('IMAGES_DIR', MEDIA_DIR.'images/');
define('IMAGES_URL', MEDIA_URL.'images/');
# Admin images folder
define('ADMIN_IMAGES_DIR', MEDIA_DIR.'admin/'.$app['config']->setting('admin_template_name').'/images/');
define('ADMIN_IMAGES_URL', MEDIA_URL.'admin/'.$app['config']->setting('admin_template_name').'/images/');

# User created documents / text files
define('DOCS_DIR', MEDIA_DIR.'documents/');

# User pictures directory
define('USER_PICS', IMAGES_DIR.'profile/');
define('USER_PICS_URL', IMAGES_URL.'profile/');
