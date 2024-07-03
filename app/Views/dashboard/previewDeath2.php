<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Deceased</title>
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
        <a href="<?= base_url('generateElderlyDeceased/') ?>">Print</a>
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
        <p>Reporting Period: <?= $closestLowerDate ?> - <?= $currentDate?></p>

        <table>
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Nickname</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reg as $reg): ?>
                    <tr>
                        <td><?= $reg['lastname'] ?></td>
                        <td><?= $reg['firstname'] ?></td>
                        <td><?= $reg['middlename'] ?></td>
                        <td><?= $reg['nickname'] ?></td>
                        <td><?= $reg['DateBirth'] ?></td>
                        <td><?= $reg['gender'] ?></td>
                        <td><?= $reg['marital_stat'] ?></td>
                        <td><?= $reg['ContNum'] ?></td>
                        <td><?= $reg['EmergencyAdd'] ?></td>
                        <td><?= $reg['RegDate'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p style="font-weight: 600;">Summary</p>
        <p>During the reporting period, a total of <?=$count?> elderly individuals passed away in the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

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
                    