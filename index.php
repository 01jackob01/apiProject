<?php
include_once('ClassLoader.php');
spl_autoload_register('custom_autoloader');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$parts = explode("/", $path);

$resource = $parts[2];

$id = $parts[3] ?? 0;

$class = new $resource();
$response = $class->apiExecute($id, $_REQUEST);

echo json_encode($response);