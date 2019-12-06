<?php 

include_once "../assets/Users.php";
$database = new Database();
$db = $database->getConnection();
if(isset($_POST['first-name'])){$fname = mysqli_real_escape_string($db,$_POST['first-name']);}else{$fname = '';}
if(isset($_POST['last-name'])){$lname = mysqli_real_escape_string($db,$_POST['last-name']);}else{$lname = '';}
if(isset($_POST['email'])){$email = mysqli_real_escape_string($db,$_POST['email']);}else{$email = '';}
if(isset($_POST['phone'])){$phone = mysqli_real_escape_string($db,$_POST['phone']);}else{$phone = '';}
if(isset($_POST['message'])){$msg = mysqli_real_escape_string($db,$_POST['message']);}else{$msg = '';}
if(isset($_POST['submit'])){
    $name=$fname.' '.$lname;
    $validate="INSERT into demo_user (name,phone,email,message,type) values ('$name','$phone','$email','$msg','contact')";    
            if ($db->query($validate)) {
                        $email_ids = 'contact@domain-education.com,abhishek1404@gmail.com,swapnil.ajmera@gmail.com';
                        $subject = $fname.' '.$lname.' filled Contact Form ';
                        $message="<b>Name:</b><br><br>".$fname." ".$lname." <br><br><b>Phone:</b><br><br>".$phone." <br><br> <b>Email:</b>".$email." <br><br> <b>Message: </b>".$msg." <br><br> " ;
                        $header = "MIME-Version: 1.0" . "\r\n";
                        $header.= "Content-type:text/html;charset=iso-8859-1"."\r\n";
                        $header.= "From:contact@wingxp.com"; 
                        //mail($email_ids,$subject,$message,$header);    
                        echo '<div class="alert alert-success alert-dismissible">
                        <strong>Success!</strong> Our Team will Contact you Soon !
                      </div>';                       
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible">
                        <strong>Sorry !</strong> There is some error in the system. Please try after some time.
                      </div>';

            }
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="main_blue.css">
    <link rel="stylesheet" href="assets/css/util.css">
     <link rel="stylesheet" href="assets/css/font.css">
    <link rel="icon" href="http://www.wingxp.com/favicon.ico" type="image/gif" sizes="16x16">
    <link rel="icon" href="http://www.wingxp.com/favicon.ico" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/owl.carousel.js"></script>

     <div class="banner__wrapper">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar-hide">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="color: #696969;font-size: 20px;font-weight: 900;">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="2q">
                        <a class="nav-link" href="http://www.wingxp.com/login" style="color: #696969;font-size: 20px;font-weight: 900;">Login</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" style="color: #696969;font-size: 20px;font-weight: 900;" href="http://www.wingxp.com/login/school_registration.php">Sign
                            Up</a> </li>
                </ul>
            </div>
        </nav>
        <div class="carousel-indicators arrow bounce">
            <a href="#new_two" class=""><i class="fa fa-arrow-down fa-2x arrow-icon"></i></a>
        </div>
    </div>

    <div class="middle__wrapper">
        <div class="container">
            <p>
                Empower students to match their<br>
                Flair Interest and Desire<br>
                with the Expert Led<br>
                Online School Co Curricualr Clubs
            </p>
        </div>
    </div>

    <div class="club__wrapper pd-100">
        <div class="container">
            <h1 class="club__wrapper--headerMain">WingXP</h1>
            <h1 class="club__wrapper--headerSub">Online School Co Curricualr Clubs</h1>
            <p class="club__wrapper--description">Empower students to match their Flair Interest and Desire<br>
                with the Expert Led </p>
        </div>
    </div>

   <div class="activites__wrapper pd-100">
        <div class="container">
            <h1 class="activites__wrapper--header">Activities</h1>
            <p class="activites__wrapper--description">Empower students to match their Flair Interest and Desirewith
                the Expert Led<br>
                Online School Co Curricualr Clubs</p>
            <div class="activites__wrapper--grid">
                <div class="wrapper--col col-1-of-6">
                    <div class="col--image">
                        <img src="assets/images/discuss-issue.png" alt="">
                        <h1>Discussions</h1>
                        <p>A club is about discussing the ideas, views and  insights in the area of itnerest. A guided discussion helps the participants to engage in a fruitful manner.</p>
                    </div>
                </div>
                <div class="wrapper--col col-2-of-6">
                    <div class="col--image">
                        <img src="assets/images/video-lecture.png" alt="">
                        <h1>Live Courses</h1>
                       <p>The enhance the expression one needs to go deeper into a topic. The Live Courses with the Experts help the students develop particular skills in more structured manner. The Course is conducted by experienced hand and is live with in-class doubt removal.</p>
                    </div>
                </div>
                <div class="wrapper--col col-3-of-6">
                    <div class="col--image">
                        <img src="assets/images/webinar.png" alt="">
                        <h1>Workshops</h1>
                        <p>A 1 to 3 day synchronous address by a expert on a particular topic. The objective of the worskhopsmay vary from exploratory, exposure oriented, activity based or learning a particualr critical component of a sengment</p>
                    </div>
                </div>
                <div class="wrapper--col col-4-of-6">
                    <div class="col--image">
                        <img src="assets/images/checklist.png" alt="">
                        <h1>Tests</h1>
                        <p>Tests A set of Tests to gauge the understanding of the topic. The  Tests are creatied by the experts to help students check their understanding at a deeper level.</p>
                    </div>
                </div>
                <div class="wrapper--col col-5-of-6">
                    <div class="col--image">
                        <img src="assets/images/review.png" alt="">
                        <h1>Reviews</h1>
                       
                    </div>
                </div>
                <div class="wrapper--col col-6-of-6">
                    <div class="col--image">
                        <img src="assets/images/life-guard-float.png" alt="">
                        <h1>Webinar</h1>
                        <p>Realtime Addressing and Lecture by an Expert on a designed agenda. There could be one or multiple speakers for the same. The webinar is followed by query session for the audience by the experts themseves.</p>
                    </div>
                </div>
            </div>
            <span class="more__span">and more...</span>
        </div>
    </div>
    <div class="demo__wrapper">
        <div class="container">
            <div class="demo__wrapper--btn">
                <a href="#" class="demo__wrapper--link" data-toggle="modal" data-target="#exampleModalCenter-Demo">SEE
                    DEMO</a>
            </div>
        </div>
    </div>
    <div class="featured__wrapper pd-100">
        <div class="container">
            <div class="featured__grid">
                <div class="featured__wrapper--first">
                    <form action="" class="featured__wrapper--form">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="user_name" class="featured__wrapper-fields">
                        <label for="mail">Email:</label>
                        <input type="email" id="mail" name="user_email" class="featured__wrapper-fields">
                        <label for="mail">Message:</label>
                        <textarea name="" id="" class="featured__wrapper-textarea"></textarea>
                        <a href="#" class="featured__wrapper--btn">Submit</a>
                    </form>
                </div>
                <div class="featured__wrapper--second">
                    <ul class="featured__list">
                        <li class="featured___li"><h1>ADDRESS </h1> <span>
                            domain E 472-A, Talwandi, Near Modern School, <br>Kota, Rajasthan Pin Code: 324005</span></li>
                        <li class="featured___li"> <h1>PHONE  </h1> <span>0744-2407128</span></li>
                        <li class="featured___li"><h1>EMAIL</h1> <span>demo@wingxp.com</span></li>
                        <li class="featured___li"><h1>SOCIAL</h1> <span><i class="fab fa-facebook-f fa-fw"></i><i class="fab fa-twitter fa-fw"></i><i class="fab fa-google-plus-g fa-fw" ></i></span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #17a2b8;">
                    <h1 class="xplore-head modal-title">XPLORE the world of knowledge</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle close-icon"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="col-inner-of-3">
                            <div class="col-one">
                                <div>
                                    <img src="assets/images/xplore-1.png" alt="" class="xplore-fav">
                                </div>
                                <p class="xplore-desc">Get introduced to the topic through the Video / e-Book
                                    library
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xplore-2.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Take up engaging quizzes and polls
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xplore-3.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Subscribe to new weekly / monthly articles
                                </p>
                            </div>
                        </div>
                        <p class="div-desc">An age appropriate, curated content platform introducing students
                            to a range of
                            topics relevant in today’s world
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #17a2b8;">
                    <h1 class="xplore-head modal-title">XPERIENCE our new age courses and workshops
                    </h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                   "><i class="fas fa-times-circle close-icon"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="col-inner-of-3">
                            <div class="col-one">
                                <div>
                                    <img src="assets/images/xperience-1.png" alt="" class="xplore-fav">
                                </div>
                                <p class="xplore-desc">Develop deeper into the topic through Webinars by
                                    experts
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xperience-3.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Do-along Workshops
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xperience-2.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Empower by getting into Courses & learn new age skills

                                </p>
                            </div>
                        </div>
                        <p class="div-desc">Online live courses, workshops, webinars and projects run by
                            experts to
                            give students a headstart in learning a topic

                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #17a2b8;">
                    <h1 class="xplore-head modal-title">XPRESS yourself</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;
                       "><i class="fas fa-times-circle close-icon"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="col-inner-of-3">
                            <div class="col-one">
                                <div>
                                    <img src="assets/images/xpress-1.png" alt="" class="xplore-fav">
                                </div>
                                <p class="xplore-desc">Connect with your peers and share your learnings
                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xpress-2.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Create and
                                    publish your projects on school community

                                </p>
                            </div>
                            <div class="col-one">
                                <img src="assets/images/xpress-3.png" alt="" class="xplore-fav">
                                <p class="xplore-desc">Intra / Inter-School Contest
                                </p>
                            </div>
                        </div>
                        <p class="div-desc">Inter-school platform to showcase student creations allowing them
                            to
                            learn
                            with their peers
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter-Demo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #17a2b8;border-bottom: none">
                    <h5 class="mod-title" id="exampleModalLabel">Contact Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 30px;"><i class="fas fa-times-circle" style="margin-top: 15px;  color: #fff;"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <form id="contact_form" action="index.php" method="POST" class="demo_new-wrap">
                                <div class="form-group form-name">
                                    <input type="text" placeholder="Name" name="c_name" id="c_name" class="form-control"
                                        required="" style="width: 100%">
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Email" name="c_sname" id="c_sname" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <input type="tel" placeholder="Phone" name="c_phone" id="c_phone" class="form-control"
                                        pattern="[1-9]{1}[0-9]{9}" title="Enter Valid 10 digit Mobile Number" required>
                                </div>
                                <div class="form-group form_textarea">
                                    <textarea style="width: 100%" id="msg" name="msg" placeholder="Message" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="submit-modal-btn" id="c_sub" name="c_sub">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="featured__wrapper pd-100">
        <div class="container">
            <div class="container-contact100">
                <div class="wrap-contact100">
                    <form class="contact100-form validate-form" action="#" method="POST">
                        <span class="contact100-form-title">
                            Send Us A Message
                        </span>
        
                        <label class="label-input100" for="first-name">Tell us your name *</label>
                        <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
                            <input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                            <input class="input100" type="text" name="last-name" placeholder="Last name">
                            <span class="focus-input100"></span>
                        </div>
        
                        <label class="label-input100" for="email">Enter your email *</label>
                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
                            <span class="focus-input100"></span>
                        </div>
        
                        <label class="label-input100" for="phone">Enter phone number</label>
                        <div class="wrap-input100">
                            <input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
                            <span class="focus-input100"></span>
                        </div>
        
                        <label class="label-input100" for="message">Message *</label>
                        <div class="wrap-input100 validate-input" data-validate = "Message is required">
                            <textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
                            <span class="focus-input100"></span>
                        </div>
        
                        <div class="container-contact100-form-btn">
                            <button type="submit" name="submit" class="contact100-form-btn">
                                Send Message
                            </button>
                        </div>
                    </form>
        
                    <div class="contact100-more flex-col-c-m" style="background-image: url('assets/images/bg-01.jpg');">
                        <div class="flex-w size1 p-b-47">
                            <div class="txt1 p-r-25">
                                <span class="lnr lnr-map-marker"></span>
                            </div>
        
                            <div class="flex-col size2">
                                <span class="txt1 p-b-20">
                                    Address
                                </span>
        
                                <span class="txt2">
                                    Aston Building 10th Floor, Shastri Nagar Andheri (W) - 400053.
                                </span>
                            </div>
                        </div>
        
                        <div class="dis-flex size1 p-b-47">
                            <div class="txt1 p-r-25">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
        
                            <div class="flex-col size2">
                                <span class="txt1 p-b-20">
                                    Lets Talk
                                </span>
        
                                <span class="txt3">
                                    +91 9000000000
                                </span>
                            </div>
                        </div>
        
                        <div class="dis-flex size1 p-b-47">
                            <div class="txt1 p-r-25">
                                <span class="lnr lnr-envelope"></span>
                            </div>
        
                            <div class="flex-col size2">
                                <span class="txt1 p-b-20">
                                    General Support
                                </span>
        
                                <span class="txt3">
                                    contact@wingxp.com
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>