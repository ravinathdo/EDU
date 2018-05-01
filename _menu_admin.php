<li class="<?php if($_SESSION['menu']=='home') echo 'active';?>"><a href="home.php">Home</a></li>
<!--<li><a href="admin_post.php" >post</a></li>-->
<li class="<?php if($_SESSION['menu']=='course') echo 'active';?>"><a href="admin_course_creation.php"  >Course</a></li>
<li class="<?php if($_SESSION['menu']=='lecture') echo 'active';?>">
    <a href="admin_lecture_creation.php" >Lecture</a></li>
<li class="<?php if($_SESSION['menu']=='subject') echo 'active';?>">
    <a href="admin_subject_creation.php" >Subject</a></li>
<li class="<?php if($_SESSION['menu']=='student') echo 'active';?>">
    <a href="admin_student_registration.php">Student</a></li>
<li class="<?php if($_SESSION['menu']=='attendance') echo 'active';?>">
    <a href="admin_student_attendance.php">Attendance</a></li>
<li class="<?php if($_SESSION['menu']=='register_on_course') echo 'active';?>">
    <a href="admin_student_course_assign.php">Register On Course</a></li>
<li class="<?php if($_SESSION['menu']=='payment') echo 'active';?>">
    <a href="admin_student_payment_report.php">Payments</a></li>
<li class="<?php if($_SESSION['menu']=='batch_sms') echo 'active';?>">
    <a href="admin_batch_message.php">Batch-SMS</a></li>
<li class="<?php if($_SESSION['menu']=='report') echo 'active';?>">
    <a href="report_batch_student.php">Reports</a></li>