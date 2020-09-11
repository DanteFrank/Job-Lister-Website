<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
        <h2 class="page-header"><?php echo $job->job_title ?>(<?php echo $job->location; ?>)</h2>
        <small>Posted By <?php echo $job->contact_user; ?> On <?php echo $job->post_date; ?></small>
        <hr>
        <p class="lead"><?php echo $job->description; ?></p>
        <ul class="list-group">
            <li class="list-group-item"><strong>Company: </strong><?php echo $job->company; ?></li>
            <li class="list-group-item"><strong>Salary: </strong><?php echo $job->salary; ?></li>
            <li class="list-group-item"><strong>Contact Email: </strong><?php echo $job->contact_email; ?></li>
        </ul>
        <br><br>
        <a href="index.php" class="btn btn-info">Go Back</a>
        <br><br>
        </div>
    </div>
    <div class="well">
            <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-primary">Edit</a>

            <form style="display:inline;" action="job.php" method="post">
                <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
                <input type="submit" class="btn btn-danger" value="Delete" >
            </form>
        </div>
</div>
<br><br>

<?php include 'includes/footer.php'; ?>