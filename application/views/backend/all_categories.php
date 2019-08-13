<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Categories</h5>
							<a href="<?php echo base_url().'admin/add_category'?>">Add New Category</a>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                if ($users) {
                                    foreach ($users as $row) {
                                        $profile_progress = profile_progress($row->user_id);
                                        ?>
                                        <tr>
                                            
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4">No Category</td></tr>';
                                }
                                ?>
                            </table>
                            <div class="clearfix"></div>
                            <ul class="pagination">
                                <?php echo $pagination; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>