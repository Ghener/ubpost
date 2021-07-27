<script>
function login(){
    window.location='/ubpost/views/login.php';
}
function register(){
    window.location='/ubpost/views/register.php';
}
function post(){
    window.location='/ubpost/views/post.php';
}
function ubpost(){
    window.location='/ubpost/views/ubpost.php';
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    a{cursor:pointer;}</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" onclick=ubpost();>UBPOST</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a onclick=post();>POST</a></li>
      <li class="active"><a href="#">ABOUT</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if(!empty($username)): ?>
                <li class="nav-item mr-3">
                    <span class="navbar-text">
                        Hello, <?= $username; ?>.
                    </span>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="/ubpost">LOGOUT</a>
                </li>
                <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= $url; ?>"><?= $btn; ?></a>
            </li>
    </ul>
  </div>
</nav>
</body>
</html>
