<?php

require_once 'db_connect.php';

if($_POST) {
    $id = $_POST['id'];

    // delete query DELETE from [table name] [condition]
    $sql = "DELETE FROM members WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Successfully removed!!</p>";
        echo "<a href='../index.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error updating record : " . $connect->error;
    }

    $connect->close();
}

?>