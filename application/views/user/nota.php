<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
        body {
            position: relative;
            width: 25cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 22px;
            font-family: Arial;
        }

        header {
            display: flex;
        }

        .logo {
            text-align: left;
        }

        .logo img {
            width: 80px;
            height: 80px;
        }

        h1 {

            color: 161651;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: bold;
            margin-left: 70;
            margin-bottom: -40;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }


        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 3rem;

        }

        table .desc {
            padding-right: 3rem;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div class="logo">
            <img src="<?= base_url('assets/img/LogoBanSehat.png') ?>">
        </div>
        <h1>Nota Pembayaran</h1>
    </header>

    <table>
        <?php
        if (!empty($hasil)) {

            foreach ($hasil as $data):
                ?>
                <tbody>
                    <tr>
                        <td class="service">Id Pesanan</td>
                        <td class="desc">
                            <?php echo $data->IdPesanan; ?>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $dataDB = $data->TanggalPemesanan;
                        $dateTime = new DateTime($dataDB);

                        $tanggal = $dateTime->format('d');
                        $bulan = $dateTime->format('m');
                        $tahun = $dateTime->format('Y');
                        $jamMenit = $dateTime->format('H:i');
                        ?>
                        <td class="service">Tanggal Pemesanan</td>
                        <td class="desc">
                            <?php echo $tanggal . '/' . $bulan . "/" . $tahun ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="service">Jam</td>
                        <td class="desc">
                            <?php echo $jamMenit ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="service">Nama</td>
                        <td class="desc">
                            <?php echo $data->Nama; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="service">Tipe Ban</td>
                        <td class="desc">
                            <?php echo $data->TipeBan; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="service">Nama Mekanik</td>
                        <td class="desc">
                            <?php echo $data->NamaMekanik; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="service">No Handphone</td>
                        <td class="desc">
                            <?php echo $data->NoHandphone; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="service">Metode Pembayaran</td>
                        <td class="desc">
                            <?php echo $data->MetodePembayaran; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="service"><b>GRAND TOTAL</b></td>
                        <td class="desc"><b>
                                <?php echo $data->Harga; ?>
                            </b></td>
                    </tr>
                </tbody>
                <?php
            endforeach;
        }
        ?>
    </table>
</body>

</html>