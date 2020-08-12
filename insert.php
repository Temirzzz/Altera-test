<?php
require_once('./core/config.php');
require_once('./core/functions.php');
$conn = connect();
insertData($conn);
close($conn);