<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quarantine Site Detail Form</title>
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

        .info {
            width: 40%;
            border: 2px solid black;
            border-radius: 5px;
            background-color: lightblue;
            padding: 10px;
            margin: 20px 20px 20px 260px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            border: 2px solid black;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid grey;
        }
    </style>
</head>

<body>
<?php include_once("/Codegym/Module2/case_study/views/header.php") ?>
    <div class="text-center">
        <h1 class="text-center">Trang th??ng tin c?? s??? c??ch ly</h1>
    </div>
    <div>
        <div class='info mx-auto'>
            <fieldset>
                <legend>Th??ng tin c?? s??? c??ch ly</legend>
                <label>T??n c?? s??? c??ch ly: </label>
                <p><?php echo $site->name ?></p>
                <label>?????a ch???: </label>
                <p><?php echo $site->address ?></p>
                <label>S??? ??i???n tho???i: </label>
                <p><?php echo $site->phone_number ?></p>
                <label>S??? gi?????ng: </label>
                <p><?php echo $site->capacity ?></p>
                <label>S??? gi?????ng tr???ng: </label>
                <p><?php echo ($site->capacity - $site->used_bed) ?></p>

                <?php echo "<a href='?controller=sites&action=edit&id=$site->id'>
                            <button>Ch???nh s???a th??ng tin</button>
                        </a>";
                ?>
            </fieldset>
        </div>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="9"> Danh s??ch ng?????i c??ch ly</th>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>H??? v?? t??n</th>
                    <th>S??? CMND</th>
                    <th>Ng??y sinh</th>
                    <th>Gi???i t??nh</th>
                    <th>S??? ??i???n tho???i</th>
                    <th>?????a ch???</th>
                    <th>T??nh tr???ng</th>
                    <th>Ng??y c??ch ly</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($personList as $key => $person) {
                    echo '
            <tr>
                <td>' . ($key + 1) . '</td>
                <td>' . $person->name . '</td>
                <td>' . $person->identity_number . '</td>
                <td>' . $person->birthday . '</td>
                <td>' . (($person->gender == 1) ? "Nam" : "N???") . '</td>
                <td>' . $person->phone . '</td>
                <td>' . $person->address . '</td>
                <td>' . $person->status . '</td>
                <td>' . $person->quarantined_day . '</td>
            </tr>
            ';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>