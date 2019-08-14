<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
							
                        </div>
                        <div class="ibox-content">
							<table class="table table-striped">
                            <tr>
                                <th class="fit2content">Sr.</th>
                                <th class="fit2content">Title</th>
                                <th class="fit2content">Status</th>
                                <th class="fit2content">Removed by Admin</th>
								<th class="fit2content">Created On</th>
                                <th class="fit2content">Action</th>
                            </tr>
                            <?php
                            $page = $this->input->get('p');
                            if (isset($page)) {
                                $i = (($page - 1) * 20) + 1;
                            } else {
                                $i = 1;
                            }
                            ?>
                            <?php
                            if ($all_blogs) {
                                foreach ($all_blogs as $row) {
                                    ?>
                                    <tr>
                                        <td class="fit2content"><?php echo $i; ?></td>
                                        <td class="fit2content"><?php echo $row['title']; ?></td>
                                        <td class="fit2content"><?php echo ($row['status'] == 1) ? 'Active' : 'In-active'; ?></td>
                                        <td class="fit2content"><?php echo ($row['deleted'] == 1) ? 'Yes' : 'No'; ?></td>
                                        <td class="fit2content"><?php echo date("d-F-Y", strtotime($row['created_at'])) ?></td>
                                        <td class="fit2content">
                                            <a href="<?php echo base_url().'blogger/update_blog/'.$row['id']; ?>" class="btn btn-danger btn">Update</a>
											<a href="" class="btn btn-info btn">View</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                echo '<tr><td colspan="5">No record found.</td></tr>';
                            }
                            ?>
                        </table>
                        <div class="clearfix"></div>
                        <?php if ($this->uri->segment(3) == '') {
                            ?>
                            <ul class="pagination">
                                <?php echo $pagination; ?>
                            </ul>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>