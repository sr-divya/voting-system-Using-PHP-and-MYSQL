<?php

include('Connection.php');
include('inc/header.php');
error_reporting(0);
session_start();

if(!isset($_SESSION['user']))
{
    header('location:login.php');
}
include('logout.php');

?>

<style>
    label{
        font-size:18px;
    }

    input[type='checkbox']{
        font-size:20px;
    }
</style>

<!-- 
    // login form
    // register form 
    // dashboard with profile and voting preference
 -->
    <div class="container my-5 py-2 d-flex justify-content-around align-items-center">
    
    <div class="col-sm-12 col-md-4">
        <div class="row">
            
            <div class="mb-3">
                <p>Name:  <strong>
                    <?php
                        echo $_SESSION['user'];
                    ?>
                     </strong></p>
            </div>
            <div class="mb-3">
                <p>Email:  <strong>
                    <?php 
                        echo $_SESSION['email'];
                    ?>
                </strong></p>
            </div>
            <!-- <div class="mb-3">
                <button class="btn btn-danger" name="logoutbtn" onclick="window.location.href=('logout.php')" >Logout</button>
            </div> -->
        </div>
    </div>
    <form method="POST" action="">
    <h2>Vote For:</h2>
    <label for=""><input type="radio" name="vote" value="BJP">&nbsp;&nbsp;&nbsp;BJP</label><br>
    <label for=""><input type="radio" name="vote" value="BSPA">&nbsp;&nbsp;&nbsp;BSPA</label><br>
    <label for=""><input type="radio" name="vote" id="" value="SAPA">&nbsp;&nbsp;&nbsp;SAPA</label><br><br><br>

    <input type="submit" name="submitbtn" value="Submit">
    

    <!-- <div class="col-sm-12 col-md-6">
            <div class="mb-3">
                <div class="p-3 card">
                    <div class="card-heading text-center">BJP</div>
                    <div class="card-body">
                <button class="btn btn-danger">Vote</button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="p-3 card">
                    <div class="card-heading text-center">BSP</div>
                    <div class="card-body">
                <button class="btn btn-success">Vote </button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="p-3 card">
                    <div class="card-heading text-center">SAPA</div>
                    <div class="card-body">
                <button class="btn btn-success">Vote </button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="p-3 card">
                    <div class="card-heading text-center">BJP</div>
                    <div class="card-body">
                <button class="btn btn-danger">Vote </button>
                    </div>
                </div>
            </div>
    </div> -->
    </form>
</div>

<?php
 

$Vote=$_POST['vote'];
$name=$_SESSION['user'];
$email=$_SESSION['email'];
if(isset($_POST['submitbtn']))
{
    
        $NAME=mysqli_real_escape_string($conn,$_SESSION['user']);
        $EMAIL=mysqli_real_escape_string($conn,$_SESSION['email']);

        $q="select * from vote_details where Name='$NAME' and Email='$EMAIL'";

        $result=mysqli_query($conn,$q);
        // $row=mysqli_fetch_assoc($run_query);

        if(mysqli_num_rows($result)>0)
        {
            echo "<h3>Yoy have Voted Already!</h3>";
        }
        else{
        $query="insert into `vote_details`(Name,Email,Voted_for) values ('$name','$email','$Vote')";

        $run_query=mysqli_query($conn,$query);
    
        if($run_query)
            {
                echo "Voted Successfully!";
            }
        else{
                echo "<h3> Not Voted Successfully!</h3>";
            }
        }
        
}

?>

<?php

include('inc/footer.php');

?>


<!-- https://github.com/sagar-my -->


<!-- bootswatch -->
<!-- gitbash -->

<!-- open api -->