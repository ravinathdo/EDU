<?php
if($_SESSION['ssn_user']['role_code'] == 'STUDENT'){
    include './_menu_student.php';
}else if($_SESSION['ssn_user']['role_code'] == 'LECTURE'){
    include './_menu_lecturer.php';
} else if($_SESSION['ssn_user']['role_code'] == 'ADMIN'){
    include './_menu_admin.php';
}
?>