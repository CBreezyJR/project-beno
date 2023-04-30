<?php
$tag_arr=[];
$tag_id_arr=[];
require('db.php');
$tq = "select * from category;";
$tq_res = mysqli_query($conn,$tq);
while($tq_row = mysqli_fetch_assoc($tq_res)){
    array_push($tag_arr,$tq_row['tag']);
    array_push($tag_id_arr,$tq_row['category_id']);
}





?>