<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">

                        </div>
                        <div class="ibox-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="approveModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Approve Website</h4>
            </div>
            <div class="modal-body" id="response_content">
                <p>Please wait...</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function approve(id) {
        $.ajax({
            url: BASE_URL + "websites/get-form",
            method: "post",
            data: "id=" + id,
            beforeSend: function () {
                $("#approveModal").modal("show");
            },
            success: function (data) {
                $("#response_content").html(data);
            }
        });
    }
</script>