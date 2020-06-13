<?php require_once 'php_action/db_connect.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>BOEBOT</title>
  <link href="masterstyle.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap"> 
</head>

<body>

  <div class="container">
    <div class="timeline">
      <?php
            $sql = "SELECT * FROM members WHERE active = 1";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "
                   <div id= ".$row['id'].">
                     <div class='timeline-item' style='background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.32), rgba(117, 19, 93, 0.53)), url(".$row['img'].")'>
                     <div class='timeline-option'>
                     <a href='index.php'><i class='fa fa-bars fa-2x optionBar' aria-hidden='true'></i></a>
                        </div>
                     <div class='timeline-container'>
                      <div class='timeline-date'>
                      ".$row['date']."
                      </div>
                      <div class='timeline-title'>
                      ".$row['title']."
                      </div>
                      <div class='timeline-description'>
                      ".$row['content']."
                      </div>
                      </div>
                    </div>
                   </div>
                   ";
                }

            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
    </div>
    
    <div class='scrollbar'>
      <div class='date-container'>
        <?php
            $sql = "SELECT id,date FROM members WHERE active = 1";
            $result = $connect->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "
                    <div class='date-label'> <a href=#".$row['id']." class='date-link'> ".$row['date']." </a></div>
                   ";
                }

            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
      </div>
    </div>
  </div>


</body>

</html>