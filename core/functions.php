<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');


function connect() {
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function select($conn) {
    $offset = 0;

    if (isset($_GET['page']) AND trim($_GET['page']) != '') {
        $offset = trim($_GET['page']);
    }

    $sql = "SELECT * FROM contacts ORDER BY id DESC LIMIT 3 OFFSET ".$offset * 3; 
    $result = mysqli_query($conn, $sql);

    $a = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    }
    return $a;
}

function pagination_count($conn) {
    $sql = "SELECT * FROM contacts";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);
    return ceil($result/3);
}

function delete_article ($conn,$id) {
    $sql = "DELETE FROM contacts WHERE id= '$id'";
  
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function insertData ($conn) {
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    $name = trim($data['name']);
    $surname = trim($data['surname']);
    $phone = trim($data['phone']);


    $sql = "INSERT INTO contacts (name, surname, phone_number) VALUES ('".$name."', '".$surname."', '".$phone."')";

    if (mysqli_query($conn, $sql)) {
        echo 1;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

function close($conn) {
    mysqli_close($conn);
}