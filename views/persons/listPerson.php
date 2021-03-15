<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person List</title>
    <link rel="stylesheet" href="/assets/styles/bootstrap.min.css" />
    <style>
        table {
            margin: auto;
            border-collapse: collapse;
            border: 2px solid black;
        }

        th, td {
            padding: 5px;
            border: 1px solid grey;
        }

        .input_patient_info {
            margin: 20px 120px;
            padding: 10px;
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>
<body>
<?php include_once("/Codegym/Module2/case_study/views/header.php") ?>
    <table>
        <thead>
            <tr>
                <th colspan="10"> Danh sách bệnh nhân</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Số CMND</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tình trạng</th>  
                <th>Diện tiếp xúc</th>             
                <th>ghi chú</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($personList as $key=>$person) {
            $traceGroup = $person->group + 1;
            $content = "<a target='_blank' href='?controller=persons&action=detail&id=$person->identity_number'>
                                <button>Thông tin chi tiết</button>
                            </a>";
            echo '
            <tr>
                <td>'. ($key + 1).'</td>
                <td>'. $person->name .'</td>
                <td>'. $person->identity_number .'</td>
                <td>'. $person->birthday .'</td>
                <td>'. (($person->gender == 1) ? "Nam" : "Nữ").'</td>
                <td>'. $person->phone .'</td>
                <td>'. $person->address .'</td>
                <td>'. $person->status .'</td>
                <td>F'. $person->group .'</td>
                <td>'. $content .'</td>
            </tr>
            ';
            }
        ?>
        </tbody>
    </table>
    <a target="_blank" href="?controller=persons&action=add">
        <button class="input_patient_info">Nhập thông tin người bệnh mới</button>
    </a>
</body>
</html>