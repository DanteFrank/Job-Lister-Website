<?php include 'includes/header.php'; ?>


<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Find A Job</h1>
      <form method="GET" action="index.php">
        <select name="category" class="form-control">
          <option value="0">Choose Categroy</option>
          <?php foreach($categories as $category): ?>
            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <input class="btn btn-primary btn-lg" type="submit" value="Search &raquo;">
      </form>
    </div>
  </div>
  <?php displayMessage(); ?>

  <div class="container">
    <h3><?php echo $title; ?></h3>
    <br>
    <?php foreach($jobs as $job): ?>
    <div class="row">
      <div class="col-md-10">
        <h2><?php echo $job->job_title; ?></h2>
        <p><?php echo $job->description; ?> </p>
        <p><a class="btn btn-secondary" href="job.php?id=<?php echo $job->id; ?>">View details &raquo;</a></p>
      </div>
    </div>
    <?php endforeach; ?>

    <hr>


<?php include 'includes/footer.php'; ?>
