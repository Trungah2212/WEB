<meta charset="UTF-8">
<?php
    $mysqli = new mysqli("localhost","root","","Web_white-shirted_trio");

    // Check connection
    if ($mysqli -> connect_errno) {
    echo "Error:TRuy xuất lỗi " . $mysqli -> connect_error;
    exit();
    }
?>