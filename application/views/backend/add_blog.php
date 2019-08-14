<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <?php
                            echo form_open_multipart(base_url('blogger/save_blog'));
                            ?>
							<input type="hidden" name = "blog_id" value="<?php echo (!empty($blog)) ? $blog['id'] : ''; ?>"/>
                            <div class="form-group">
                                <label>Title </label>
                                <input name="title" type="text" class="form-control" value="<?php echo (!empty($blog['title'])) ? $blog['title'] : ''; ?>">
                            </div>
							<div class="form-group">
                                <label>Featured Image </label>
								<?php if(!empty($blog['title'])) { ?>
									<img src="<?php echo base_url().'uploads/blogs/'.$blog['image']; ?>" height="200px"/>
								<?php }?>
                                <input name="image" type="file" class="form-control" value="<?php echo (!empty($blog['image'])) ? $blog['image'] : ''; ?>">
								<input name="hidden_image" type="hidden" class="form-control" value="<?php echo (!empty($blog['image'])) ? $blog['image'] : ''; ?>">
                            </div>
							<div class="form-group">
                                <label>Status </label>
                                <select name="status" class="form-control">
									<option <?php echo ($blog['status'] == "1") ? 'selected="selected"' : '';?> value="1">Active</option>
									<option <?php echo ($blog['status'] == "0") ? 'selected="selected"' : '';?> value="0">In-active</option>
								</select>
                            </div>
							<div class="form-group">
                                <label>Description </label>
                                <textarea name="description" class="form-control" rows="4"><?php echo (!empty($blog['description'])) ? $blog['description'] : ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Save" >
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>