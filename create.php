<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

if (isset($_POST['submit'])) {
    $data = array();
    $data['company'] = $_POST['company'];
    $data['job_title']  = $_POST['job_title'];
    $data['category_id']  = $_POST['category'];
    $data['description']  = $_POST['description'];
    $data['salary']  = $_POST['salary'];
    $data['location']  = $_POST['location'];
    $data['contact_user']  = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    if ($job->create($data)) {
        redirect('index.php', 'You have successfully created a Job Listing', 'success');
    } else {
        redirect('index.php', 'Failed to create a Job Listing', 'error');
    }

    
}

$template = new Template('templates/job-create.php');

$template->categories = $job->getCategories();


echo $template;