<?php
include("dbconnect.php");
if(isset($_POST['create'])){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    //$hash_password=password_hash($password,PASSWORD_DEFAULT);
    $query="select * from users where username='$username'";
    $add=mysqli_query($conn,$query);
    if(mysqli_num_rows($add)>0){
        echo"$username already exists";
    }
    else{
        if(strlen($username)>=5){
            $hash_password=password_hash($password,PASSWORD_DEFAULT);
            $insert="insert into users(username,password) values ('$username',' $hash_password')";
            $add2=mysqli_query($conn,$insert);
            //$add3=mysqli_query($conn,$hash_password);
            if($add2){
                echo"USER created successful!";
            }

       
        else{
            echo"username must have at least 5 characters!";
        }
    
        mysqli_close($conn);
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <form action="" method="post">
        <p><u>Create Account</u></p>
        <input type="text" name="username" placeholder="enter username"><br><br>
        <input type="password" name="password" placeholder="enter your password"><br><br>
        <button type="submit" name="create">CREATE</button>
        <a href="hello.html">LOGIN</a>

    </form>
</body>
</html>