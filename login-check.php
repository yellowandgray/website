<?php
if(!(isset($_SESSION['student_register_id']) && $_SESSION['student_register_id']!='')) {
    header('Location:index');
}
?>   