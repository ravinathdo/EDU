<li class="<?php if($_SESSION['menu']=='home') echo 'active';?>">
    <a href="home.php">Home</a></li>
<li class="<?php if($_SESSION['menu']=='my_course') echo 'active';?>">
    <a href="student_my_courses.php">My Course</a></li>
<li class="<?php if($_SESSION['menu']=='attendance') echo 'active';?>">
    <a href="student_attendance.php" >Attendance</a></li>
<li class="<?php if($_SESSION['menu']=='my_event_view') echo 'active';?>">
    <a href="student_event_view.php">My Event View</a></li>
<li class="<?php if($_SESSION['menu']=='payments') echo 'active';?>">
    <a href="student_payments.php">Payments</a></li>
<li ><a href="" onclick="openChatWin()"> <i class="fa fa-commenting" aria-hidden="true"></i>Chat</a></li>


<script>
    function openChatWin() {
    myWindow = window.open("chatbox/index.php", "chat", "top=50,left=500,width=500,height=600");   // Opens a new window
}
</script>