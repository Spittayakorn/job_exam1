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
        }

        table,
        th,
        td {
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
    <?php

    require('connectDB.php');
    $numTitle = $_REQUEST['numTitle'];
    $sqlEditTitle = "select * from title where numTitle ='$numTitle'";
    $resultEditTitle = mysqli_query($con, $sqlEditTitle);

    if ($resultEditTitle == null) {
        echo "คำสั่งผิด";
    }
    $title = '';
    $titleName = '';
    while ($recnumEditTitle = mysqli_fetch_array($resultEditTitle)) {
        $title = $recnumEditTitle[1];
        $titleName = $recnumEditTitle[2];
    }
    ?>
    <form action='editFormTitle.php' method='post'>
        <table align='center' width='70%'>
            <tr>
                <td>หัวข้อ</td>
            </tr>
            <?php
            echo "<tr>
                        <td>
                            <input type='text' name='title' style='width:100%' value='". $title ."'S>
                        </td>
                    </tr>";
            ?>


            <tr>
                <td>รายละเอียดของหัวข้อ</td>
            </tr>
            <?php
            echo "<tr>
                <td>
                    <textarea name='titleName' style='width:100%;max-width:100%;resize:none'>". $titleName ."</textarea>
                </td>
            </tr>";
            ?>
            <tr align='right'>
                <td>
                    <input type='submit' value='เพิ่ม'class='add'>
                    <input type='button' value='กลับ' id='back' class='back'>
                    <input type='hidden' value=<?php echo $numTitle?> name='numTitle'>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>