<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$type=$_GET['type'];
$id=$_GET['id'];
if(isset($_GET['archive'])){$f='5';}else{$f='1';}
switch ($type) {
    case 'article':
        $approve= "UPDATE school__article set status='$f' where article_id='$id'";
        break;
    case 'live_course':
    $approve=  "UPDATE school__live_course set status='$f' where course_id='$id'";
        break;
    case 'ebook':
    $approve=  "UPDATE school__ebook set status='$f' where book_id='$id'";
        break;
    case 'online_test':
    $approve=  "UPDATE school__online_test set status='$f' where test_id='$id'";
        break;
    case 'video':
    $approve=  "UPDATE school__video set status='$f' where video_id='$id'";
        break;
    case 'webinar':
    $approve= "UPDATE school__webinar set status='$f' where webinar_id='$id'";
        break;
    case 'workshop':
    $approve=  "UPDATE school__workshop set status='$f' where workshop_id='$id'";
        break;
    case 'quiz':
        $approve=  "UPDATE school__quiz set status='$f' where quiz_id='$id'";
        break;
    case 'learning_video':
        $approve=  "UPDATE school__learning_video set status='$f' where video_id='$id'";
        break;
    case 'sample_work':
        $approve=  "UPDATE school__sample_work set status='$f' where sample_work_id='$id'";
        break;
    default:
        echo 'error';
}
$result = $conn->query($approve);
if($result=='1'){echo 'Action Successful !';}else{echo 'error';}