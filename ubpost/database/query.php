<?php
class Query {
public function show(): array {
require 'db.php';
$sql = "SELECT * FROM posts";
$sqlstatement = $connection->prepare($sql);
$sqlstatement->execute();
$post = $sqlstatement->fetchAll(PDO::FETCH_OBJ);
return $post;
}

public function search($search): array {
    require 'db.php';
    $sql = "SELECT * FROM posts WHERE title LIKE '%$search'";
    $sqlstatement = $connection->prepare($sql);
    $sqlstatement->execute();
    $post = $sqlstatement->fetchAll(PDO::FETCH_OBJ);
    return $post;
}
public function Post($title, $body, $user_id) {
    require 'db.php';
    $sql = 'INSERT INTO posts(title, body, user_id) VALUES (:title, :body, :user_id)';
    $sqlstatement = $connection->prepare($sql);
    $sqlstatement->execute([':title' => $title, ':body' => $body, ':user_id' => $user_id]);
    header("Location: ubpost.php");
    exit;
}
}

?>