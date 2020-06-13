<?php 
 
require_once 'db_connect.php';
 
if(isset($_POST['EditData'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $content = $_POST['content'];
    $img = $_POST['img'];

    $id = $_POST['id'];
 
    $sql = "UPDATE members SET title = '$title', date = '$date', content = '$content', img = '$img' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../edit.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>