<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='styles.css'>

    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        #t1 tr,
        #t1 td,
        #t1 {
            border: none;
        }

        
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
            $('#back').click(function(){
                window.open('manageTitle.php','_self');
            });



        });
    </script>
</head>

<body>
    <table align='center' id='t1'>
        <?php
        require('connectDB.php');
        $numTitle = $_REQUEST['titleNo'];
        $sqlTitle = "select * from title where numTitle='$numTitle'";
        $resultTitle = mysqli_query($con, $sqlTitle);

        if ($resultTitle == null) {
            echo "คำสั่งผิด";
        }

        while ($recnumTitle = mysqli_fetch_array($resultTitle)) {
            echo "<tr>
                    <td width='20%'>หัวข้อ</td>
                    <td>$recnumTitle[1]</td>   
                </tr>
                <tr>
                    <td>รายละเอียดของหัวข้อ</td>
                    <td>$recnumTitle[2]</td>   
                </tr>";
        }

        ?>
    </table>
    <br>
    <table align='center'>
        <tr>
            <td width='10%'>ลำดับที่</td>
            <td width='20%'>รายละเอียด Comment</td>
            <td width='20%'>วันที่ Comment</td>
        </tr>
        <?php

        $sqlComment = "select * from comment where numTitle=' $numTitle'";
        $resultComment = mysqli_query($con, $sqlComment);

        if ($resultComment == null) {
            echo "คำสั่งผิด";
        }

        $numRowComment = mysqli_num_rows($resultComment);
        if ($numRowComment != 0) {
            $i=0;
            while ($recnumComment = mysqli_fetch_array($resultComment)) {
                $i++;
                echo "<tr>
                            <td>$i</td>
                            <td>$recnumComment[1]</td>
                            <td>$recnumComment[2]</td>
                        </tr>";
            }
        } else {
            echo "<tr><td colspan='3' style='text-align:center;'>ยังไม่มี Comment</td></tr>";
        }

        ?>

    </table>
    <br>

    <form action='addComment.php' method='post'>
        <table id='t1' align='center'>
            <tr>
                <td>comment:</td>
            </tr>
            <tr>
                <td><textarea style='width:100%;max-width:100%;resize:none' name='comment'></textarea></td>
            </tr>
            <tr>
            </tr>
            <tr align='right'>
                <td>
                    <input type='submit' value='เพิ่ม' class='add'>
                    <input type='button' value='กลับ' id='back' class='back'>
                    
                    <?php
                        echo "<input type='hidden' value='$numTitle' name='titleNo'>";
                    ?>
                    
                </td>
            </tr>

        </table>
    </form>
</body>

</html>