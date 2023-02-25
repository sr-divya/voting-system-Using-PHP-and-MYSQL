<?php

include('Connection.php');
include('inc/header.php');
error_reporting(0);

?>
<form method="POST" action="">
    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="col-sm-4">
        <div class="row">
        <div class="mb-3 p-3 bg-primary">
            <h1 class="text-center text-light">Register Form</h1>
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
                <button class="btn  btn-primary" name="registerbtn">Register &rarr;</button>
            </div>
            <div class="mb-3">
            <a href="login.php" class="nav-link">Already Have An Account &rarr;</a>
            </div>
        </div>
    </div>
    </div>
</form>
<?php

include('inc/footer.php');


?>

<?php

$Name=$_POST['name'];
$Email=$_POST['email'];
$Pass=$_POST['pass'];

if(isset($_POST['registerbtn'])){
        $query="insert into register(Name,Email,Password) values ('$Name','$Email','$Pass')";
        $run_query=mysqli_query($conn,$query);
        if($run_query)
        {
            echo "<h2>Registered Successfully!</h2>";
        }
        else{
            echo "<h2> Not REgisered Error!</h2>";
        }

}
?>
