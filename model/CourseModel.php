<?php

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
        echo '<p class="bg-success">New record created successfully</p>';
    } else {
        echo '<p class="bg-danger">Error in record creation</p>';
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
    $conn  = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `course_subject`
            (`course_id`,
             `year_semester`,
             `subject_id`,
             `lecture_id`)
VALUES ('".$_POST['course_id']."',
        '".$_POST['year_semester']."',
        '".$_POST['subject_id']."',
        '".$_POST['lecture_id']."');";

    if (mysqli_query($conn, $sql)) {
        echo '<p class="bg-success">New record created successfully</p>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}


function getCourseSubjectList(){
    
}


?>