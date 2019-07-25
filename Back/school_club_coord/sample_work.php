<?php
//$uid=$_SESSION['uid'];
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $vid_up = "SELECT sample_work.title,sample_work.last_date,topic.topic_name,sample_work.link,sample_work.media_type, sample_work.description_line,sample_work.image, sample_work.duration,
     sample_work.learning, sample_work.vendor_id,sample_work.class_applicable_for,sample_work.mrp_price, sample_work.school_price,
     sample_work.video_file,vendor.vendor_name,vendor.vendor_icon,activities.icon from sample_work
    INNER JOIN vendor ON 
    sample_work.vendor_id =   vendor.vendor_id  
    INNER JOIN topic ON 
    sample_work.topic_id =   topic.topic_id INNER JOIN activities ON
     activities.page_name LIKE 'sample_work.php' where sample_work_id= '$id'";
    $result = $conn->query($vid_up);

    while($row = $result->fetch_array())
    {
     $title =$row['title'];
     $media =$row['media_type'];
     $topic =$row['topic_name'];
     $description_line = $row['description_line'];
     $duration =$row['duration'];
     $learning = $row['learning'];
     $vendor_id =$row['vendor_name'];
     $price =$row['mrp_price'];
     $school_price =$row['school_price'];
     $video_file =$row['video_file'];
     $ven_icon = $row['vendor_icon'];
     $act_icon = $row['icon'];
     $link = $row['link'];
     $image = $row['image'];
     $l_date = $row['last_date'];
     $class = explode(",",$row['class_applicable_for']);
    }
}
else{
    echo "<script>alert('No Video Selected, Please go back and select a Video to view it...')</script>";
    die;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>


<body>
    <div class="navigationBar">
        <div class="logoBox">
            <h1 class="logoBox-header">SPACEDTIMES
        </div>
        <div class="menu-wrapper">
            <i class="fas fa-bars" onclick="openNav()"></i>
        </div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="button-wrapper">
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="page-container">
            <div class="banner--text">Video Details :</div>
        </div>
    </div>
    <div class="page-container">
        <div class="div-gap">
            <div class="title-wrap">
                <h1 class="title-head">Video
                </h1>
                <img src="../assets/vendor/<?php if(isset($ven_icon)){echo $ven_icon;}else{}?>" alt="" class="img-main">
                <img src="../assets/activity/<?php if(isset($act_icon)){echo $act_icon;}else{}?>" alt="" class="img-main">
            </div>
        </div>
        <div class="div-gap">
            <div class="desc-wrap">
                <h1 class="desc-head"><?php if(isset($title)){echo $title;}else{}?>
                </h1>
                <div style="overflow-x:auto;overflow-y: auto;max-height: 200px;">
                    <div class="desc-para"><?php if(isset($description_line)){echo $description_line;}else{}?></div>
                </div>
                <div class="float-wrap">
                    <h1 class="desc-text" style="float:right;margin-right: 15px;">Duration : <?php
function minutes($duration){
$time = explode(':', $duration);
return ($time[0]*60) + ($time[1]);
}
echo ' '.minutes($duration).' ';
?> Mins</h1>
<h1 class="desc-text" style="float:right;margin-right: 15px;">Last Date : <?php if(isset($l_date)){echo $l_date;}else{}?></h1>

                </div>

            </div>
        </div>
        <div class="div-gap">
            <div class="pre-wrap">
                <h1 class="desc-head">What Will I Get?</h1>
                <div class="pre-list" style="overflow-x:auto;overflow-y: auto;max-height: 200px;">
                <?php if(isset($learning)){echo $learning;}else{}?>
                </div>
            </div>
        </div>
        <form id="" action="dep.php" method="POST">
        <div class="div-gap">
            <h1 class="desc-head">Webinar Is Applicable For Class</h1>
            <div class="class-wrap">
            <?php if(!empty($class) && isset($class) ){foreach($class as $key => $val){if($val!==''){echo '<div class="card-class-main effect">
                    <h1 class="class-head">Class '.$val.'</h1>
                    <input type="hidden" name="class'.$val.'" value="'.$val.'">
                </div>';}else{echo '<div class="card-class-main effect">
                    <h1 class="class-head">No Class</h1>
                </div>';}}} else{}?>
            </div>
        </div>
        <div class="test-section">
            <div class="card card-5">
            <?php if($video_file=='' AND $media == 'link'){echo '<iframe  src="';}?><?php  if($video_file=='' AND $media == 'link'){ echo $link;} if($video_file=='' AND $media == 'link'){echo '" frameborder="0"
                            encrypted-media allowfullscreen allow="autoplay" ;></iframe>';}?>
                            <?php if($link=='' AND $media == 'video'){echo '<video id="video1" class="local-video" controls>
                                <source src="../assets/sample_work/';}?><?php  if($link=='' AND $media == 'video'){echo $video_file;}?><?php  if($link=='' AND $media == 'video'){echo '" width="400" type="video/mp4" controls>   
                            </video>';}?>  <?php if(isset($image) AND $media == 'image'){echo '<img src=../assets/sample_work/'.$image.'>';}else{}?>          </div>
            </div>
        </div>
        <div class="div-gap">
            <div class="last-wrap">
                <h1 class="last-text">Vendor : <?php if(isset($vendor_id)){echo $vendor_id;}else{}?></h1>
                    <h1 class="last-text">Topic : <?php if(isset($topic)){echo $topic;}else{}?></h1>
                <h1 class="last-text">Price : Rs <?php if(isset($price)){echo $price;}else{}?></h1>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{}?>">
                    <input type="hidden" name="type" value="sample_work">
                    <button class="p__btn" type="submit">DEPLOY</button>
            </form>
                
           <div class="footer">
        <div class="footerInner">
            <h1>SPACEDTIMES</h1>
        </div>
    </div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css " integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg "
        crossorigin="anonymous ">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
     
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>