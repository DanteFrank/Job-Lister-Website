<?php include 'includes/header.php'; ?>

   <div class="container mt-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h2 class="page-header">Create Job Listing</h2>
            <form action="create.php" method="post">
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" class="form-control" name="company">
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input type="text" class="form-control" name="job_title">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                    <option value="0">Choose Categroy</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" class="form-control" name="salary">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location">
                </div>
                <div class="form-group">
                    <label for="contact_user">Conatct</label>
                    <input type="text" class="form-control" name="contact_user">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email">
                </div>
                <input type="submit" class="btn btn-success" value="Create" name="submit" >
            </form>
            <br><br><br>
        </div>
    </div>
   </div>

<?php include 'includes/footer.php'; ?>