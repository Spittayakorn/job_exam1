<?php
    require('connectDB.php');
    $comment = $_REQUEST['comment'];
    $titleNo = $_REQUEST['titleNo'];
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y/m/d");
    $sqlAddComment = "insert into comment values('','$comment','$date','$titleNo');";
    $resultAddComment = mysqli_query($con,$sqlAddComment);
    
    echo "<script>
            alert('บันทึก Comment เรียบร้อย');
            window.open('showTitle.php?titleNo='+$titleNo,'_self');
    </script>";
?>