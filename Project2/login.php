<?php

include('Connection.php');
include('inc/header.php');
session_start();
// $_SESSION['user']="divya";

?>

<form action="" method="post">
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    
    <div class="col-sm-4">
        <div class="row">
        <div class="mb-3 p-3 bg-success">
            <h1 class="text-center text-light">Login Form</h1>
            </div>
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
            <label for="">Password</label>
                <input type="text" name="pass" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn  btn-danger" name="loginbtn">Login &rarr;</button>
            </div>
            <div class="mb-3">
            <a href="register.php" class="nav-link">Don't Have An Account &rarr;</a>
            </div>
        </div>
    </div>
    </div>
</form>
<?php

include('inc/footer.php');

?>

<?php
$count=0;
// $Email=$_POST['email'];
// $Password=$_POST['pass'];

if(isset($_POST['loginbtn'])){

    $Name=mysqli_real_escape_string($conn,$_POST['name']);    
    $Email=mysqli_real_escape_string($conn,$_POST['email']);    
    $Password=mysqli_real_escape_string($conn,$_POST['pass']);
    $_SESSION['user']=$Name;
    $_SESSION['email']=$Email;
    
    $query="select * from register where Email='$Email' and Password='$Password' ";
    $run_query=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($run_query);

    if($result){
        if(isset($_SESSION['user']))
        {
            header("location:index.php");
        }
        else{
            header("location:login.php");
        }
    }
    else{
        echo "<h3>Invalid Crediantls?</h3>";
    }

}
