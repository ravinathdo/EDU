<!--
author : promod
-->
<?php session_start(); ?>
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
                    <div class="panel-heading">Event Setup</div>
                    <div class="panel-body">
<form method="get" action="lecture_subject_event.php">
    <span class="mando-msg">* fields are mandatory</span>
                    <input type="hidden" name="course_id" value="<?= $_GET['course_id']; ?>" />
                    <input type="hidden" name="course_subject_id" value="<?= $_GET['course_subject_id']; ?>" />
                    <div class="form-group">
                        <label for="exampleInputEmail1"><span class="mando-msg">*</span> Batch </label>
                       <?php
                            include './model/DB.php';
                            include './model/BatchModel.php';
                            include './model/MESSAGE_LIST.php';
                            $result_3 = getAllBatchList();?>
                        <select class="form-control" name="batch_id" required=""   >
                            <option value="">--select--</option>
                            <?php
                            if ($result_3 != FALSE) {
                                while ($row = mysqli_fetch_assoc($result_3)) {
                                    ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?> (<?php echo $row['year']; ?>)</option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Event Title</label>
                        <input type="text" name="event_title" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Type</label>
                        <select class="form-control" name="type_code" required=""  >
                            <option value="ASSI">Assignment</option>
                            <option value="EXAM">Exam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Event Date</label>
                        <input type="date" name="event_date" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Question Description (if any)</label>
                        <textarea name="question" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Marks</label>
                        <input type="number" name="marks" class="form-control" >
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

                    $sql = "INSERT INTO `batch_course_event`
            (`batch_id`,
             `course_id`,
             `event_title`,
             `type_code`,
             `event_date`,
             `marks`,
             `lecture_created`,
             `question`,
             `course_subject_id`)
VALUES ('" . $_GET['batch_id'] . "',
        '" . $_GET['course_id'] . "',
        '" . $_GET['event_title'] . "',
        '" . $_GET['type_code'] . "',
        '" . $_GET['event_date'] . "',
        '" . $_GET['marks'] . "',
        '" . $_SESSION['ssn_lecturer']['id'] . "',
        '" . $_GET['question'] . "',
        '" . $_GET['course_subject_id'] . "');";


                    //
                    setData($sql,TRUE);

                    // sms to all 
                    $msg = $_EVENT_CREATION_SMS;
                    sendSMStoAll($msg);
                }
                ?>

<br>
                <div class="panel panel-warning">
        <div class="panel-heading">List Available Events</div>
        <div class="panel-body">
            
                <p>All events related to the lecturer</p>
                <?php
                $sql = " SELECT batch_course_event.*,course_subject.year_semester,SUBJECT.subject_name FROM batch_course_event
INNER JOIN course_subject
ON batch_course_event.course_subject_id = course_subject.course_subject_id 
INNER JOIN SUBJECT
ON SUBJECT.id = course_subject.subject_id
WHERE batch_course_event.lecture_created = " . $_SESSION['ssn_lecturer']['id'];

                $resultx = getData($sql);
                ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Year Semester</th>
                            <th>Subject</th>
                            <th>Closing Date</th>
                            <th>Marks</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultx != FALSE) {
                            while ($row = mysqli_fetch_assoc($resultx)) {
                                ?>

                                <tr>
                                    <td><?= $row['event_title']; ?></td>
                                    <td><?= $row['year_semester']; ?></td>
                                    <td><?= $row['subject_name']; ?></td>
                                    <td><?= $row['event_date']; ?></td>
                                    <td><?= $row['marks']; ?></td>
                                    <td></td>
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



        <!-- subscribe -->
        <div class="w3ls-section subscribe text-center">
            <div class="container">
                <h3 class="w3ls-title">subscribe now!</h3>
                <p>Enter your email address to get the latest news, special events and student activities delivered right to your inbox.</p>
                <div class="subscribe-grid">
                    <form action="#" method="post">
                        <input type="email" placeholder="Enter your email.." name="Subscribe" required="">
                        <button class="btn1">subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- //subscribe -->
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