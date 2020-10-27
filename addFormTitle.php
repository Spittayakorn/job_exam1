<?php
    require('connectDB.php');
    $title = $_REQUEST['title'];
    $titleName = $_REQUEST['titleName'];
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y/m/d");
    
    $insertTitle = "insert into title values('','$title','$titleName','$date');";
    mysqli_query($con,$insertTitle);

    echo "<script>
            window.open('manageTitle.php','_self')
        </script>";
?>