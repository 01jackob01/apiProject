<?php
function custom_autoloader($class) {
    include 'src/' . $class . '.php';
    include 'db/' . $class . '.php';
    include '../db/' . $class . '.php';
}