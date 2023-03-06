<?php

include("./vendor/autoload.php");

$name= $_POST["name"];
$surname= $_POST["surname"];
$age= $_POST["age"];

$app_id = '1563691';
$app_key = '226c715338747bb63bb6';
$app_secret = 'a1055a25e1aa9d567323';
$app_cluster = 'eu';

if($name == '' || $surname == '' || ($age == '' && is_nan($age))){
    echo '<h1>Introduce valid name, surname or age</h1>
    <a href="index.php">Add another student</a>';
}else  {
    $pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);

    $data["message"] = array(
        "student-name" => $name,
        "student-surname" => $surname,
        "student-age" => $age
    );

    $pusher->trigger('demo_pusher', 'add_student', $data);
    echo '<h1>Student Added succesfully</h1>
        <div class="form-group text-center">
        <a href="index.php">Add another student</a>
        </div>';
}
