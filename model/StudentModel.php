<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setStudentRegister() {

    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO student
            (`fname`,
             `lname`,
             `email`,
             `gender`,
             `address`,
             `nic`,
             `mobile`,
             `parent_mobile`,
             `created_user`)
VALUES ('" . $_POST['fname'] . "',
        '" . $_POST['lname'] . "',
        '" . $_POST['email'] . "',
        '" . $_POST['gender'] . "',
        '" . $_POST['address'] . "',
        '" . $_POST['nic'] . "',
        '" . $_POST['mobile'] . "',
        '" . $_POST['parent_mobile'] . "',
        '" . $_SESSION['ssn_user']['id'] . "');";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        $username = 'STU' . $last_id;
        //echo '<p class="bg-success">New record created successfully<p>';

                        include './model/MESSAGE_LIST.php';

        $msg = $_STUDENT_CREATION.$username;
        sendSMS($_POST['mobile'], $msg);
        //update 
        $sql_2 = "UPDATE student SET username = '$username' WHERE id = " . $last_id;

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
/**
 * 
 * @param type $username
 * @param type $conn
 * @param type $user_role LECTURE | 
 */
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
        'STUDENT',
        '1',
        '" . $_SESSION['ssn_user']['username'] . "');";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>User ID is: " . $username . '</h2>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

//    mysqli_close($conn);
}


function getStudentList(){
      // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM student";
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