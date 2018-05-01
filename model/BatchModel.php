<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function courseBatchCreation() {
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `batch_course`
            (`course_id`,
             `year`,
             `course_year`)
VALUES ('".$_POST['course_id']."',
        '".$_POST['year']."',
        '".$_POST['course_id']."-".$_POST['year']."');";

    if (mysqli_query($conn, $sql)) {
        echo '<p class="bg-success msg-success"> New record created successfully </p>';
    } else {
        echo '<p class="bg-danger msg-error"> Invalid input found </p>';
    }

    mysqli_close($conn);
}


function getBatchList($course_id) {
    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "select batch_course.*,course.course_name,course.duration from batch_course
inner join course
on batch_course.course_id = course.id WHERE batch_course.course_id = ".$course_id;
    
    //echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return $result;
    } else {
        return FALSE;
    }

    mysqli_close($conn);
}

function getAllBatchList() {
    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "select batch_course.*,course.course_name,course.duration from batch_course
inner join course
on batch_course.course_id = course.id WHERE batch_course.course_id";
    echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return $result;
    } else {
        return FALSE;
    }

    mysqli_close($conn);
}



?>
