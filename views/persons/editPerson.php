<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Form</title>
    <link rel="stylesheet" href="/assets/styles/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/styles/bootstrap.css" />
    <link rel="stylesheet" href="/assets/styles/bootstrap-grid.css" />
    <style>
        form {
            width: 50%;
            padding: 10px;
            margin: 20px;
            border: 2px solid black;
            background-color: lightblue;
            border-radius: 5px;
        }

        fieldset {
            padding: 20px;
            background-color: lightcyan;
        }

        legend {
            border: 1px solid black;
            border-radius: 2px;
            background-color: white;
            padding: 3px 10px;
            font-size: 20px;
        }

        button {
            margin: 20px;
            border: 1px solid black;
            border-radius: 3px;
            background-color: lightgrey;
            text-align: center;
            padding: 5px;
            font-size: 20px;
        }

        label {
            text-align: left;
            font-weight: bold;
        }

        input,
        p {
            padding: 2px;
            margin: 3px;
        }

        input[type="text"] {
            width: 90%;
        }
    </style>
</head>

<body>
    <?php include_once("/Codegym/Module2/case_study/views/header.php") ?>
    <div>
        <h1 class="text-center">Trang chỉnh sửa thông tin</h1>
    </div>
    <div>

        <form class="mx-auto needs-validation" method="POST">
            <fieldset>
                <legend>
                    Chỉnh sửa thông tin
                    <?php
                    $id = $_GET["id"];
                    $person = Person::getInfo($id);
                    $group = $person->group;
                    $status = "";
                    switch ($group) {
                        case 0:
                            switch ($person->status) {
                                case -1:
                                    $status = "Tử vong";
                                    break;
                                case 0:
                                    $status = "Dương tính";
                                    break;
                                default:
                                    $status = "Âm tính $person->status lần";
                            }
                            break;
                        default:
                            $status = "Âm tính";
                            break;
                    }
                    switch ($group) {
                        case 0:
                            echo "bệnh nhân";
                            break;
                        default:
                            echo "người tiếp xúc";
                            break;
                    }
                    echo " (F$group)";
                    echo '    
                    </legend>
                    <label for="name">Họ và tên:</label></br>
                    <input type="text" name="name" value="' . $person->name . '" required></br>
                    <label for="identity_number">Số CMND:</label></br>
                    <input type="number" name="identity_number" value="' . $person->identity_number . '" readonly></br>
                    <label for="birthday">Ngày sinh:</label></br>
                    <input type="date" name="birthday" value="' . $person->birthday . '" required></br>
                    <label for="gender">Giới tính:</label></br>
                    <input type="radio" id="male" name="gender" value="1" ' . (($person->gender == 1) ? "checked" : "") . '>
                    <label for="male">Nam</label><br>
                    <input type="radio" id="female" name="gender" value="0" ' . (($person->gender == 0) ? "checked" : "") . '>
                    <label for="female">Nữ</label><br>
                    <label for="phone">Số điện thoại:</label></br>
                    <input type="number" name="phone" value="' . $person->phone . '"></br>
                    <label for="address">Địa chỉ</label></br>
                    <input type="text" name="address" value="' . $person->address . '"></br>
                    <label for="status">Tình trạng:</label></br>
                    <input type="text" value="' . $status . '" readonly></br>
                    <input type="text" name="status" value="' . $person->status . '" hidden></br>
                    <label for="comment">Ghi chú:</label></br>
                    <input type="text" name="comment"  value="' . $person->comment . '" readonly></br>';
                    ?>
                    <input type="submit" value="Hoàn tất chỉnh sửa">
            </fieldset>
        </form>
    </div>
</body>

</html>