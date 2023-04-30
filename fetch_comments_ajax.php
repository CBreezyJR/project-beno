<?php
require('db.php');
$userID = $_POST['user_id'];
$userID = mysqli_real_escape_string($conn,$userID);
$text = $_POST['commented_text'];
$text = mysqli_real_escape_string($conn,$text);
$commentorID = $_POST['commentor_id'];
$postID = $_POST['post_id'];



$query = "insert into comment(text,commentor_id_ref,post_id_ref) values ('$text','$userID','$postID') ;";

try{
    $res = mysqli_query($conn,$query);
    echo $res;
}
catch(Exception $e){
    echo "Couldn't fetch Comment..$e";
}

?>