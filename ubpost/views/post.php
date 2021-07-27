<?php
    session_start();
    if (!isset($_SESSION["name"])) {
        header("location: /ubpost");
        exit; 
    }
    $btn = "";
    $url = "";
    $username = $_SESSION["name"];
    require "navbar.php";
    include_once '../database/query.php';
    $query = new Query();

    if (isset($_POST['title']) && isset($_POST['body'])) {
        $query->post($_POST['title'], $_POST['body'], $_SESSION["user_id"]);
    }
?>
<div class="contain">
        <div class="mt-5">
            <h1>Post an Announcement</h1>
            <form method="post">
                <div class="form-group mt-3">
                    <h3>TITLE</h3>
                    <input name="title" type="text" class="form-control" placeholder="Write something...">
                </div>
                <div class="form-group mt-3">
                    <h3>Body</h3>
                    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write something..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>
</body>
</html>