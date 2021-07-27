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
    require '../database/query.php';
$query = new Query();
$post = $query->show();

if (isset($_POST['search'])){
    $word = trim($_POST['search']);
    $post = $query->search($word);
}
?>
<div class="contain">
    <div class="mt-5 mb-5">
        <h1>ANNOUNCEMENT</h1>
            <form method="post" class="form-inline">
                <input type="text" class="form-control input-lg w-25" id="search" placeholder="Search here" name="search"/>
                <button type="submit" class="btn btn-primary ml-1">Find</button>
            </form>
        <div class="mt-1">
            <?php
                foreach(array_reverse($post) as $posts):
            ?>
                <div class="card mt-1">
                    <div class="card-body">
                        <h3><?= $posts->title; ?></h3>
                        <h5><?= $posts->body; ?></h5>
                        <span><?= $posts->date_added; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>       
    </div>
</div>