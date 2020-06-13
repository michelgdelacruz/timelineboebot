<div class="modal fade" id="editModal" role="dialog">
    <form id="editForm">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Content</h4>
                </div>

                <div class="modal-body">
                    <table cellspacing="0" cellpadding="0" id="EditTable">
                        <td><input type="hidden" name="id" id="id" placeholder="id" /></td>
                        <tr>
                            <div class="form-group">
                                <td> <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title"></td>
                            </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                                <td> <label for="date">Date</label>
                            <input type="text" name="date" id="date" class="form-control" placeholder="Date"></td>
                            </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                                <td> <label for="content">Content</label>
                            <textarea type="text" name="content" id="content" class="form-control" placeholder="Content"></textarea></td>
                            </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                                <td> <label for="image">Image</label>
                            <input type="text" name="img" id="img" class="form-control" placeholder="Image">
                            </div>
                        </tr>
                    </table>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <a href="index.php"><button type="button" class="btn btn-default"
                            data-dismiss="modal">Cancel</button></a>
                    <button id="EditData" class="btn btn-success" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $("#editData").click(function (e) {
            e.preventDefault(); //prevent default behaviour
            var formData = $("#editForm").serialize(); //serialize data from form
            $.ajax({
                type: "POST",
                url: "php_action/update.php",
                data: formData,
                success: function (data) {
                    alert(data);
                    window.location.reload();
                },
            });
        });
    </script>