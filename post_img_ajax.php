<?php
if (isset($_FILES["imageFile"]["tmp_name"])) {
    move_uploaded_file($_FILES["imageFile"]["tmp_name"], $_FILES["imageFile"]["name"]);
    echo $_FILES["imageFile"]["name"];
}else{

    echo "img not set";
}
