<!--
author : promod
-->
<?php
session_start();
//echo '<tt><pre>' . var_export($_SESSION['ssn_user'], TRUE) . '</pre></tt>';
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>EDU-Web</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/zoomslider.css" />

        <link rel="stylesheet" href="css/lightbox.css">
        <!-- carousel slider -->  
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> 
        <!-- //carousel slider -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <!--/web-fonts-->
        <!--        <link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
                <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">-->
        <!--//web-fonts-->
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--/banner-bottom-->
        <div class="w3_agilits_banner_bootm">
            <div class="w3_agilits_inner_bottom">
                <div class="wthree_agile_login">
                    <?php include './_top.php'; ?>	

                </div>

            </div>
        </div>
        <!--//banner-bottom-->
        <!--/banner-section-->
        <div class="demo-inner-content">
            <!--/header-w3l-->
            <div class="header-w3-agileits" id="home">
                <div class="inner-header-agile">	
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1><a  href="index.html"><span class="letter">T</span>ech <span>E</span>du</a></h1>
                        </div>
                        <!-- navbar-header -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <?php include './_menu.php'; ?>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>	
                    </nav>
                </div> 

            </div>
            <!--//header-w3l-->

        </div> 
        <!--/banner-section-->



        <div class="row">
            <div class="col-md-5">

                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Schedule Setup</div>
                    <div class="panel-body">
                        <form method="get" action="lecture_subject_schedule.php">
                            <span class="mando-msg">* fields are mandatory</span>
                            <input type="hidden" name="course_id" value="<?= $_GET['course_id']; ?>" />
                            <input type="hidden" name="course_subject_id" value="<?= $_GET['course_subject_id']; ?>" />
                            <?php include './model/DB.php'; ?>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Schedule Title <span class="mando-msg">* </span></label>
                                <input type="text" name="schedule_title" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Schedule Date <span class="mando-msg">* </span></label>
                                <input type="date" name="schedule_date" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">From Time <span class="mando-msg">* </span></label>
                                <input type="time" name="from_time"  required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">To Time</label>
                                <input type="time" name="to_time" required="" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1"></label>
                                <button type="submit" name="btnAdd" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                    <div class="panel-footer"></div>
                </div>


            </div>
            <div class="col-md-7">




                <?php
                if (isset($_GET['btnAdd'])) {


                    $sql = "INSERT INTO lecture_schedule
            (`course_subject_id`,
             `schedule_title`,
             `course_id`,
             `schedule_date`,
             `from_time`,
             `to_time`,
             `lacture_id`)
VALUES ( '" . $_GET['course_subject_id'] . "',
        '" . $_GET['schedule_title'] . "',
        '" . $_GET['course_id'] . "',
        '" . $_GET['schedule_date'] . "',
        '" . $_GET['from_time'] . "',
        '" . $_GET['to_time'] . "',
        '" . $_SESSION['ssn_user']['id'] . "')";

                    //echo $sql;
                    setData($sql, TRUE);



                    $sms_query = "SELECT student.* FROM student 
INNER JOIN student_batch ON student_batch.student_id = student.id
INNER JOIN batch_course ON batch_course.id = student_batch.batch_id
WHERE batch_course.course_id = '" . $_GET['course_id'] . "'";
                    
                    //echo $sms_query;
                    $resultSMS = getData($sms_query);

                    
                    // sms to all 
                    $msg_sms = "new lecture schedule created " . $_GET['schedule_title'];
                    //sendSMStoAll($msg);
                    if (mysqli_num_rows($resultSMS) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($resultSMS)) {
                            sendSMS($row['mobile'], $msg_sms);
                        }
                    }
                }
                ?>

                <br>
                <div class="panel panel-warning">
                    <div class="panel-heading">Listing Available Schedule</div>
                    <div class="panel-body">

                        <p>All events related to the lecturer</p>
                        <?php
                        $sql = "SELECT lecture_schedule.*,course.course_name,subject.subject_name FROM lecture_schedule INNER JOIN 
course ON lecture_schedule.course_id = course.id
INNER JOIN course_subject ON lecture_schedule.course_subject_id = course_subject.course_subject_id
INNER JOIN SUBJECT ON subject.id = course_subject.subject_id
WHERE lecture_schedule.lacture_id = '" . $_SESSION['ssn_user']['id'] . "' AND lecture_schedule.course_id= '" . $_GET['course_id'] . "' ORDER BY lecture_schedule.createdtime DESC ";

                        $resultx = getData($sql);
                        ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>course_name</th>
                                    <th>subject_name</th>
                                    <th>schedule_title</th>
                                    <th>schedule_date</th>
                                    <th>from_time</th>
                                    <th>to_tile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultx != FALSE) {
                                    while ($row = mysqli_fetch_assoc($resultx)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['course_name']; ?></td>
                                            <td><?= $row['subject_name']; ?></td>
                                            <td><?= $row['schedule_title']; ?></td>
                                            <td><?= $row['schedule_date']; ?></td>
                                            <td><?= $row['from_time']; ?></td>
                                            <td><?= $row['to_time']; ?></td>
                                            <td><a href="lecture_remove_lecture_schedule.php?id=<?= $row['id']; ?>">Remove</a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>



                    </div>
                    <div class="panel-footer"></div>
                </div>




            </div>
        </div>



       
        <!-- footer -->
        <div class="agileits_w3layouts-footer">
            <div class="col-md-6 col-sm-8 agileinfo-copyright">
                <p>© 2017 Edu. All rights reserved | Design by Pramod</p>
            </div>
            <div class="col-md-6 col-sm-4 agileinfo-icons">
                <ul>
                    <li><a class="icon fb" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="icon tw" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="icon pin" href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a class="icon db" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="icon gp" href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- footer -->
        <!-- bootstrap-modal-pop-up -->
        <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Tech Edu
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                    </div>
                    <div class="modal-body">
                        <img src="images/6.jpg" alt=" " class="img-responsive" />
                        <p>Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, 
                            nisi ut aliquid ex ea commodi consequatur? Quis autem 
                            vel eum iure reprehenderit qui in ea voluptate velit 
                            esse quam nihil molestiae consequatur, vel illum qui 
                            dolorem eum fugiat quo voluptas nulla pariatur.
                            <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
                                esse quam nihil molestiae consequatur.</i></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- //bootstrap-modal-pop-up --> 
        <!--script for portfolio-->
        <script src="js/lightbox-plus-jquery.min.js"></script>
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>
        <!--//script for portfolio-->


        <script src="js/owl.carousel.js"></script>  
        <script>
            $(document).ready(function () {
                $("#owl-demo").owlCarousel({
                    autoPlay: true, //Set AutoPlay to 3 seconds
                    items: 3,
                    itemsDesktop: [640, 2],
                    itemsDesktopSmall: [414, 1],
                    navigation: true,
                    // THIS IS THE NEW PART
                    afterAction: function (el) {
                        //remove class active
                        this
                                .$owlItems
                                .removeClass('active')
                        //add class active
                        this
                                .$owlItems //owl internal $ object containing items
                                .eq(this.currentItem + 1)
                                .addClass('active')
                    }
                    // END NEW PART

                });

            });
        </script>

        <!-- here starts scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <!-- flexSlider -->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        <!-- //flexSlider -->

        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- /ends-smoth-scrolling -->
        <!-- //here ends scrolling icon -->

        <script type="text/javascript" src="js/numscroller-1.0.js"></script>

        <script src="js/SmoothScroll.min.js"></script>

        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
//                $('#example').DataTable();
            });
        </script>
    </body>
</html> 