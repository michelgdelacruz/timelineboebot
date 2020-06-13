<?php require_once 'php_action/db_connect.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
    <title>BOEBOT</title>
    <?php include("headers.php"); ?>
    <style>
        .headerNav{
  background-color:#435d7d;
  padding:15px;
 }
 .headerMessage{
     padding:10px;
     color:white;
     font-size:20px;
 }
 .tableHistory{

     padding:40px;
 }

 .addBtn{

     float:right;
 }

        </style>
</head>

<body>

<div class="container-fluid">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-lg-12 headerNav">
						<span class="headerMessage">Manage <b>Employees</b><span>
                        <button type="button" class="btn btn-info addBtn" data-toggle="modal" data-target="#addModal">Add New Content</button>
					</div>   
                </div>
            </div>
            <div class="tableHistory">
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                            <th>id</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Option</th>
                            </tr>
                        </thead>


                <tbody>
                <?php
            $sql = "SELECT * FROM members WHERE active = 1";
            $result = $connect->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row['id']."</td>
                        <td>".$row['title']."</td>
                        <td>".$row['date']."</td>
                        <td>".$row['content']."</td>
                        <td>".$row['img']."</td>
                        <td>
                            <a class='editBtn' id='openEdit'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                            <a class='deleteBtn' id='openEdit'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>	
                </tbody>
        </table>
        </div>
            </div>
        </div>
    </div>
</div>            
 <?php include("create.php"); ?>
 <?php include("edit.php"); ?>
 <?php include("remove.php"); ?>
</body>

<script>

$('.editBtn').on('click',function() {
    
    $('#editModal').modal('show');

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();

    $('#id').val(data[0]);
    $('#title').val(data[1]);
    $('#date').val(data[2]);
    $('#content').val(data[3]);
    $('#img').val(data[4]);
});

$('.deleteBtn').on('click',function() {
    
    $('#deleteModal').modal('show');

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get();

    $('#id').val(data[0]);
    $('#title').val(data[1]);
    $('#date').val(data[2]);
    $('#content').val(data[3]);
    $('#img').val(data[4]);
});
 </script>
</html>