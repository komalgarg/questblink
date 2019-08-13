<div class="add-category-form">
    <form action="<?php echo base_url() ?>admin/save_category" method="POST">
    <div class="form-group">
        <label >Name</label>
        <input type="text" class="form-control" name="category_name"  placeholder="category name">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">ADD</button>
    </form>
</div>