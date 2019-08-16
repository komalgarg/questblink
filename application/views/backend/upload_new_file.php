
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
                                    <select name="category[1][]" multiple id="langOpt">
                                        <option value="category here"></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Loaction</label>
                                    <input name="location[1]" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input name="type[1]" type="radio" class="" value="1" > Image 
                                    <input name="type[1]" type="radio" class="" value="2" > Audio 
                                    <input name="type[1]" type="radio" class="" value="3" > Video 
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
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <input type="button" id="add-more" class="btn btn-secondary" value="ADD" > 
                            </div>
                            <input type="hidden" id="total-blocks" value="0">
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
    <select id="category" multiple id="langOpt">
        <option value="category here"></option>
    </select>
</div>
<div class="form-group">
    <label>Loaction</label>
    <input id="location" type="text" class="form-control" >
</div>
<div class="form-group">
    <label>Type</label>
    <input  type="radio" class="type" value="1" > Image 
    <input  type="radio" class="type" value="2" > Audio 
    <input  type="radio" class="type" value="3" > Video 
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
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.multiselect.js') ?>"></script>
<script>
    jQuery('#langOpt').multiselect({
        columns: 1,
        placeholder: 'Select Languages'
    });

    var totalBlocks = $('#total-blocks').val();
    $('#add-more').click(function (e) {
        totalBlocks++;
        e.preventDefault();
        var cloned = $("#single-upload-block").clone();
        cloned.attr("id", "");
        cloned.attr("class", "single-upload");
        cloned.show();
        //cloned.find('input[id=""]').attr('name', 'chapter_name[' + total-blocks + ']').val('');
        //cloned.find('textarea[id=""]').attr('name', 'chapter_desc[' + total-blocks + ']').val();
        $('#all-upload').append(cloned);
        $('#total-blocks').val(totalBlocks);
    });
</script>