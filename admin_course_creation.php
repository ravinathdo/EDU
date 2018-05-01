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

        <!--datatables-->
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php
                    include './model/DB.php';
                    include './model/CourseModel.php';
                    if (isset($_POST['btnCourse'])) {
                        setCourse();
                    }
                    ?>
                    <!--course creation-->
                    <div class="panel panel-primary">
                        <div class="panel-heading ">
                            Course Creation
                        </div>
                        <div class="panel-body">
                            <span class="mando-msg">* fields are mandatory</span>
                            <form class="form-horizontal" action="admin_course_creation.php" method="post">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-5 control-label">Course Name <span class="mando-msg">*</span></label>
                                    <div class="col-sm-7">
                                        <input name="course_name" required=""  type="text" class="form-control" id="inputEmail3" placeholder="Name of the course">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-5 control-label">Fee <span class="mando-msg">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="number"  required=""  name="fee" class="form-control" id="inputPassword3" placeholder="Course Fee">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-5 control-label">Type <span class="mando-msg">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control"name="duration" required=""  >
                                            <option>--select--</option>
                                            <option value="FULL TIME">FULL TIME</option>
                                            <option value="PART TIME">PART TIME</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-5 control-label">Description</label>
                                    <div class="col-sm-7">
                                        <input type="text"  name="description" class="form-control" id="inputPassword3" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <button type="submit" name="btnCourse" class="btn btn-primary">Create Course</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                    <!--/.course creation-->
                </div>
                <div class="col-md-2"></div>

            </div> 



            <div class="row">
                <div class="col-md-12">

                    <table id="example" class="display" class="cell-border" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Course Name</th>
                                <th>Duration</th>
                                <th>Fee</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                        <th></th>
                        <th>Course Name</th>
                        <th>Duration</th>
                        <th>Fee</th>
                        <th></th>
                        <th></th>
                        </tfoot>
                        <tbody>
                            <?php
                            $result = getCourseList();
                            if ($result != FALSE) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["course_name"]; ?></td>
                                        <td><?php echo $row["duration"] ?></td>
                                        <td><?php echo $row["fee"] ?></td>
                                        <td><a href="admin_manage_batch.php?course_id=<?php echo $row["id"]; ?>&course_name=<?php echo $row["course_name"]; ?> [<?php echo $row["duration"] ?>]" class="btn-xs btn-warning">Manage Batch</a></td>
                                        <td><a href="admin_load_course_aditionals.php?course_id=<?php echo $row["id"]; ?>&course_name=<?php echo $row["course_name"]; ?> [<?php echo $row["duration"] ?>]">Aditionals</a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>





        </div>
    </div>

</body>


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
