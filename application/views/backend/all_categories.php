<?php //print_r($categories) ?>
<div class="row">
    <div class="col-lg-12"> 
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                        <button type="button" class="btn btn-primary pull-right"><a class="category-action"  href="<?php echo base_url().'admin/add_category'?>">Add New Category</a></button>
							
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover all-categories" id="dataTables-example">
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                if ($categories) {
                                    foreach ($categories as $category) {
                                ?>
                                    <tr>
                                        <td><?php echo $category['id'] ?></td>  
                                        <td><?php echo $category['name'] ?></td>
                                        <td><?php echo $category['created_at'] ?></td>
                                        <td><?php if($category['status']==1){ ?>
                                            <button type="button" class="btn btn-success">Active</button>
                                        <?php }else if($category['status']==0){ ?>
                                            <button type="button" class="btn btn-danger">Inactive</button>
                                        <?php } ?></td>
                                        <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-danger"><a class="category-action" href="<?php echo base_url() ?>admin/delete_category/<?php echo $category['id'] ?>">Delete</a></button>
                                            <!-- <button type="button" class="btn btn-warning"><a class="category-action" href="">Edit</a></button> -->
                                        </div>
                                        </td>
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