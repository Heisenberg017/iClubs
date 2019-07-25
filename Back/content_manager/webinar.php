<?php
session_start();
$_SESSION['club_id']='club_21';
include_once "header.php";
if(isset($_GET['id'])){
    $req = 'select status from webinar where webinar_id= "'.$_GET['id'].'" ';
    $resp = $conn->query($req);
    $exists = $resp->fetch_array();
    if($exists['status']==1)
    {echo '<script>alert("Contetnt Already Approved Cannot Edit.");window.history.back() </script>'; die;}
    else
    {
    $id = $_GET['id'];
    $web_up = "SELECT title,speaker,description,duration,date,start_time,mrp_price,
    school_price,learning,vendor_id,topic_id,class_applicable_for,subscription_level,
    start_time,end_time,speaker_img,speaker_desc,link,image from webinar where webinar_id= '$id'";
    $result = $conn->query($web_up);
    while($row = $result->fetch_array())
    {
     $title =$row['title'];
     $speaker = $row['speaker'];
     $description =$row['description'];
     $duration = date("h:i",strtotime($row['duration']));
     $date =$row['date'];    
     $topic_id =$row['topic_id']; 
     $start =$row['start_time'];
     $end =$row['end_time'];
     $price =$row['mrp_price'];
     $school_price =$row['school_price'];
     $learning =$row['learning'];
     $vendor_id =$row['vendor_id'];
     $class = explode(",",$row['class_applicable_for']);
     $sub = $row['subscription_level'];
     $speaker_image = $row['speaker_img'];
     $speaker_desc = $row['speaker_desc'];
     $link = $row['link'];
     $image = $row['image'];
    }
}}
else{

}

?>
 
    <div class="content">
        <h1 class="ribbon">Webinar Details:</h1>
        <form action="" id="form">
        <div class="input-group">
                    <select id="topic" name="topic" class="__select">
                    <option value="" >Choose Topic</option>
                    <?php 
                    $v=$conn->query("select topic_id,topic_name from topic where club_id= '".$_SESSION['club_id']."'");
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
                    <input type="text" value="<?php if(isset($title)){echo $title;}else{}?>" name="course" id="course" placeholder="Enter Title Here" />
                </div>
                <a href="#" class="more-link">Change Vendor</a>
            </div>
            <h1 class="text-head">Enter Description Below: </h1>
            <textarea name="editor1"><?php if(isset($description)){echo $description;}else{}?></textarea>
            <div class="left-right-div">
                <div class="input-group">
                    <input type="text" value="<?php if(isset($speaker)){echo $speaker;}else{}?>" name="speaker" id="speaker" placeholder="Enter Speaker Name" />
                </div>
                
                <div class="input-group">
                    <input type="text" value="<?php if(isset($duration)){echo $duration;}else{}?>" name="duration" id="duration" id="name" placeholder="Enter Duration In HH:MM" />
                </div>
                <div class="input-group">
                    <input type="text" value="<?php if(isset($speaker_desc)){echo $speaker_desc;}else{}?>" name="speaker_desc" id="speaker_desc" placeholder="Enter Speaker Designation" />
                </div>
            </div>
            <h1 class="text-head">What Will I Get ?</h1>
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
                                    <input type="radio" name="sub" value="silver"  id=""  <?php if(isset($sub)){echo ($sub=='silver') ? 'checked="checked"' : '';}else{}?> class="option-input radio" name="example" />
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
                                    <input type="radio" name="sub" value="gold"  id="" <?php if(isset($sub)){echo ($sub=='gold') ? 'checked="checked"' : '';}else{}?> class="option-input radio" name="example" />
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
                                    <input type="radio" name="sub" value="platinum"  id="" <?php if(isset($sub)){echo ($sub=='platinum') ? 'checked="checked"' : '';}else{}?>class="option-input radio" name="example" />
                                    Select Plan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="upload_div div-new">
                <button type="button" class="video_btn" data-toggle="modal" data-target="#exampleModalCenter">
                   Upload <i class="fas fa-cloud-upload-alt"></i>
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
                    <label>Webinar Link:</label><br><input id="link" name="link" value="<?php if(isset($link)){echo $link;}else{}?>" type="text" name="link"><br>Webinar Image: <?php if(isset($image)){echo '<img src="../../assets/webinar/'.$image.'" style="height:100px; ">';}else{echo 'No image';}?><br>
                        <br>Speaker Image: <?php if(isset($speaker_image)){echo '<img src="../../assets/webinar/'.$speaker_image.'" style="height:100px"';}else{echo 'No image';}?><br><br>
                    <br><label>Upload Webinar Image:</label><br><input id="icon" type="file" name="icon">
                    <br><label>Upload Speaker Image:</label><br><input id="spk_img" type="file" name="spk_img">
                                  
                </div>

            </div>
        </div>
    </div>
            <div class="left-right-center-div">
                <div class="input-group">
                    <input type="text" value="<?php if(isset($date)){echo $date;}else{}?>" name="date" id="datepicker" placeholder="Enter Date" />
                </div>
                <div class="input-group">
                    <input type="time" value="<?php if(isset($start)){echo $start;}else{}?>" name="start" id="start" placeholder="Enter Start Time" class="field-right" />
                </div>
                <div class="input-group">
                    <input type="time" value="<?php if(isset($end)){echo $end;}else{}?>" name="end" id="end" placeholder="Enter End Time" class="field-right" />
                </div>
            </div>
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
                    <?php }?>
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
   <?php include("footer.php"); ?>
   
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
            <?php if(isset($image) && $image != ''){ echo "var icon='1';";}else{echo "var icon= $('#icon').val();";}?>
            <?php if(isset($speaker_image) && $speaker_image != ''){ echo "var spk_img='1';";}else{echo "var spk_img= $('#spk_img').val();";}?> 
            var speaker_desc= $('#speaker_desc').val(); 
            var duration= $('#duration').val(); 
            var speaker= $('#speaker').val();
            var editor1= $('#editor1').val(); 
            var editor2= $('#editor2').val(); 
            var time= $('#time').val();
            var end= $('#end').val();
            var start= $('#start').val();
            var date= $('#date').val(); 
            var vendor= $('#vendor').val();  
            var price= $('#price').val();
            var link= $('#link').val(); 
            var topic= $('#topic').val();            
            var school_price= $('#school_price').val();   
             if(link == '' || speaker_desc == '' || icon == '' || spk_img == '' || topic == '' || start == '' || end == '' ||course == '' || duration == '' || editor1 == '' || editor2 == '' || vendor == ''  || speaker == '' || time == '' || date == '' || price == '' || school_price == '' || vals == '')
            {
             alert('Please make sure all fields are filled.');
             event.preventDefault();
             }                      
            else {
            if($('[name=sub]:checked').length){
                        event.preventDefault();            
                        var form = $('#form')[0];           
                    var data = new FormData(form);    
                    data.append("class", vals);          
                    $("#sub").prop("disabled", true);          
                    $.ajax({
                        type: "POST",
                        enctype: 'multipart/form-data',
                        url: "webinar_back.php",
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
                }}}
        </script>    
    
</body>

</html>