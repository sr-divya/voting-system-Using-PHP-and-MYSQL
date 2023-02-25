<form action="" method="post">
    <button name="btn1">Log In</button>
    <button name="btn2">register</button>
</form>

<?php

if(isset($_POST['btn1']))
{
    header("location:login.php");
}
if(isset($_POST['btn2']))
{
    header("location:register.php");
}