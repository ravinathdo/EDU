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

                <div class="col-md-4">
                    <?php
                    include './model/DB.php';
                    include './model/CourseModel.php';
                  
                    ?>
                    <!--course creation-->

                    <!--/.course creation-->
                </div>



                <div class="col-md-4">
                    <?php
                    $course_id;
                    include './model/BatchModel.php';
                    if (isset($_POST['btnBatch'])) {
                        courseBatchCreation();
                        $course_id = $_POST['course_id'];
                    }else if(isset($_POST['btnViewBatch'])){
                        $course_id = $_POST['course_id'];
                    }else{
                        $course_id = $_GET['course_id'];
                    }
                    ?>
                    <h2></h2>

                    
                    <div class="panel panel-primary">
      <div class="panel-heading">Manage Batch</div>
      <div class="panel-body">   <form action="admin_manage_batch.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Course</label>
                            <select class="form-control" name="course_id" required="">
                                <option value="">--select--</option>
                                <?php
                                $result_2 = getCourseList();
                                if ($result_2 != FALSE) {
                                    while ($row = mysqli_fetch_assoc($result_2)) {
                                        ?>
                                <option value="<?php echo $row['id']; ?>"  <?php if($course_id== $row['id']){ ?> selected=""  <?php }?>  > <?php echo $row['course_name']; ?> (<?php echo $row['duration']; ?>)</option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Batch Year</label>
                            <input value="0" type="number" required="" name="year" class="form-control" id="exampleInputPassword1" placeholder="YEAR">
                        </div>

                        <button type="submit" name="btnBatch" class="btn btn-primary">Add Batch</button>
                        <button type="submit" name="btnViewBatch" class="btn btn-warning">View Batch</button>
                    </form></div>
    </div>
                 
                   



                </div>


                <div class="col-md-4">

                </div>

            </div>


 <div class="row">


                <div class="col-md-12">

                    <table id="example2" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Course Name</th>
                                <th>YEAR</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Course Name</th>
                                <th>YEAR</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $result_3 = getBatchList($course_id);
                            if ($result_3 != FALSE) {
                                while ($row = mysqli_fetch_assoc($result_3)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['course_name']; ?> ( <?php echo $row['duration']; ?> )</td>
                                        <td><?php echo $row['year']; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody></table>

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