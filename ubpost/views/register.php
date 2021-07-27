<?php 

session_start();

$btn = "Login";
$username = "";
$url = "/ubpost";
require "navbar.php";
include_once '../database/db.php';

    $msg = "";

if (isset ($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)';
    $statement = $connection->prepare($sql);

    if ($statement->execute([':name' => $name, ':email' => $email, ':pass' => $password])){
        $msg = 'You are now registered';
        header("Location: /ubpost");
    }
}

$sql = 'SELECT * FROM users';

$statement = $connection->prepare($sql);

$statement->execute();

$lists = $statement->fetchAll(PDO::FETCH_OBJ);

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
	.Signup-form {
		width: 340px;
    	margin: 50px auto;
	}
    .Signup-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .Signup-form h2 {
        margin: 0 0 15px;
    }
    .Signup-control, .btn {
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
<?php if(!empty($msg)): ?>
    <div class="alert alert-success">
      <?= $msg; ?>
    </div>
  <?php endif; ?>
<div class="Signup-form">
    <form method="post">
        <h2 class="text-center">Signup</h2>       
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        
        <div class="form-group">
            <button type="submit", name="Signup" class="btn btn-primary btn-block">Signup</button>
        </div>
    </form>
</div>
</body>
</html>                                		
