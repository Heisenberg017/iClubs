
<?php
include_once "../../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $vid_up = "SELECT online_test.test_name, online_test.test_creator, online_test.duration, online_test.test_type, 
    online_test.school_price,online_test.mrp_price,online_test.class_applicable_for,online_test.test_data,vendor.vendor_name,vendor.vendor_icon,activities.icon from online_test 
    INNER JOIN vendor ON 
    online_test.vendor_id =   vendor.vendor_id  INNER JOIN activities ON
     activities.page_name LIKE 'online_test.php' where test_id= '$id'";
    $result = $conn->query($vid_up);

    while($row = $result->fetch_array())
    {
     $test_name =$row['test_name'];
     $test_creator = $row['test_creator'];
     $duration =$row['duration'];
     $test_type = $row['test_type'];
     $price =$row['mrp_price'];
     $school_price =$row['school_price'];
     $vendor=$row['vendor_name'];
     $ven_icon = $row['vendor_icon'];
     $act_icon = $row['icon'];
     $test_data =$row['test_data'];
     $class = explode(",",$row['class_applicable_for']);
    
    }
}
else{

}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://www.testune.com/spacedtimes/club_coordinator/main.css">
    <link href="http://www.testune.com/spacedtimes/content_manager/css/main.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"        crossorigin="anonymous"> 
</head>
<body>
   <div class="navigationBar">
        <div class="logoBox">
            <h1 class="logoBox-header"><a href="index.php" style="color:#fff; text-decoration:none">SPACEDTIMES</a></h1>
        </div>
        <div class="menu-wrapper">
            <i class="fas fa-bars"></i>
        </div>
         <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="button-wrapper">
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
	 
    <div class="page">
        <div class="course-section">
        <div class="course__input">
                <h1>Test</h1>
            </div>
            <img src="../../assets/vendor/<?php if(isset($ven_icon)){echo $ven_icon;}else{}?>" style="height:100px;width:100px;">
        </div>
        <img src="../../assets/activity/<?php if(isset($act_icon)){echo $act_icon;}else{}?>" style="height:100px;width:100px; margin-top:-80px;">
        <div class="course-section">
            <div class="course__input">
            <h1 style="font-size:24px;color:#777;margin-top: 5px;"><?php if(isset($test_name)){echo $test_name;}else{}?>  </h1>
            </div>

        </div>
        <div class="text-section">
            <div class="inner_text">
            <h1>Duration :<?php
function minutes($duration){
$time = explode(':', $duration);
return ($time[0]*60) + ($time[1]);
}
echo ' '.minutes($duration).' ';
?>Mins</h1>
            </div>
            <div class="inner_text-sub">
                <h1>Author : <?php if(isset($test_creator)){echo $test_creator;}else{}?></h1>
            </div>
        </div>
        <div class="info-section">
            <h1 class="description-header"><?php if(isset($test_type)){echo $test_type;}else{}?></h1>
            <p class="section-para"><?php if(isset($test_data)){echo $test_data;}else{}?></p>
        </div>
        <div class="test-section">
            <h1 class="test-header">Start Test</h1>
            <i class="fas fa-play secondary-icons"></i>
        </div>
        <div class="vendor_wrapper">
        <h5>Vendor: <?php if(isset($vendor)){echo $vendor;}else{}?></h5>
        </div>
        <div class="vendor_wrapper">
        <h5> Applicable for : <?php if(!empty($class) && isset($class) ){foreach($class as $key => $val){echo ' Class '.$val;}} else{}?></h5>
        </div>
        <div class="price-wrapper">
            <h1 style="font-size:24px;color:#777;margin-top: 5px;">Price : Rs <?php if(isset($price)){echo $price;}else{}?></h1>
        </div>
        <div class="deploy-wrapper">
            <form id="fileUploadForm" action="../deployment_control/dep.php" method="POST">
                <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{}?>">
                    <input type="hidden" name="type" value="online_test">
                    <button class="p__btn" type="submit" onclick="deploy()">DEPLOY</button>
                </form>
        </div>
    </div>
    
 
  <div class="footer">
        <div class="footerInner">
            <h1>SPACEDTIMES</h1>
        </div>
    </div>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"  crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script language="javascript">
    function deploy(){
        $.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "../deployment_control/dep.php",
    data: {price:<?php if(isset($price)){echo $price;}else{}?>},
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function (data) {        
        console.log(data);
        $("#sub").prop("disabled", false);
    },
    error: function (e) {
        $("#result").text(e.responseText);
        document.getElementById('msg').innerHTML = 'Rename File or upload smaller file!';
        $("#sub").prop("disabled", false);
    }
});
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

<script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
        CKEDITOR.replace('editor2');
    </script>		