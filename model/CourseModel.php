<?php

function getCourseStudentList($bid) {
    // Create connection
    $conn = getDBConnection();
if($bid=='')
{
	echo '<p class="bg-danger">No set couse</p>';
}
else{
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

 
    
    $sql = "SELECT student.*,batch_course.course_id FROM student_batch INNER JOIN student ON student_batch.student_id = student.id 
INNER JOIN batch_course ON batch_course.id = student_batch.batch_id
WHERE student_batch.batch_id = ".$bid;
    
    //echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return $result;
    } else {
        return FALSE;
    }

}
    mysqli_close($conn);
}

function setAssignStudentOnCourse() {
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
	
if($_POST['student_id']!="--select--")
{
    $sql = "insert into student_batch
            (`student_id`,
             `batch_id`,
             `student_batch`)
values ('" . $_POST['student_id'] . "',
        '" . $_POST['batch_id'] . "',
        '" . $_POST['student_id'] . $_POST['batch_id'] . "');";

    //echo $sql;

    if (mysqli_query($conn, $sql)) {
        echo '<p class="bg-success msg-success">New record created successfully</p>';
    } else {
        echo '<p class="bg-danger msg-error">Error in record creation</p>';
    }
}

    mysqli_close($conn);
}

function getCourseSubjectDetails($cid) {
    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT course_subject.*,SUBJECT.subject_name,lecture.lecture_name FROM course_subject
INNER JOIN SUBJECT
ON course_subject.subject_id = SUBJECT.id
INNER JOIN lecture
ON course_subject.lecture_id = lecture.id WHERE course_subject.course_id = " . $cid . "  ORDER BY course_subject.year_semester ";

    // echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return $result;
    } else {
        return FALSE;
    }

    mysqli_close($conn);
}

function setCourse() {
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "insert into course
            (`course_name`,
             `description`,
             `fee`,
             `duration`,
             `course_sig`)
values ('" . $_POST['course_name'] . "',
        '" . $_POST['description'] . "',
        '" . $_POST['fee'] . "',
        '" . $_POST['duration'] . "',
        '" . $_POST['course_name'] . '-' . $_POST['duration'] . "');";

//    echo $sql;

    if (mysqli_query($conn, $sql)) {
        echo '<p class="bg-success msg-success">New record created successfully</p>';
    } else {
        echo '<p class="bg-danger msg-error">Error in record creation</p>';
    }

    mysqli_close($conn);
}

function getCourseList() {
    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM course";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return $result;
    } else {
        return FALSE;
    }

    mysqli_close($conn);
}

function setCourseSubject() {
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

if($_POST['course_id']=="--select course--")
{
	    echo '<p class="bg-danger  msg-error">Select Course</p>';
}
else if($_POST['year_semester']=="Select Course")
{
	 echo '<p class="bg-danger  msg-error">Select Year Semester</p>';
}
else if($_POST['subject_id']=="--select subject--")
{
	 echo '<p class="bg-danger  msg-error">Select Subject</p>';
}
else if($_POST['subject_id']=="--select lecture--")
{
	 echo '<p class="bg-danger  msg-error">Select Lecture</p>';
}
else{
    $sql = "INSERT INTO `course_subject`
            (`course_id`,
             `year_semester`,
             `subject_id`,
             `lecture_id`)
VALUES ('" . $_POST['course_id'] . "',
        '" . $_POST['year_semester'] . "',
        '" . $_POST['subject_id'] . "',
        '" . $_POST['lecture_id'] . "');";

    //echo $sql;
    if (mysqli_query($conn, $sql)) {
        echo '<p class="bg-success msg-success">New record created successfully</p>';
    } else {
        echo '<p class="bg-danger msg-error">Subject already added</p>';
    }
}
    mysqli_close($conn);
}

?>