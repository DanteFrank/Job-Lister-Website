<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;
$template = new Template('templates/frontpage.php');

$categroy = isset($_GET['category']) ? $_GET['category'] : null;

if ($categroy) {
    $template->jobs = $job->getByCategory($categroy);
    $template->title = 'Jobs In '. $job->getCategory($categroy)->name;
} else {
    $template->title = 'Latest Jobs';
    $template->jobs = $job->getAllJobs();
}


$template->categories = $job->getCategories();


echo $template;