<?php 
 
require_once 'php_action/db_connect.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM members WHERE id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
 
    $connect->close();
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Remove Member</title>
    <?php include("headers.php"); ?>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="deleteModal" role="dialog">
    <form id="DeleteForm">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Content</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <a href="index.php"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
                    <button id="DeleteData" class="btn btn-danger" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>

<Script>

$('#DeleteData').click(function(e) { 
    e.preventDefault(); //prevent default behaviour
    var formData = $('#DeleteForm').serialize() //serialize data from form
    $.ajax({
        type: "POST",
		url: "php_action/remove.php",
        data: formData,
		success: function(data) {
		alert(data);    
		window.location.reload();                    
	}
    });
});
</body>
</html>
 
<?php
}
?>