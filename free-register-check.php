<?php
if(!(isset($_SESSION['free_user_id']) && $_SESSION['free_user_id']!='')) {
    header('Location:free-sample-introduction');
}
?>   