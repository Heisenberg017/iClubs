<?php
include_once "../assets/Users.php";
$database = new Database();
$conn = $database->getConnection();
session_start();
$_SESSION['inst_id']='INST_258';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="assets/css/new.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="page-container">
      <div class="sidebar-menu">
        <div class="sidebar-header">
          <div class="logo">
            <a href="#"
              ><img
                src="../assets/images/logo.png"
                alt="logo"
            /></a>
          </div>
        </div>
        <div class="side-nav-wrapper">
          <ul class="side-nav_list">
            <li>
              <i class="fas fa-graduation-cap side-icons fa-fw"></i>
              <a href="#" class="side-nav_links"> Clubs </a>
            </li>
            <li>
              <i class="fas fa-book-open side-icons fa-fw"></i>
              <a href="#" class="side-nav_links">Content</a>
            </li>
            <li>
              <i class="fas fa-tasks side-icons fa-fw"></i>
              <a href="#" class="side-nav_links">Batches</a>
            </li>
            <li>
              <i class="fas fa-users side-icons fa-fw"></i>
              <a href="#" class="side-nav_links">Students</a>
            </li>
            <li>
              <i class="fas fa-lightbulb side-icons fa-fw"></i>
              <a href="#" class="side-nav_links">Submissions</a>
            </li>
            <li>
              <i class="fas fa-wrench side-icons fa-fw"></i>
              <a href="#" class="side-nav_links">Roles</a>
            </li>
            <li>
              <i class="fas fa-cog side-icons fa-fw"></i>
              <a href="#" class="side-nav_links">Settings</a>
            </li>
            <li>
              <i class="fas fa-envelope side-icons fa-fw"></i>
              <a href="#" class="side-nav_links">Contact Help</a>
            </li>
          </ul>
        </div>
        
          <div class="footer-wrap">
              <h1 class="copy-text">
                  Copyright &copy; iClubs 2018 .All rights reserved
              </h1>
              <a href="#">Privacy Policy</a> <span>|</span> <a href="#">Feedback</a>
          </div>
       
      </div>
      <div class="main-content" style="min-height: 100vh;">
        <nav class="right_topNav">
          <div class="inner-topNav">
              <div class="row no-gutters ">
                  <div class="col-6">
                    <div class="icon-wrap">
                      <h1 class="topNav_first">
                        ST. XAVIER'S HIGH SCHOOL <span> DASHBOARD </span>
                      </h1>
                      <i class="fas fa-home nav-icons fa-fw"></i>
                      <i class="fas fa-bell nav-icons fa-fw"></i>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="icon-wrap">
                      <h1 class="topNav_first_name">
                        Ankush Aggarwal | School Coordinator
                      </h1>
                      <img src="assets/images/user (1).png" alt="" height="40px">
                      <i class="fas fa-bars fa-fw side-icons nav-icons menu"></i>
                    </div>
                  </div>
                </div>
          </div>
        </nav>
        <div class="new-container">
          <div class="row header-row">
            <div class="col-4">
              <h1 class="header-text"><span>10 </span> Clubs</h1>
              <hr class="hr_under_one">
              <h6 class="header-text_subs">Users</h6>
            </div>
            <div class="col-8">
              <!-- <div class="sel sel--black-panther"> -->
                <select class="form-control" name="select-profession" id="club_category_id" onchange="fetch_clubs();">    
                      <option value="">Select Club Category</option>            
                      <option value="CCI_6" >iClubs</option>
                      <option value="CCI_8">School Clubs</option>
                </select>
              <!-- </div> -->
              <!-- <div class="sel sel--black-panther"> -->
                <select class="form-control" name="select-profession" id="clubs" onchange="fetch_count();">             
                <option value="">Select Club</option>                
                </select>
              <!-- </div> -->
              <hr class="hr_under"/>
              <div class="hr-new">
                  <h6 class="hr-new_one">Content</h6>
                  <h6 class="hr-new_one one_margin">Student Projects</h6>
              </div>
            </div>
        </div>
        <div class="row no-gutters">
                <div class="col-4">
                  <ul class="inner-clubs-div">
                    <li>
                        <h1 class="inner-clubs_text">
                            <span class="inner-clubs_text_span">
                            3
                        </span>
                    Grades <span class="inner_span">
                            <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                    </span></h1>
                    </li>
                    <li>
                            <h1 class="inner-clubs_text">
                                <span class="inner-clubs_text_span">
                                15
                            </span>
                        Batches <span class="inner_span">
                                <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                        </span></h1>
                        <li>
                                <h1 class="inner-clubs_text">
                                    <span class="inner-clubs_text_span">
                                    700
                                </span>
                            Students <span class="inner_span">
                                    <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                            </span></h1>
                            <li>
                                    <h1 class="inner-clubs_text">
                                        <span class="inner-clubs_text_span">
                                        20
                                    </span>
                                Admins <span class="inner_span">
                                        <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                                </span></h1>
                                <li>
                                        <h1 class="inner-clubs_text">
                                            <span class="inner-clubs_text_span">
                                            
                                        </span>
                                    Assign Clubs <span class="inner_span">
                                            <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                                    </span></h1>
                                    </li>
                                    
                  </ul>
                </div>
        <div class="col-8">
            <div class="two_half">
                <div>
                        <ul class="inner-clubs-div">
                                <li>
                                    <h1 class="inner-clubs_text">
                                        <span class="inner-clubs_text_span" id='topic'>
                                        30
                                    </span>
                                Topics <span class="inner_span">
                                        <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                                </span></h1>
                                </li>
                                <li>
                                        <h1 class="inner-clubs_text">
                                            <span class="inner-clubs_text_span">
                                            120
                                        </span>
                                    Articles <span class="inner_span">
                                             <i class="fas fa-plus club-inner_icons"></i>
                                    </span></h1>
                                </li>
                                    <li>
                                            <h1 class="inner-clubs_text">
                                                <span class="inner-clubs_text_span">
                                                120
                                            </span>
                                        Video <span class="inner_span">
                                                 <i class="fas fa-plus club-inner_icons"></i>
                                        </span></h1>
                                        </li>
                                        <li>
                                                <h1 class="inner-clubs_text">
                                                    <span class="inner-clubs_text_span">
                                                    60
                                                </span>
                                            Quiz <span class="inner_span">
                                                    <i class="fas fa-plus club-inner_icons"></i>
                                            </span></h1>
                                            </li>
                                            <li>
                                                    <h1 class="inner-clubs_text">
                                                        <span class="inner-clubs_text_span">
                                                        70
                                                    </span>
                                                Ebooks <span class="inner_span">
                                                       <i class="fas fa-plus club-inner_icons"></i>
                                                </span></h1>
                                                </li>
                                                
                                                <li>
                                                        <h1 class="inner-clubs_text">
                                                            <span class="inner-clubs_text_span">
                                                            60
                                                        </span>
                                                    Factoids <span class="inner_span">
                                                             <i class="fas fa-plus club-inner_icons"></i>
                                                    </span></h1>
                                                    </li>
                              </ul>
                </div>
            <div>
                    <ul class="inner-clubs-div">
                            <li>
                                <h1 class="inner-clubs_text">
                                    <span class="inner-clubs_text_span">
                                    240
                                </span>
                            Submitted <span class="inner_span">
                                    <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                            </span></h1>
                            </li>
                            <li>
                                    <h1 class="inner-clubs_text">
                                        <span class="inner-clubs_text_span">
                                        120
                                    </span>
                                Reviewed <span class="inner_span">
                                        <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                                </span></h1>
                            </li>
                                <li>
                                        <h1 class="inner-clubs_text">
                                            <span class="inner-clubs_text_span">
                                            120
                                        </span>
                                    Pending <span class="inner_span">
                                            <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                                    </span></h1>
                                    </li>
                                    <li>
                                            <h1 class="inner-clubs_text">
                                                <span class="inner-clubs_text_span">
                                                100 
                                            </span>
                                            Rejected <span class="inner_span">
                                                <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                                        </span></h1>
                                       </li>
                                       <li>
                                            <h1 class="inner-clubs_text">
                                                <span class="inner-clubs_text_span">
                                                20 
                                            </span>
                                            Showcased<span class="inner_span">
                                             <i class="fas fa-filter club-inner_icons"></i> <i class="fas fa-plus club-inner_icons"></i>
                                        </span></h1>
                                       </li>
                                            
                          </ul>
            </div>
        </div>
      </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script language="javascript">
  
function fetch_clubs(){
    var club_category_id= $('#club_category_id').val();
    $.ajax({
						  type: 'POST',
						  url: 'get_club.php?club_category_id='+club_category_id,
						  data: '',
						  beforeSend: function() { 
							},
						  success: function(response){
						     $('#clubs').html(response);
                 fetch_count();
						  } 
					       });
}
function fetch_count(){
    var club= $('#clubs').val();
    $.ajax({
						  type: 'POST',
						  url: 'get_count.php?club_id='+club,
						  data: '',
						  beforeSend: function() { 
							},
						  success: function(response){
                console.log(response);
						     $('#topic').html(response);
						  } 
					       });
}
</script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.js "
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous "
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js "
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 "
      crossorigin="anonymous "
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js "
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy "
      crossorigin="anonymous "
    ></script>
    <script src="assets/js/script.js"></script>
 
  </body>
</html>
