
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <?php
                            echo form_open_multipart(base_url('seller/save_uploaded_file'));
                            ?>
							
                            <div class="form-group">
                                <label>Porfolio Title </label>
                                <input name="post_title" type="text" class="form-control" >
                            </div>
							<div class="form-group">
                                <label>Portfolio Description </label>
                                <textarea name="post_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input name="type" type="radio" class="" value="1" > Image 
                                <input name="type" type="radio" class="" value="2" > Audio 
                                <input name="type" type="radio" class="" value="3" > Video 
                            </div>
                            <h3>Upload your files below :-</h3>
                            <div  id="all-upload">
                                <div style="padding: 50px; border: 1px solid #ccc;" class="single-upload">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title[1]" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea name="description[1]" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Category</label> 

                                    <select name="category[1]"  class="form-control">
                                    <?php foreach ($categories as $category){ ?>
                                        <option value="<?php echo $category['name'] ?>"><?php echo $category['name'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input name="tags[1]" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Loaction</label>
                                    <input name="location[1]" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>illust./Clip-Art</label>
                                    <input name="isllust_clipart[1]" type="radio" class="" value="1" > Yes 
                                    <input name="isllust_clipart[1]" type="radio" class="" value="2" > No            
                                </div>
                                <div class="form-group">
                                    <label>Editorial</label>
                                    <input name="editorial[1]" type="radio" class="" value="1" > Yes 
                                    <input name="editorial[1]" type="radio" class="" value="2" > No            
                                </div>
                                <div class="form-group">
                                    <label>Upload File</label>
                                    <input name="uploaded_file[1]" type="file" class="form-control">           
                                </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <input type="button" id="add-more" class="btn btn-secondary" value="ADD" > 
                            </div>
                            <input name="total_post" type="hidden" id="total-blocks" value="1">
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

<div style=" display: none; padding: 50px; border: 1px solid #ccc;" id="single-upload-block">
<div class="form-group">
    <label>Title</label>
    <input id="title" type="text" class="form-control" >
</div>
<div class="form-group">
    <label>Description </label>
    <textarea id="description" class="form-control" rows="2"></textarea>
</div>
<div class="form-group">
    <label>Category</label> 

    <select id="category"  class="form-control">
        <?php foreach ($categories as $category){ ?>
            <option value="<?php echo $category['name'] ?>"><?php echo $category['name'] ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group">
    <label>Tags</label>
    <input id="tags" type="text" class="form-control" >
</div>
<div class="form-group">
    <label>Loaction</label>
    <input id="location" type="text" class="form-control" >
</div>
<div class="form-group">
    <label>illust./Clip-Art</label>
    <input  type="radio" class="isllust_clipart" value="1" > Yes 
    <input  type="radio" class="isllust_clipart" value="2" > No            
</div>
<div class="form-group">
    <label>Editorial</label>
    <input  type="radio" class="editorial" value="1" > Yes 
    <input  type="radio" class="editorial" value="2" > No            
</div>
<div class="form-group">
    <label>Upload File</label>
    <input id="uploaded_file" type="file" class="form-control">           
</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.multiselect.js') ?>"></script>
<script>
    jQuery('.langOpt').multiselect({
        columns: 1,
        placeholder: 'Select Categories'
    });

    var totalBlocks = $('#total-blocks').val();
    $('#add-more').click(function (e) {
        totalBlocks++;
        e.preventDefault();
        var cloned = $("#single-upload-block").clone();
        cloned.attr("id", "");
        cloned.attr("class", "single-upload");
        cloned.show();
        cloned.find('input[id="title"]').attr('name', 'title[' + totalBlocks + ']').val('');
        cloned.find('textarea[id="description"]').attr('name', 'description[' + totalBlocks + ']').val('');
        cloned.find('select[id="category"]').attr('name', 'category[' + totalBlocks + ']').val('');
        cloned.find('input[id="location"]').attr('name', 'location[' + totalBlocks + ']').val('');
        cloned.find('input[class="isllust_clipart"]').attr('name', 'isllust_clipart[' + totalBlocks + ']');
        cloned.find('input[class="editorial"]').attr('name', 'editorial[' + totalBlocks + ']');
        cloned.find('input[id="uploaded_file"]').attr('name', 'uploaded_file[' + totalBlocks + ']').val('');
        cloned.find('input[id="tags"]').attr('name', 'tags[' + totalBlocks + ']').val('');
        $('#all-upload').append(cloned);
        $('#total-blocks').val(totalBlocks);


    });
</script>
