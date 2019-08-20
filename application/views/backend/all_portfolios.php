
<div class="row">
    <div class="col-lg-12"> 
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12"> 
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover all-categories" id="dataTables-example">
                                <tr>
                                    <th>Post Id</th>
                                    <th>Post Title</th>
                                    <th>Author</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                if ($portfolios) {
                                    foreach ($portfolios as $portfolio) {       
                                ?>
                                    <tr>
                                      <td><?php echo $portfolio['post_id'] ?></td>
                                      <td><?php echo $portfolio['title'] ?></td>
                                      <td><?php  $controller->get_username($portfolio['user_id']) ?></td>
                                      <td>
                                        <?php if($portfolio['type'] == 1){
                                            echo "Image";
                                        } else if($portfolio['type'] == 2){
                                            echo "Audio";
                                        } else if($portfolio['type'] == 3){
                                            echo "Video";
                                        } ?>
                                      </td>
                                      <td> <button type="button" class="btn btn-primary"><a class="category-action" href="<?php echo base_url() ?>admin/view_portfolio/<?php echo $portfolio['post_id'] ?>">View</a></button></td>  
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4">No Portfolios</td></tr>';
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