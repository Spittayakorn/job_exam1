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
    <form action='addFormTitle.php' method='post'>
        <table align='center' width='70%'>
            <tr>
                <td>หัวข้อ</td>
            </tr>
            <tr>
                <td>
                    <input type='text' name='title' style='width:100%'>
                </td>
            </tr>

            <tr>
                <td>รายละเอียดของหัวข้อ</td>
            </tr>
            <tr>
                <td>
                    <textarea name='titleName' style='width:100%;max-width:100%;resize:none'></textarea>
                </td>
            </tr>
            <tr align='right'>
                <td>
                    <input type='submit' value='เพิ่ม' class='add'>
                    <input type='button' value='กลับ' id='back' class='back'>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>