<?php 
session_start();
$club_id = $_SESSION['club_id'];
$inst_id = $_SESSION['inst_id'];
$Userid = $_SESSION['Userid'];
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
$name=mysqli_real_escape_string($conn,$_POST['course']);
$description=mysqli_real_escape_string($conn,$_POST['editor1']);
$duration=mysqli_real_escape_string($conn,$_POST['duration']);
$author=mysqli_real_escape_string($conn,$_POST['author']);
$price=mysqli_real_escape_string($conn,$_POST['mrp_price']);
$school_price=mysqli_real_escape_string($conn,$_POST['school_price']);
$vendor=mysqli_real_escape_string($conn,$_POST['vendor']);
$class=mysqli_real_escape_string($conn,$_POST['class']);
$topic=mysqli_real_escape_string($conn,$_POST['topic']);
$sub=mysqli_real_escape_string($conn,$_POST['sub']);
function ren_save( $id='fileToUpload' ){
    $target_dir = "../assets/ebook/";
    $f = $target_dir . basename($_FILES[$id]["name"]);
    $filetype = strtolower(pathinfo($f,PATHINFO_EXTENSION));
    $file = date("hisa").rand(0,10).rand(0,10).".".$filetype;
    move_uploaded_file($_FILES[$id]["tmp_name"], $target_dir.$file);  
    return $file;      
    unset($f);                               
    }



if(isset($_POST['action']))
{   
    if ($_POST['action']=='update')
    { 
        //New Img with new name upload
        
        $f=ren_save();
                      
                $book_id=mysqli_real_escape_string($conn,$_POST['id']);
                $ebk_up = "SELECT ebook_file from school__ebook where book_id = '$book_id'; ";
                $ebk_up .= "UPDATE  school__ebook SET name = '$name', description='$description',
                duration='$duration',author='$author',class_applicable_for='$class',
                subscription_level='$sub',topic_id='$topic',";
                if($_FILES['fileToUpload']['name']==''){}else{$ebk_up .= "ebook_file='$f',";}
                $ebk_up .= "school_price='$school_price',mrp_price='$price', club_id='$club_id',
                vendor_id='$vendor',inst_id='$inst_id',cc_id='$Userid' where book_id= '$book_id';";                
                if ($conn->multi_query($ebk_up))
                {       
                    do {
                        
                                if ($result = $conn->store_result()) 
                                {
                                    while ($row = $result->fetch_row()) 
                                    {               
                                    $var = (string) $row[0];
                                    
                                    error_reporting(0);
                                    if($_FILES['fileToUpload']['name']!==''){
                                    if(!unlink('../assets/ebook/'.$var)){}else{}
                                    }
                                    echo 'updated';
                                    }                                    
                                    

                        
                                }
                        }
                        while ($conn->next_result());
                }
                else{               
                    echo 'update failed !';             
                }
        
     }


    else if ($_POST['action']=='publish')
    {  
         //check for existing vendor
        $check="SELECT * FROM school__ebook WHERE name = '$name'";
        $result1 = $conn->query($check);
        $num_rows = mysqli_num_rows($result1);
    
        if ($num_rows>=1) 
        {        
        echo "exists";        
         } 
    
        else 
        {
                                //File upload
                               
                                $f=ren_save();
                     
                            //Data Upload
                            
                            $sql = "INSERT INTO school__ebook  (name,description,duration,author,class_applicable_for,subscription_level,topic_id,";
                            if($_FILES['fileToUpload']['name']==''){}else{$sql .= "ebook_file,";}
                            $sql .= "mrp_price,school_price,club_id,vendor_id,inst_id,cc_id) VALUES ('$name','$description','$duration','$author','$class','$sub','$topic',";
                            if($_FILES['fileToUpload']['name']==''){}else{$sql .= "'$f',";}
                            $sql .= "'$price','$school_price','$club_id','$vendor','$inst_id','$Userid');";
                            $sql .= "SELECT LAST_INSERT_ID()";                                              
                            if ($conn->multi_query($sql))
                            {       
                                do {
                                    
                                            if ($result = $conn->store_result()) 
                                            {
                                                while ($row = $result->fetch_row()) 
                                                {               
                                                $var = (string) $row[0];
                                                }
                                                
                                                $book_id = "sc_ebk_".$var."";
                                                $sqli = "UPDATE  school__ebook SET book_id = '$book_id' where sno= $var";         
                                                $conn->query($sqli);
                                                echo "success";
                                                $result->free();
                                    
                                            }  
                                    }
                                    while ($conn->next_result());
                            }
                            else{               
                                echo 'failed !';             
                            }

       }
       
    }
} 


$conn->close();














