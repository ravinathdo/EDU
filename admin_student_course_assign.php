<!--
author : promod
-->
<?php
session_start();

$_SESSION['menu'] = 'register_on_course';

include './model/DB.php';
include './model/BatchModel.php';
include './model/StudentModel.php';
include './model/CourseModel.php';
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
                            <h1><a  href="home.php"><span class="letter">E</span>du</a></h1>
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


        <div class="m">
            <div class="row">

                <div class="col-md-4">
                    <?php
                    if (isset($_POST['btnAss'])) {
                        setAssignStudentOnCourse();
                    }
                    ?>

                    <div class="panel panel-primary">
                        <div class="panel-heading">Student Course Assign</div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="admin_student_course_assign.php" method="post">
                                <span class="mando-msg">* fields are mandatory</span>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-5 control-label">Course Batch<span class="mando-msg">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="batch_id" required="" >
                                            <option value="">--select--</option>
                                            <?php
                                            $result_3 = getAllBatchList();
                                            if ($result_3 != FALSE) {
                                                while ($row = mysqli_fetch_assoc($result_3)) {
                                                    ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?> ( <?php echo $row['duration']; ?> ) <?php echo $row['year']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-5 control-label">Student  <span class="mando-msg">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="student_id" required="">
                                            <option value="">--select--</option>
                                            <?php
                                            $result_4 = getStudentList();
                                            if ($result_4 != FALSE) {
                                                while ($row = mysqli_fetch_assoc($result_4)) {
                                                    ?>
                                            <option value="<?php echo $row['id'] ?>"> [ <?php echo $row['nic'] ?> ] <?php echo $row['fname'] ?> <?php echo $row['lname'] ?> </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-5 control-label"></label>
                                    <div class="col-sm-7">
                                        <button type="submit" name="btnAss" class="btn btn-primary">Assign</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="panel-footer"></div>
                    </div>




                </div>
                <div class="col-md-8">


                    <div class="panel panel-primary">
                        <div class="panel-heading">View Course Student</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="admin_student_course_assign.php">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Course</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="batch_id" re >
                                            <option value="">--select--</option>
                                            <?php
                                            $result_5 = getAllBatchList();
                                            // echo '<tt><pre>'.var_export($result_5, TRUE).'</pre></tt>';
                                            if ($result_5 != FALSE) {
                                                while ($row = mysqli_fetch_assoc($result_5)) {
                                                    ?>
                                                    <option  <?php
                                            if (isset($_POST['batch_id'])) {
                                                if ($_POST['batch_id'] == $row['id']) {
                                                    echo 'selected=""';
                                                }
                                            }
                                                    ?>    value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?> ( <?php echo $row['duration']; ?> ) <?php echo $row['year']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" name="btnViewAss" class="btn btn-primary">View Student</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer"></div>
                    </div>





                    <div class="panel panel-warning">
                        <div class="panel-heading">Student Details</div>
                        <div class="panel-body">

                            <table id="example2" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Stu NO</th>
                                        <th>Student Name</th>
                                        <th>NIC</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Stu NO</th>
                                        <th>Student Name</th>
                                        <th>NIC</th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                                <tbody>

                                    <?php
                                    if (isset($_POST['btnAss']) || isset($_POST['btnViewAss'])) {
                                        $bid = $_POST['batch_id'];
                                        $resultx = getCourseStudentList($bid);
                                        if ($resultx != FALSE) {
                                            while ($row = mysqli_fetch_assoc($resultx)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['fname'] ?> <?= $row['lname'] ?></td>
                                                    <td><?php echo $row['nic'] ?></td>
                                                    <td><a href="admin_student_payment.php?course_id=<?= $row['course_id'] ?>&student_id=<?= $row['id'] ?>" class="btn btn-primary btn-xs">View Payment</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>





                                </tbody></table>

                        </div>
                        <div class="panel-footer"></div>
                    </div>


                </div>
            </div>
        </div>



        <!-- subscribe -->
        
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
                $('#example').DataTable();
                $('#example2').DataTable();
            });
        </script>
    </body>
</html> 