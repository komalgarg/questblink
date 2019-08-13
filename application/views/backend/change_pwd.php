<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Change Password</h5>
                        </div>
                        <div class="ibox-content">
                            <form action="<?php echo base_url('admin/change_pwd'); ?>" method="post">
                                <div class="form-group col-md-8">
                                    <input class="form-control" type="password" name="password" placeholder="Enter New Password"/>
                                    <?php echo form_error('password', "<p><error>", "</error></p>"); ?>
                                </div>
                                <div class="form-group col-md-8">
                                    <input class="form-control" type="password" name="password2" placeholder="Confirm Password"/>
                                    <?php echo form_error('password2', "<p><error>", "</error></p>"); ?>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="submit" value="Change" class="btn btn-warning"/>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">View details</h4>
                </div>
                <div class="modal-body" id="view">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<script type="text/javascript">
    $(".display-type").on('change', function () {
        $(".submit").click();
    });
    function view(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/submissions/view/',
            data: 'id=' + id,
            beforeSend: function () {
                $("#view").html("Please wait...");
            },
            success: function (data) {
                $("#view").html(data);
            }
        });
    }
</script>

