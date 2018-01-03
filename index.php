<?php
require_once 'main.php';
if($_POST['action'] == 'Submit'){
    Validate::is_email('email');
    Validate::presence('description');
    Validate::absence('gender');
    Validate::acceptance('accept_terms');
}
$genders['M'] = "Male";
$genders['F'] = "Female";
$genders['O'] = "Other";
$app->set('genders', $genders);
$app->set('gender', 'O');
$app->page('title', 'Home');
$app->render('index');
?>
