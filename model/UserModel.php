<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'DB.php';

function doLogin() {
    $conn = getDBConnection();
    $FLAG = false;

    //sql query
    $sql = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = PASSWORD('" . $_POST['password'] . "')";

    //echo $sql;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row

        while ($row = mysqli_fetch_assoc($result)) {
            //create assos array and add the result data
            //$userArray =  array('fname' => $row['firstname'],'lname'=>$row['lastname']);  
            $_SESSION['ssn_user'] = $row;
        }

        $FLAG = TRUE;
    } else {
        
    }


    mysqli_close($conn);
    return $FLAG;
}

?>