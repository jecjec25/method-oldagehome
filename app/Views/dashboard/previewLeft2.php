<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Left</title>
    <link rel="icon" type="image/png" href="/LogoHapagAruga.png">
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
    <form method="get" action="<?= base_url('/generateElderlyLeft/') ?>">
    <div class="button-download">
        <button type="submit">Print</button>
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
    <h4 style="text-align: center; font-size:13px;">LIST OF ELDERS (LEFT)</h4>

    <p>Date: <?= date('F j, Y', strtotime($currentDate)) ?></p>
    <p>Reporting Period: <?= date('F j, Y', strtotime($closestLowerRecord)) ?> - <?= date('F j, Y', strtotime($LatestDate)) ?></p>

    <table>
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Nickname</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Marital Status</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Registration Date</th>
                <th>Departure Date</th>
                <th>Reason</th>
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
                    <td><?= $reg['age'] ?></td>
                    <td><?= $reg['gender'] ?></td>
                    <td><?= $reg['marital_stat'] ?></td>
                    <td><?= $reg['ContNum'] ?></td>
                    <td><?= $reg['EmergencyAdd'] ?></td>
                    <td><?= $reg['RegDate'] ?></td>
                    <td><?= $reg['departuredate'] ?></td>
                    <td><?= $reg['reasonleft'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p style="font-weight: 600;">Summary</p>
    <p>During the reporting period, a total of <?= $count ?> elderly individuals left the Elder Care Program of Hapag Aruga Foundation Incorporated.</p>

    <div style="display: flex; justify-content: space-between; margin-top: 40px;">
    <div style="text-align: center;">
        <!-- Input field for the signatory name -->
     <input 
        id="signatoryInput" 
        type="text"
        name="signatoryName"
        placeholder="Enter Name" 
        style="margin-bottom: 10px; padding: 5px; font-size: 14px; width: 200px; text-align: center;" 
     />

    <input 
        id="positionInput" 
        type="text"
        name="positionName"
        placeholder="Enter Position" 
        style="margin-bottom: 10px; padding: 5px; font-size: 14px; width: 200px; text-align: center;" 
    />
    </form>
<!-- Dynamic name and position display -->
<p id="signatoryName" style="margin: 5px 0 0 0; font-size: 14px;">[Name will appear here]</p>
<div style="border-bottom: 1px solid black; width: 200px; margin: 0 auto;"></div>
<p id="positionName" style="margin: 5px 0 0 0; font-size: 14px;">[Position will appear here]</p>
</div>
</div>
</div>
</div>
</body>
</html>

<script>
    // Reference to the input fields and display elements
    const signatoryInput = document.getElementById('signatoryInput');
    const signatoryName = document.getElementById('signatoryName');
    const positionInput = document.getElementById('positionInput');
    const positionName = document.getElementById('positionName');

    // Event listener to update the signatory name dynamically
    signatoryInput.addEventListener('input', function () {
        signatoryName.textContent = this.value || '[Name will appear here]';
    });

    // Event listener to update the position dynamically
    positionInput.addEventListener('input', function () {
        positionName.textContent = this.value || '[Position will appear here]';
    });
</script>



