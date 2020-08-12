<?php
require_once('./template/header.php');

if (isset($_GET['id'])) {
    var_dump($_GET['id']); 
}
$id = $_GET['id'];

delete_article ($conn, $id);
header('Location: ./index.php');


close($conn);