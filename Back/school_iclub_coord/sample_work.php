<?php
session_start();
$cid = 'club_web';
$inst_id = 'inst_1';
//$cid = $_SESSION['cid'];
//$inst_id = $_SESSION['inst_id'];
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();


if(isset($_GET['id'])){
    $req = 'select status from school__sample_work where sample_work_id= "'.$_GET['id'].'" ';
    $resp = $conn->query($req);
    $exists = $resp->fetch_array();
    if($exists['status']==1)
    {echo '<script>alert("Conetnt Already Approved Cannot Edit.");window.history.back() </script>'; die;}
    else
    {
    $id = $_GET['id'];
    $vid_up = "SELECT title, description_line, duration, learning, vendor_id,topic_id,school_price,
     mrp_price, video_file,class_applicable_for,subscription_level,link,image,media_type,last_date,video_file
      from school__sample_work where sample_work_id= '$id'";
    $result = $conn->query($vid_up);

    while($row = $result->fetch_array())
    {
     $title =$row['title'];
     $description_line = $row['description_line'];
     $duration =$row['duration'];
     $learning = $row['learning'];
     $vendor_id =$row['vendor_id'];
     $price =$row['mrp_price'];
     $video_file =$row['video_file'];
     $topic_id =$row['topic_id'];
     $class = explode(",",$row['class_applicable_for']);
     $sub = $row['subscription_level'];
     $school_price =$row['school_price'];
     $link =$row['link'];
     $media =$row['media_type'];
     $image =$row['image'];
     $l_date =$row['last_date'];
     $v_file =$row['video_file'];
    }
}}
else{
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/main.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>var $j = jQuery.noConflict(true);</script>
    <script>
  $j( function() {
    dateFormat: "yy-mm-dd"
    $j( "#datepicker" ).datepicker({
  dateFormat: "yy-mm-dd"
});
  } );
  </script>
</head>

<body >
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
    <div class="content">
        <h1 class="ribbon">Sample Work:</h1>
        <form action="" id="form" enctype="multipart/form-data">
        <div class="input-group">
                    <select id="topic" name="topic" class="__select">
                    <option value="" >Choose Topic</option>
                    <?php 
                    $v=$conn->query("select topic_id,topic_name from topic where club_id= '$cid'");
                    $vs=mysqli_num_rows($v);
                    if($vs > '0'){ 
                        while($v1=mysqli_fetch_array($v)){
                                  if(isset($topic_id) && $topic_id== $v1[0]){?>
                        <option value='<?php echo $v1[0]; ?>' selected><?php echo $v1[1]; ?></option> 
                   <?php   }  else{?>
                       <option value='<?php echo $v1[0]; ?>'><?php echo $v1[1]; ?></option>
                 <?php  }
                    ?>
                             <?php }
                    }
                     else { ?>
                         <option  disabled="disabled" selected>No Topics</option>   
                    <?php } ?>
                    </select>
                </div>
            <div class="index-wrap">
                <div class="input-group">
                    <input type="text" value="<?php if(isset($title)){echo $title;}else{}?>" name="title" id="title" placeholder="Enter Title Here" />
                </div>
                <a href="#" class="more-link">Change Vendor</a>
            </div>
            <h1 class="text-head">Enter Description Below: </h1>
            <textarea name="editor1"><?php if(isset($description_line)){echo $description_line;}else{}?></textarea>
            <div class="left-right-div">
                <!--  <div class="input-group">
                    <input type="text" id="name" placeholder="Enter Author Name" />
                </div> -->
                <div class="input-group">
                    <input type="text" name="duration" value="<?php if(isset($duration)){echo $duration;}else{}?>" id="duration" placeholder="Enter Duration In HH:MM" />
                </div>
                <div class="input-group">
                    <input type="text" value="<?php if(isset($l_date)){echo $l_date;}else{}?>" name="date" id="datepicker" placeholder="Last Date" />
                </div>
            </div>
            <h1 class="text-head">What Will I Learn ? </h1>
            <textarea name="editor2"><?php if(isset($learning)){echo $learning;}else{}?></textarea>
            <h1 class="text-head">Class Is Applicable For:</h1>
            <div class="class-div">
            <div class="div-card div-card-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="class[]" value='6' <?php if(isset($class)){echo (in_array("6",$class)) ? 'checked="checked"' : '';}else{}?>><span class="checkbox-material"><span class="check"></span></span><br>
                            <span style="margin-left: -15px">Class 6</span>
                        </label>
                    </div>
                </div>
                <div class="div-card div-card-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="class[]" value='7' <?php if(isset($class)){echo (in_array("7",$class)) ? 'checked="checked"' : '';}else{}?>><span class="checkbox-material"><span class="check"></span></span><br>
                            <span style="margin-left: -15px">Class 7</span>
                        </label>
                    </div>
                </div>
                <div class="div-card div-card-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="class[]" value='8' <?php if(isset($class)){echo (in_array("8",$class)) ? 'checked="checked"' : '';}else{}?>><span class="checkbox-material"><span class="check"></span></span>
                            <br> <span style="margin-left: -15px">Class 8</span>

                        </label>
                    </div>
                </div>
                <div class="div-card div-card-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="class[]" value='9' <?php if(isset($class)){echo (in_array("9",$class)) ? 'checked="checked"' : '';}else{}?>><span class="checkbox-material"><span class="check"></span></span><br>
                            <span style="margin-left: -15px">Class 9</span>
                        </label>
                    </div>
                </div>
                <div class="div-card div-card-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="class[]" value='10' <?php if(isset($class)){echo (in_array("10",$class)) ? 'checked="checked"' : '';}else{}?>><span class="checkbox-material"><span class="check"></span></span><br>
                            <span style="margin-left:-15px">Class 10</span>
                        </label>
                    </div>
                </div>
                <div class="div-card div-card-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="class[]" value='11' <?php if(isset($class)){echo (in_array("11",$class)) ? 'checked="checked"' : '';}else{}?>><span class="checkbox-material"><span class="check"></span></span><br>
                            <span style="margin-left: -15px">Class 11</span>
                        </label>
                    </div>
                </div>
                <div class="div-card div-card-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="class[]" value='12' <?php if(isset($class)){echo (in_array("12",$class)) ? 'checked="checked"' : '';}else{}?>><span class="checkbox-material"><span class="check"></span></span><br>
                            <span style="margin-left: -15px">Class 12</span>
                        </label>
                    </div>
                </div>
            </div>
            <h1 class="text-head">Select Subscription Level:</h1>
            <div class="row flex-items-xs-middle flex-items-xs-center">
                <div class="col-xs-12 col-lg-4">
                    <div class="card text-xs-center">
                        <div class="card-header">
                            <h3 class="display-2"><span class="currency"><i class="fas fa-rupee-sign"></i></span>500<span
                                    class="period">/month</span></h3>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">
                                Silver Plan
                            </h4>
                            <ul class="list-group">
                                <li class="list-group-item">Feature 1</li>
                                <li class="list-group-item">Feature 2</li>
                            </ul>
                            <div class="radio-btn-wrap">
                                <label>
                                <input type="radio" class="option-input radio" name="sub" value="silver"  id=""  <?php if(isset($sub)){echo ($sub=='silver') ? 'checked="checked"' : '';}else{}?> />
                                    Select Plan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <div class="card text-xs-center">
                        <div class="card-header">
                            <h3 class="display-2"><span class="currency"><i class="fas fa-rupee-sign"></i></span>1000<span
                                    class="period">/month</span></h3>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">
                                Gold Plan
                            </h4>
                            <ul class="list-group">
                                <li class="list-group-item">Feature 1</li>
                                <li class="list-group-item">Feature 2</li>
                            </ul>
                            <div class="radio-btn-wrap">
                                <label>
                                <input type="radio" class="option-input radio" name="sub" value="gold"  id="" <?php if(isset($sub)){echo ($sub=='gold') ? 'checked="checked"' : '';}else{}?> />
                                    Select Plan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <div class="card text-xs-center">
                        <div class="card-header">
                            <h3 class="display-2"><span class="currency"><i class="fas fa-rupee-sign"></i></span>1500<span
                                    class="period">/month</span></h3>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">
                                Platinum Plan
                            </h4>
                            <ul class="list-group">
                                <li class="list-group-item">Feature 1</li>
                                <li class="list-group-item">Feature 2</li>
                            </ul>
                            <div class="radio-btn-wrap">
                                <label>
                                <input type="radio" class="option-input radio" name="sub" value="platinum"  id="" <?php if(isset($sub)){echo ($sub=='platinum') ? 'checked="checked"' : '';}else{}?> />
                                    Select Plan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="text-head">Upload Files Below: </h1>
            <div class="upload_div">
                <button type="button" class="video_btn" data-toggle="modal" data-target="#file">
                    Video File <i class="fas fa-cloud-upload-alt"></i>
                </button>
                <button type="button" class="video_btn" data-toggle="modal" data-target="#youtube">
                    Youtube Video <i class="fas fa-cloud-upload-alt"></i>
                </button>
            </div>
            <div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Video File Below</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="fileToUpload" type="file" name="fileToUpload">
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Paste Youtube Video Link Below</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input id="link" type="text"value="<?php if(isset($link)){echo $link;}else{}?>" name="link" placeholder="Paste youtube link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="upload_div">
                <button type="button" class="video_btn" data-toggle="modal" data-target="#exampleModalCenter">
                   Image <i class="fas fa-cloud-upload-alt"></i>
                </button>
                <button type="button" class="video_btn" data-toggle="modal" data-target="#pdfmodal">
                   PDF <i class="fas fa-cloud-upload-alt"></i>
                </button>
    </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload File Below</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Current Image: <?php if(isset($image)){}else{echo 'No image';}?><br><img src="../assets/sample_work/<?php if(isset($image)){echo $image;}else{}?>" style="height:100px; ">      <br>
                    <br><label>Upload Article Image:</label><br><input id="icon" type="file" name="icon">
                                  
                </div>

            </div>
        </div>
    </div><br>     
    <div class="modal fade" id="pdfmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload File Below</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Current PDF: <?php if(isset($pdf)){}else{echo 'No PDF';}?><br><a href="../../assets/sample_work/<?php if(isset($pdf)){echo $pdf;}else{}?>" >    </a>  <br>
                    <br><label>Upload PDF:</label><br><input id="pdf" type="file" name="pdf">
                                  
                </div>

            </div>
        </div>
    </div><br>     
        <span class="text-head">Choose Media to Display:</span> <br>
        <input type="radio" class="option-input radio" name="media" value="video"  id="" <?php if(isset($media)){echo ($media=='video') ? 'checked="checked"' : '';}else{}?> /><span class="text">Video</span> 
            <input type="radio" class="option-input radio" name="media" value="link"  id="" <?php if(isset($media)){echo ($media=='link') ? 'checked="checked"' : '';}else{}?> /><span class="text">Youtube Video</span> 
                <input type="radio" class="option-input radio" name="media" value="image"  id="" <?php if(isset($media)){echo ($media=='image') ? 'checked="checked"' : '';}else{}?> /><span class="text">Image</span> 
                    <input type="radio" class="option-input radio" name="media" value="pdf"  id="" <?php if(isset($media)){echo ($media=='pdf') ? 'checked="checked"' : '';}else{}?> /><span class="text">PDF</span> 
            <div class="left-right-center-div">
                <div class="input-group">
                    <select id="vendor" name="vendor" class="__select">
                    <?php 
                    $v=$conn->query("select vendor_id,vendor_name from vendor where 1");
                    $vs=mysqli_num_rows($v);
                    if($vs > '0'){ 
                        while($v1=mysqli_fetch_array($v)){
                                  if(isset($vendor_id) && $vendor_id== $v1[0]){?>
                        <option value='<?php echo $v1[0]; ?>' selected><?php echo $v1[1]; ?></option> 
                   <?php   }  else{?>
                       <option value='<?php echo $v1[0]; ?>'><?php echo $v1[1]; ?></option>
                 <?php  }
                    ?>
                             <?php }
                    }
                     else { ?>
                         <option  disabled="disabled" selected>No Vendors</option>   
                    <?php } $conn->close();?>
                    </select>
                </div>                
                <div class="input-group">
                <input type="text" value="<?php if(isset($price)){echo $price;}else{}?>" name="mrp_price" id="price" placeholder="Enter MRP Price" class="field-right" />
                </div>
                <div class="input-group">
                <input type="text" value="<?php if(isset($school_price)){echo $school_price;}else{}?>" name="school_price" id="school_price" placeholder="Enter School Price" class="field-right" />
                </div>
            </div>
            <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{}?>"> 
            <input type="hidden" name="action" <?php if(isset($id)){echo 'value="update"';}else{echo 'value="publish"';}?>>
            <button name="submit" id="submit" value="submit" type="submit" onclick="ajaxbackend()" class="p__btn">Publish</button>
        </form>
    </div>
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
    <script language="javascript">
    function ajaxbackend(){
    var checkboxes = document.getElementsByName('class[]');
    var vals = "";
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {
        if (checkboxes[i].checked) 
        {
            vals += ","+checkboxes[i].value;
        }
    }
    if (vals) vals = vals.substring(1);
    for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement(); }
    var course= $('#course').val(); 
    var duration= $('#duration').val(); 
    var editor1= $('#editor1').val(); 
    var editor2= $('#editor2').val(); 
    var price= $('#price').val(); 
    var link= $('#link').val();     
    var date= $('#datepicker').val(); 
    <?php if(isset($v_file) && $v_file != ''){ echo "var fileToUpload='1';";}else{echo "var fileToUpload=$('#fileToUpload').val();";}?>
    <?php if(isset($image) && $image != ''){ echo "var icon='1';";}else{echo "var icon= $('#icon').val();";}?>
    <?php if(isset($pdf) && $pdf != ''){ echo "var pdf='1';";}else{echo "var pdf= $('#pdf').val();";}?>    
    var school_price= $('#school_price').val();     
    var topic=$('#topic').val();
    if(fileToUpload == '' && link == '' && icon == '' && pdf== ''){
    alert('Please upload a file OR Paste a youtube link');
    event.preventDefault();
    }
    else{
             
        if(date == '' || topic == '' || course == '' || duration == '' || editor1 == '' || editor2 == '' || vendor == '' || school_price == '' || price == '' || vals =='')
                  {
		        alert('Please make sure all fields are filled.');
                event.preventDefault();
		  } else {
              
            if($('[name=sub]:checked').length){
                        event.preventDefault();            
                        var form = $('#form')[0];           
                    var data = new FormData(form);    
                    data.append("class", vals);          
                    $("#sub").prop("disabled", true);          
                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: "sample_work_back.php",
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        success: function (data) {   
                            console.log(data);                          
                            if (data=='success')
                        {alert('Published Successfully !');
                        location.reload(true); 
                        }else if(data=='exists')
                        {
                            alert('Already Exists !');
                        }
                        else if(data=='updated')
                        {
                            alert('Updated Successfully !');
                            $("#submit").html('Updated');
                            $("#submit").css({'background-color':'#2abfd4'});  
                            location.reload(true);
                        }                                                                      
                        },
                        error: function (e) {           
                            console.log(e);
                        }
                    });
                    }
                    else{alert('Choose Subscription');
                                event.preventDefault();
                }}}}
        </script>

    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
        CKEDITOR.replace('editor2');
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