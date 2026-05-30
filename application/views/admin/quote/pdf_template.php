<!DOCTYPE html>
<html>

<head>
    <title>Quotation PT. Bildi Bangun Bersama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        pre {
            white-space: pre-wrap;
            text-align: left;
        }


        .first-table td {
            border: none;
            text-align: left;
        }

        .first-table th {
            border: none;
            text-align: left;
            margin: 0;
            padding: 0;
        }


        body {
            margin: 0;
            /* Menghapus margin default pada body */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            font-weight: bold;
            font-size: 14px;
        }

        .text-right {
            text-align: right;
        }

        .text-align-rp {
            text-align: right;
            width: 100px;
        }

        .small-column {
            width: 40px;
        }

        .wide-column {
            width: 175px;
        }


        .header-info h1,
        .header-info h2 {
            margin: 0;
        }

        .header-info p {
            margin: 2px 0;
        }

        @media print {
            .header img {
                width: 100px;
                /* Ubah ukuran sesuai kebutuhan */
                height: auto;
                margin-top: 0;
                padding-top: 0;
                /* Biarkan tinggi otomatis agar aspek rasio tetap terjaga */
            }
        }
    </style>
</head>

<body>
    <div>
        <table class="first-table">
            <tr>
                <th>
                    <div class="header">
                        <img src="<?= base_url(); ?>template/assets_admin/images/logo.png" alt="Company Logo">
                    </div>
                </th>
                <th>
                    <b>PT. Bildi Bangun Bersama</b><br>
                    Address:<br>
                    Jl. TB Simatupang No.18, RT.2/RW.1,<br>
                    Kebagusan Kec. Ps. Minggu, Kota <br>
                    Jakarta Selatan, DKI Jakarta12520
                </th>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php foreach ($items as $item): ?>
                        <b>Quotation#</b>
                        <?php echo $item->no; ?> <br>
                        Customer :
                        <?php echo $item->name; ?><br>
                        Phone :
                        <?php echo $item->telp; ?>
                    <?php endforeach; ?>
                </td>
            </tr>

        </table>
    </div>
    <table>
        <tr>
            <th class="small-column"><b>No</b></th>
            <th class="wide-column"><b>Items</b></th>
            <th class="small-column"><b>Qty</b></th>
            <th><b>UOM</b></th>
            <th class="text-align-rp"><b>Unit Price</b></th>
            <th class="text-align-rp"><b>Total Price</b></th>
        </tr>
        <?php
        $previous_type = null;
        $total_group = 0;
        $grand_total = 0; // Inisialisasi grand total
        foreach ($item_detail as $index => $item):
            $current_type = ucfirst($item->type); // Mengonversi huruf pertama menjadi kapital
            if ($current_type != $previous_type):
                // Menampilkan total untuk grup sebelumnya
                if ($previous_type !== null):
                    ?>
                    <tr>
                        <td colspan="5" style="text-align: right; font-weight: bold;">Sub Total
                        </td>
                        <td class="text-right">
                            <b>
                                <?php echo 'Rp ' . number_format($total_group, 0, ',', '.'); ?>
                            </b>
                        </td>
                    </tr>
                    <?php
                endif;
                // Menambahkan total grup ke grand total
                $grand_total += $total_group;
                // Reset total untuk grup baru
                $total_group = 0;
                $previous_type = $current_type;
                ?>
                <tr>
                    <td colspan="7" style="font-weight: bold;">
                        <?php
                        if ($current_type == "Material") {
                            echo "Material Support";
                        } else {
                            echo $current_type;
                        }

                        ?>
                    </td>
                </tr>
                <?php
            endif;
            ?>
            <tr>
                <td>
                    <?php echo $index + 1; ?>
                </td>
                <td>
                    <?php echo $item->product_name; ?>
                </td>
                <td>
                    <?php echo $item->qty; ?>
                </td>
                <td>
                    <?php echo $item->unit; ?>
                </td>
                <td class="text-right">
                    <?php echo 'Rp ' . number_format($item->price_unit, 0, ',', '.'); ?>
                </td>
                <td class="text-right">
                    <?php
                    $total_group += $item->total_price; // Menambahkan total grup
                    echo 'Rp ' . number_format($item->total_price, 0, ',', '.');
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <!-- Menampilkan total untuk grup terakhir -->
        <tr>
            <td colspan="5" style="text-align: right; font-weight: bold;">Sub Total
            </td>
            <td class="text-right">
                <b>
                    <?php echo 'Rp ' . number_format($total_group, 0, ',', '.'); ?>
                </b>
            </td>
        </tr>
        <?php
        // Menambahkan total grup terakhir ke grand total
        $grand_total += $total_group;
        ?>
        <!-- Menampilkan grand total -->
        <tr>
            <td colspan="5" style="text-align: right; font-weight: bold;">Grand Total:</td>
            <td class="text-right">
                <b>
                    <?php echo 'Rp ' . number_format($grand_total, 0, ',', '.'); ?>
                </b>
            </td>
        </tr>
    </table>
    <div><br>
        <b>Note </b>
        <?php foreach ($items as $item): ?>
            <pre><?php echo htmlspecialchars($item->note); ?></pre>
        <?php endforeach; ?>
    </div>
</body>

</html>