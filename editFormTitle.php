<?php
    require('connectDB.php');
    $numTitle = $_REQUEST['numTitle'];
    $title = $_REQUEST['title'];
    $titleName = $_REQUEST['titleName'];

    $sqlUpdate = "update title set title='$title',titleName='$titleName' where numTitle='$numTitle'; ";
    mysqli_query($con,$sqlUpdate);

    echo "<script>
            alert('แก้ไข Title เรียบร้อย');
            window.open('manageTitle.php','_self');    
    </script>";
?>