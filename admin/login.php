<?php
    session_start();
    include ('config.php');
    if(isset($_POST['submit'])){
        $username=mysqli_real_escape_string($con,$_POST['username']);
        $password=md5(mysqli_real_escape_string($con,$_POST['password']));

       echo $sql = "SELECT user_id,username FROM user WHERE username = '{$username}' AND password ='{$password}'";
        $result = mysqli_query($con,$sql) or die("Login Failed.");

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION["username"] = $row['username'];
                $_SESSION["user_id"] = $row['user_id'];

                header("Location:dashboard.php");
            }

        }else{
            header("location:index.php?msg=Wrong Admin Credential");
        }

    }

?>