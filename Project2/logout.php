<?php

if(isset($_POST['logoutbtn']))
{
    unset($_SESSION['user']);
    session_destroy();
    header("location:login.php");
}
?>

<form action="" method="post">
    <button name="logoutbtn">Log Out</button>
</form>