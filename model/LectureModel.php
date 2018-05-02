<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getMySubjectList($cid) {

    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = " SELECT course_subject.*,SUBJECT.subject_name FROM course_subject
INNER JOIN SUBJECT 
ON course_subject.subject_id = subject.id
WHERE lecture_id = " . $_SESSION['ssn_user']['id'] . " AND course_subject.course_id = ".$cid .
            " ORDER BY course_subject.year_semester ";

    
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

function getLectureSubjectList($cid) {

    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = " SELECT course_subject.*,SUBJECT.subject_name FROM course_subject
INNER JOIN SUBJECT 
ON course_subject.subject_id = subject.id
WHERE lecture_id = " . $_SESSION['ssn_lecturer']['id'] . " AND course_subject.course_id = ".$cid .
            " ORDER BY course_subject.year_semester ";

    
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




function lectureCreation() {
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO lecture
            (`lecture_name`,
             `nic`,
             `description`,
             `profile_info`)
VALUES ('" . $_POST['lecture_name'] . "',
        '" . $_POST['nic'] . "',
        '" . $_POST['description'] . "',
        '" . $_POST['profile_info'] . "');";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        $username = 'LEC' . $last_id;
        echo '<p class="bg-success msg-success">New record created successfully<p>';

        //update 
        $sql_2 = "UPDATE lecture SET username = '$username' WHERE id = " . $last_id;

        if (mysqli_query($conn, $sql_2)) {
            //insert into usertable

            setUser($username, $conn);
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

function setUser($username, $conn) {
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `users`
            (`username`,
             `password`,
             `role_code`,
             `firstlog`,
             `created_by`)
VALUES ('$username',
        PASSWORD('$username'),
        'LECTURE',
        '1',
        '" . $_SESSION['ssn_user']['username'] . "');";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>User ID is: " . $username . '</h2>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

//    mysqli_close($conn);
}

function getLectureList() {
    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM lecture";
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