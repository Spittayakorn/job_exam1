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
            border: 1px solid black;
        }

        #t2,
        #t2 tr,
        #t2 td {
            border: none;
        }

        #title {
            cursor: pointer;
        }


    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#tb').on('click', '#title', function() {


                //   titleNo = $(this).closest('tr');
                //   titleNo = titleNo.find('td:eq(0)').text();
                titleNo = $(this).attr('class');
                window.open('showTitle.php?titleNo=' + titleNo, '_self');

            });
            $('#addTitle').click(function() {

                window.open('addTitle.php', '_self');
            });
        });
    </script>


</head>

<body>
    <table width='50%' align='center' id='tb'>
        <tr>
            <td width='25%'>ลำดับ</td>
            <td width='25%'>หัวข้อ</td>
            <td width='25%'>วันที่สร้าง</td>
            <td width='25%' colspan='2' align='center'>เครื่องมือ</td>
        </tr>

        <?php
        require('connectDB.php');
        $sqlShowTitle = "select * from title;";
        $resultShowTitle = mysqli_query($con, $sqlShowTitle);

        if ($resultShowTitle == null) {
            echo "คำสั่งผิด";
        }

        $numrowShowTitle = mysqli_num_rows($resultShowTitle);
        if ($numrowShowTitle == 0) {
            echo "<tr align='center'>
            <td colspan='5'>กรุณาเพิ่ม Title</td>    
            </tr>";
        } else {

            $i = 0;
            while ($recnumShowTitle = mysqli_fetch_array($resultShowTitle)) {
                $i++;

                echo "<tr>
                            <td>$i</td>
                            <td id='title' style='text-decoration: underline';' class='$recnumShowTitle[0]'>$recnumShowTitle[1]</td>
                            <td>$recnumShowTitle[3]</td>
                            <td align='center'><a href='editTitle.php?numTitle=$recnumShowTitle[0]'>Edit</a></td>
                            <td align='center'><a href='delTitle.php?numTitle=$recnumShowTitle[0]'>Delete</a></td>
                        </tr>";
            }
        }


        ?>

    </table>
    <br>
    <table width='50%' align='center' id='t2'>
        <tr align='right'>
            <td>
                <input type='button' id='addTitle' value='เพิ่ม' class='button'>
            </td>
        </tr>
    </table>
</body>

</html>