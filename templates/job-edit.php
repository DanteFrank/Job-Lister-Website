<?php include 'includes/header.php'; ?>

   <div class="container mt-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h2 class="page-header">Edit Job Listing</h2>
            <form action="edit.php?id=<?php echo $job->id; ?>" method="post">
                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>">
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title; ?>">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                        <option value="0">Choose Categroy</option>
                        <?php foreach($categories as $category): ?>
                           <?php if($job->category_id == $category->id) : ?>
                                <option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
                           <?php else: ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                           <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description"  class="form-control" value="<?php echo $job->description; ?>"></textarea>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>">
                </div>
                <div class="form-group">
                    <label for="contact_user">Conatct</label>
                    <input type="text" class="form-control" name="contact_user" value="<?php echo $job->contact_user; ?>">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email" value="<?php echo $job->contact_email; ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Save" name="submit" >
            </form>
            <br><br><br>
        </div>
    </div>
   </div>

<?php include 'includes/footer.php'; ?>