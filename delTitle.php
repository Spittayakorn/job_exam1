<?php
    require('connectDB.php');

    $numTitle = $_REQUEST['numTitle'];
    
    $sqlDelComment = "delete from comment where numtitle='$numTitle';";
    mysqli_query($con,$sqlDelComment);

    $sqlDelTitle = "delete from title where numTitle='$numTitle';";
    mysqli_query($con,$sqlDelTitle);

    echo "<script>
            alert('ลบ Title เรียบร้อย');
            window.open('manageTitle.php','_self');
        </script>";


?>