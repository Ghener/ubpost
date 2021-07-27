<?php 
    session_start();
    session_destroy();

    $btn = "Signup";
    $username = "";
    $url = "views/register.php";
    require "navbar.php";
    include_once 'database/db.php';
    $msg = "";

    if (isset ($_POST['name'])&& isset($_POST['password'])){
        $sql = 'SELECT * FROM users WHERE name = :name AND password = :password';
        $statement = $connection->prepare($sql);
        $statement->execute([':name' => $_POST['name'], ':password' => $_POST['password']]);

        $user = $statement->fetch(PDO::FETCH_OBJ);

        if(!$user){
            echo "<script>alert('username and password do not much any of the record. If you dont have an account kindly signup')</script>";
        } else{
                session_start();
                $_SESSION["password"] = $user->password;
                $_SESSION["name"] = $user->name;
                header("Location: views/ubpost.php");
                exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class = "container">
        <h1> About Ubpost </h1>
    </div>
<div class="login-form">
    <form method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit", name="Login" class="btn btn-primary btn-block">Log in</button>
        </div>
    </form>
</div>
</body>
</html>                                		
