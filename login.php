<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>

<body>
    <?php
    session_start();

    $conn=mysqli_connect();

    if(!$conn){
        echo "not connected";
    }
    else{
        echo "connected";
        }

    ?>
    <style>
        .login {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="login">
        <h1>login</h1>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="username"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="submit" name="submit" value="login">
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            echo "username or password is wrong";
        }
        else{
            $_SESSION['username']=$username;
            header("location:../../index.php");
            
        }
    }
    ?>



</body>

</html>