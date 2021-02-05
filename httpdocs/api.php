<?php

header('Access-Control-Allow-Origin: *');

ini_set("display_errors", 1);
ini_set("log_startup_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", __DIR__ . "/php_errors.log");
ini_set("memory_limit", "1024M");

set_time_limit(600);

session_start();

require __DIR__ . '/../vendor/autoload.php';

use Ioser\pokemon\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

// The check is to ensure we don't use .env in production
if (!isset($_SERVER['APP_ENV']))
{
    if (!class_exists(Dotenv::class))
    {
        throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
    }
    (new Dotenv())->load(__DIR__ . '/../.env');
}
$env = $_SERVER['APP_ENV'] ?? 'dev';
$debug = $_SERVER['APP_DEBUG'] ?? ('prod' !== $env);
if ($debug)
{
    umask(0000);
    Debug::enable();
}
if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false)
{
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}
if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false)
{
    Request::setTrustedHosts(explode(',', $trustedHosts));
}

$config = include __DIR__ . '/../config/local.php';

$kernel = new Kernel($env, $debug);
$request = Request::createFromGlobals();
try
{
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
} catch (Exception $e)
{
    echo $e->getMessage();
}
