<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $content = $_POST['content'];
    $img = $_POST['img'];
 
    $sql = "INSERT INTO members (title, date, content, active) VALUES ('$title', '$date', '$content', 1)";

    
    if($connect->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>
