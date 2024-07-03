<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Monetary Report</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
            margin: 0;
            padding: 0;
            background-color: #EDEEF1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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


        .size {
            width: 210mm;
            min-height: 297mm;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin: 20px auto;
            
            margin-top: 450px;
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
            table-layout: fixed;
        }

        table, th, td {
            border: 1px solid black;
            word-wrap: break-word;
        }

        th, td {
            padding: 8px;
            text-align: left;
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
    </style>
</head>
<body>
    <div class="button-download">
        <a href="<?= base_url('getReportsMonatary/' .$fromdate. '/' . $todate ) ?>">Print</a>
    </div>
    <div class="button-back">
        <a href="javascript:history.back()">Back</a>
    </div>
    <div class="size">
        <div class="header">
            <img src="<?= base_url('picture.jpg') ?>" alt="Logo">
            <h5 style="margin: 0;">Republic of the Philippines</h5>
            <h5 style="margin: 0;">Province of Oriental Mindoro</h5>
            <h5 style="margin: 0;">Barangay Managpi, Calapan City</h5>
            <h5 style="margin: 0;">Company Registration Number: CN2011421030</h5>
            <h5 style="margin: 0;">Company TIN Number: 008-893-471</h5>
            <h4 style="margin: 0; padding-top: 5px;">ARUGA-KAPATID FOUNDATION INCORPORATED</h4>
        </div>

        <h3 style="text-align: center;">Aruga Kapatid Foundation Incorporated</h3>
        <h4 style="text-align: center;">Elder Care Program Participant Report</h4>

        <p>Date: <?= $currentDate ?></p>
        <p>Reporting Period: <?= $fromdate ?> - <?= $todate ?></p>

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
                    echo $date->format('F j, Y g:i A');
                    ?>
                </td>
                <td><?= $mntry['establishment'] ?></td>
                <td><?= $mntry['lastname'] ?></td>
                <td><?= $mntry['firstname'] ?></td>
                <td><?= $mntry['middlename'] ?></td>
                <td><?= $mntry['contactnum'] ?></td>
                <td><?= $mntry['referencenum'] ?></td>
                <td><?= $mntry['cashDonation'] ?></td>
                <td><?= $mntry['cashCheck']?></td>
                <td><?= $mntry['mumosahapag'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p><strong>Total Cash Donation:</strong> <?=  number_format($totals['total_cash_donation'], 2)?></p>
        <p><strong>Total Cash Check:</strong> <?= number_format($totals['total_cash_check'], 2)?></p>
        <p><strong>Total Mumo sa Hapag:</strong><?= number_format($totals['total_mumosahapag'], 2)?></p>
        <p class="summary">Summary</p>
        <p>During the reporting period, a total of <?= $count ?> monetary donations were received by Aruga Kapatid Foundation Incorporated.</p>
                <div class="acknowledgement">
                    <p>Acknowledgement</p>
                    <p>Thank you to all sponsors, volunteers, and attendees for their support and participation in the events.</p>
                </div>
        <div class="footer">
            <p class="report">Report Generated By:</p>
            <br>
            <div class="signatures">
                <p>Henry Dacanay III</p>
                <p>Admin Staff</p>
            </div>
            <p class="report">Approved By:</p>
            <br>
            <div class="signatures">
                <p>Lito Vergara</p>
                <p>Administrator</p>
            </div>
        </div>
    </div>


</body>
</html>
                    