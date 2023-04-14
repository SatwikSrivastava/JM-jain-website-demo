<?
    session_start();
    include "config.php";
    if(isset($_POST['submit'])){

        $name=mysqli_real_escape_string($con,$_POST['name']); 
        $username=mysqli_real_escape_string($con,$_POST['username']); 
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $password=md5($_POST['password']);         


        $result= mysqli_query($con,"INSERT INTO user ( name,username,email,password,date_reg) VALUES ( '$name','$username','$email','$password',now())") or die(mysqli_error($con));
  
            header('location:index.php?msg=success');
         }
?>