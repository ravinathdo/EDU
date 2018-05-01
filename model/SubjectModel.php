<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setSubject() {
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `subject`
            (`subject_name`)
VALUES ('" . $_POST['subject_name'] . "');";

//    echo $sql;

    if (mysqli_query($conn, $sql)) {
        echo '<p class="bg-success msg-success">New record created successfully</p>';
    } else {
        echo '<p class="bg-danger msg-error">Error in record creation</p>';
    }

    mysqli_close($conn);
}

function getSubjectList() {
    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM subject";
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