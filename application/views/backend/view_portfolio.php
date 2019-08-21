
<div class="row">
    <div class="col-lg-12"> 
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        
                        <div class="ibox-content">
                            
                            <table class="table table-striped table-bordered table-hover all-categories" id="dataTables-example">
                                <tr>
                                    <th><strong>Post Id</strong></th>
                                    <td><?php echo $portfolios[0]['post_id'] ?></td>
                                </tr>
                                <tr>
                                    <th><strong>Post Title</strong</th>
                                    <td><?php echo $portfolios[0]['post_title'] ?></td>
                                </tr>
                                <tr>
                                    <th><strong>Post Description</strong</th>
                                    <td><?php echo $portfolios[0]['post_description'] ?></td>
                                </tr>
                                <tr>
                                    <th><strong>Post Author</strong</th>
                                    <td><?php  $controller->get_username($portfolios[0]['user_id']) ?></td>
                                </tr>
                                <tr>
                                    <th><strong>Post Type</strong</th>
                                    <td>
                                      <?php if($portfolios[0]['type'] == 1){
                                          echo "Image";
                                      } else if($portfolios[0]['type'] == 2){
                                          echo "Audio";
                                      } else if($portfolios[0]['type'] == 3){
                                          echo "Video";
                                      } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Uploads</th>
                                    <td>
                                    <?php foreach($portfolios as $upload) { ?>
                                      <table class="table table-striped table-bordered table-hover  ">
                                      <tr>
                                        <th>Id</th>
                                        <td><?php echo $upload['id'] ?></td>
                               
                                      </tr>
                                      <tr>
                                        <th>Title</th>
                                        <td><?php echo $upload['title'] ?></td>
                                      </tr>
                                      <tr>
                                        <th>Description</th>
                                        <td><?php echo $upload['description'] ?></td>
                                      </tr>
                                      <tr>
                                        <th>Category</th>
                                        <td><?php echo $upload['categories'] ?></td>
                                      </tr>

                                      <tr>
                                        <th>Tags</th>
                                        <td><?php echo $upload['tags'] ?></td>
                                      </tr>
                                      <tr>
                                        <th>File</th>
                                        <td><a href="<?php echo base_url() . 'uploads/portfolios/' . $upload['file']?>"><?php echo $upload['file'] ?></a></td>
                                      </tr>
                                      <tr>
                                        <th>Illus_clip_art</th>
                                        <td>
                                        <?php if($upload['editorial'] == 1){
                                            echo "Yes";
                                        } else if($upload['editorial'] == 2){
                                            echo "No";
                                        } ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Editorial</th>
                                        <td>
                                        <?php if($upload['editorial'] == 1){
                                            echo "Yes";
                                        } else if($upload['editorial'] == 2){
                                            echo "No";
                                        } ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Status</th>
                                        <td>
                                        <?php if($upload['status'] == 0){
                                        ?>
                                        <button type="button" class="btn btn-primary"><a class="category-action" href="<?php echo base_url() ?>admin/approve_post/<?php echo $portfolios[0]['post_id'] ?>/<?php echo $upload['id'] ?>">approve</a></button>
                                        <?php
                                        }else if($upload['status'] == 1){
                                          ?>
                                          <button type="button" class="btn btn-success"><a class="category-action">Approved</a></button>
                                          <?php
                                        } ?>
                                        </td>
                                      </tr>
                                      
                                      </table>
                                      <hr><hr>
                                    <?php } ?>
                                    </td>
                                </tr>
                               
                            </table>
                            <hr><hr>
                           
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