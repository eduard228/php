<?php
spl_autoload_register();
echo '<pre>';
$db = new database();
$data = $db->getOne();

print_r($data);