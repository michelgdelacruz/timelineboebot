<!DOCTYPE html>
<html>

<head>
    <?php include("headers.php"); ?>
    <title>Add Content</title>

    <style>
  .modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
        border-color: #dddddd;
        width: 100%;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
    }	
    
        </style>
</head>

<body>
    <!-- Modal-->
    <div class="modal fade" id="addModal" role="dialog">
        <form id="addForm">
            <div class="modal-dialog createModal">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Content</h4>
                    </div>

                    <div class="modal-body">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <div class="form-group">
                                    <td> <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" /></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <td> <label for="date">Date</label>
                                        <input type="text" name="date" class="form-control" placeholder="Date" /></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <td> <label for="content">Content</label>
                                        <textarea type="text" name="content" class="form-control" placeholder="Content"></textarea></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <td> <label for="image">Image</label>
                                        <input type="text" name="img" class="form-control" placeholder="Image" /></td>
                                </div>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer modalFooter">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <a href="index.php"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
                        <button id="addData" class="btn btn-success" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $("#addData").click(function (e) {
            e.preventDefault(); //prevent default behaviour
            var formData = $("#addForm").serialize(); //serialize data from form
            $.ajax({
                type: "POST",
                url: "php_action/create.php",
                data: formData,
                success: function (data) {
                    alert(data);
                    window.location.reload();
                },
            });
        });
    </script>

</body>

</html>