<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        /* Add your custom styles here */
        body {
            /* text-align: center; */
        }

        .logo {
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            margin: 20px;
            /* Sesuaikan dengan margin yang diinginkan */
        }

        .logo img {
            width: 2rem;
            height: 2rem;
            margin-right: 10px;
            /* Sesuaikan dengan margin yang diinginkan antara logo dan teks */
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td.logo {
            border: none;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <tr>
                <td width="20px" align="left">
                    <img src="<?php echo base_url() ?>assets/img/LogoBanSehat.png" width="40px" />
                </td>
                <td align="center">
                    <font size="20">BanSehat</font> <br />
                </td>
            </tr>
        </table>
        <h2 align="center">Daftar Akun Mekanik</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Akun Mekanik</th>
                    <th>Nama Mekanik</th>
                    <th>No Handphone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($hasil)) {
                    echo "Data Kosong";
                } else {
                    $no = 1;
                    foreach ($hasil as $data):
                        ?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $data->AkunMekanik ?>
                            </td>
                            <td>
                                <?php echo $data->NamaMekanik ?>
                            </td>
                            <td>
                                <?php echo $data->NoHandphone ?>
                            </td>
                        </tr>

                        <?php
                        $no++;
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>