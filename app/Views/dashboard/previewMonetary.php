<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Monetary</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <style>
        /* Set landscape page orientation */
        @page {
            size: landscape;
            margin: 10mm; /* Adjust margins if needed */
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;  /* Reduced font size for better fit */
            margin: 0;
            padding: 0;
            background-color: #EDEEF1;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Changed to flex-start to avoid centering */
            height: 100vh;
            overflow: auto;
        }

        .button-download {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .button-download a {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-download a:hover {
            background-color: #0056b3;
        }

        .button-back {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .button-back a {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-back a:hover {
            background-color: #0056b3;
        }

        /* Adjust size for landscape */
        .size {
            width: 297mm; /* Landscape width */
            min-height: 210mm; /* Landscape height */
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin: 20px auto;
            overflow: auto; /* Ensure content fits without cutting off */
            height: auto; /* Let the content stretch to fit */
        }

        .header {
            text-align: center;
            position: relative;
            margin-bottom: 20px;
        }

        .header img {
            position: absolute;
            left: 0;
            top: 0;
            height: 100px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; /* Makes sure the table doesn't stretch */
        }

        table, th, td {
            border: 1px solid black;
            word-wrap: break-word;
        }

        th, td {
            padding: 6px;  /* Reduced padding to make table content fit better */
            text-align: left;
            font-size: 11px;  /* Smaller font size for the table */
        }

        .footer {
            margin-top: 40px;
        }

        .footer .report {
            font-weight: 600;
        }

        .signatures {
            display: flex;
            flex-direction: column;
        }

        .signatures p {
            margin: 2px 0;
        }

        .content {
            page-break-after: auto;
        }
        .container-header{
            font-size:13px;
        }
        @media print {
            header, footer {
                display: none;
            }

            body {
                background-color: white; /* Remove background during print */
                visibility: visible; /* Ensure body content is visible */
            }

            /* Hide buttons during print */
            .button-download, .button-back, .button-print {
                display: none;
            }

            .size {
                width: 297mm; /* Landscape width */
                min-height: 210mm; /* Landscape height */
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                box-sizing: border-box;
                margin: 0;
                overflow: auto; /* Ensure content fits without cutting off */
                height: auto; /* Let the content stretch to fit */
            }
            @page {
        margin: 0;
    }


            .header {
                text-align: center;
                margin-bottom: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                table-layout: fixed; /* Makes sure the table doesn't stretch */
            }

            table, th, td {
                border: 1px solid black;
                word-wrap: break-word;
            }

            th, td {
                padding: 6px;  /* Reduced padding to make table content fit better */
                text-align: left;
                font-size: 11px;  /* Smaller font size for the table */
            }

            .footer {
                margin-top: 40px;
            }

            .footer .report {
                font-weight: 600;
            }

            .signatures {
                display: flex;
                flex-direction: column;
            }

            .signatures p {
                margin: 2px 0;
            }

            /* Ensure content is printed in a clean format without breaking */
            .content {
                page-break-after: auto;
            }
        }

        .button-download button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>

<div class="button-download" style="margin-top:50px;">
    <!-- Print button is hidden during print -->
    <button class="print-button" onclick="window.print()">Print This Page</button>
</div>

    <div class="button-download">
    <a href="<?= base_url('getReportsMonatary/' .$fromdate. '/' . $todate ) ?>">Print</a>
    </div>
    <div class="button-back">
        <a href="javascript:history.back()">Back</a>
    </div>
    <div class="size">
        <div class="header">
        <div class="container-header">
            <h4 style="margin: 0;">Republic of the Philippines</h4>
            <h4 style="margin: 0;">Province of Oriental Mindoro</h4>
            <h4 style="margin: 0;">Barangay Managpi, Calapan City</h4>
            <h4 style="margin: 0; padding-top: 5px;">HAPAG ARUGA FOUNDATION INCORPORATED</h4>
            </div>
        </div>
        <h4 style="text-align: center; font-size:13px;">CASH DONATIONS</h4>
        <p>Date: <?= date('F j, Y', strtotime($currentDate)) ?></p>
        <p>Reporting Period: <?= date('F j, Y', strtotime($fromdate)) ?> - <?= date('F j, Y', strtotime($todate)) ?></p>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Establishment</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Contact Number</th>
                    <th>Receipt Number</th>
                    <th>Cash Donation</th>
                    <th>Cash Check</th>
                    <th>Mumo sa Hapag</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Monetary as $mntry): ?>
                    <tr>
                    <td>
                    <?php
                    $dateString = $mntry['donationdate'];
                    $date = new DateTime($dateString);
                    echo $date->format('F j, Y');
                    ?>
                </td>
                <td><?= $mntry['establishment'] ?></td>
                <td><?= $mntry['lastname'] ?></td>
                <td><?= $mntry['firstname'] ?></td>
                <td><?= $mntry['middlename'] ?></td>
                <td><?= $mntry['contactnum'] ?></td>
                <td><?= $mntry['referencenum'] ?></td>
                <td><?= number_format($mntry['cashDonation'], 2) ?></td>
                <td><?= number_format($mntry['cashCheck'], 2)?></td>
                <td><?= $mntry['mumosahapag'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p><strong>Total Cash Donation:</strong> <?=  number_format($totals['total_cash_donation'], 2)?></p>
        <p><strong>Total Cash Check:</strong> <?= number_format($totals['total_cash_check'], 2)?></p>
        <p><strong>Total Mumo sa Hapag:</strong> <?= number_format($totals['total_mumosahapag'], 2)?></p>

        <div style="display: flex; justify-content: space-between; margin-top: 40px;">
            <div style="text-align: center;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">LITO C. VERGARA</p>
                <div style="border-bottom: 1px solid black; width: 200px; margin: 0 auto;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">Administrator</p>
            </div>
        </div>
    </div>
      
</body>
</html>
