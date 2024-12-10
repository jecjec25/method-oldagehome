<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
           
            font-size: 12px;
            margin: 0;
            padding: 0;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .size {
            width: 8.5in; /* Long bond paper width */
            height: auto; /* Allow for dynamic height */
            background-color: #fff;
            padding: 10px;
            box-sizing: border-box;
        }

         .header {
                    text-align: center;
                    position: relative;
                }
                .header img {
                    position: absolute;
                    left: 0;
                    top: 0;
                    height: 120px;
                }
                .header h5 {
                    margin: 0;
                }

        table {
            width: 80%;
            border-collapse: collapse;
            table-layout: fixed;
            font-size: 12px;
            margin-left:40px;
        }

        table, th, td {
            border: 1px solid black;
            word-wrap: break-word;
        }

        th, td {
            padding: 4px;
            text-align: left;
        }

      .signature-section {
    display: flex;
    justify-content: space-between; /* This will place the boxes on opposite sides */
    margin-top: 30px;
        }

        .signature-box  {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 45%; /* Adjust the width if necessary */
        }

        .signature-line {
            border-bottom: 1px solid black;
            width: 200px;
            margin: 0 auto;
            text-align: center;
        }

        .signature-text {
            margin-top: 5px;
            font-size: 12px;
            text-align: center;
        }

                    .signature-lines {
            border-bottom: 2px solid black;
            width:200px;
            margin: 0 auto;
        }

        .signature-section .social
        {
            margin-left:400px;
        
        }
        
    </style>
</head>
<body>

    <div class="size">
       <div class="header" style="font-size:15px; text-align:center;">

                <h5>Republic of the Philippines</h5>
                <h5>Province of Oriental Mindoro</h5>
                <h5>Barangay Managpi, Calapan City</h5>
                <h5>HAPAG ARUGA FOUNDATION INCORPORATED</h5>
            </div>


        <h4 style="text-align: center; margin-bottom:10px;">ADMISSION SLIP</h4>

        <table>
            <tr>
                <th colspan="10">Date of Admission:  <?= $mydata ?> </th>
                <th colspan="8">Case No. <?= $casenum ?>  </th>
            </tr>
            <tr>
                <th colspan="18" style="text-align: center;">Client</th>
            </tr>
            <tr>
                <th colspan="10">Name:  <?= $elder['firstname'] . ' ' .  $elder['middlename'] .' '. $elder['lastname'] ?> </th>
                <th colspan="3">Sex:  <?= $elder['gender']?> </th>
                <th colspan="5">Civil Status: <?=$elder['marital_stat']?> </th>
            </tr>
            <tr>
                <th colspan="18">Address:  <?= $elder['ComAdd'] ?> </th>
            </tr>
            <tr>
                <th colspan="3">Birth Date </th>
                <th colspan="7"> <?= date('F d, Y', strtotime($elder['DateBirth'])) ?> </th>
                <th colspan="8">Birth Place  <?= $birthplace ?> </th>
            </tr>
            <tr>
                <th colspan="18" style="text-align: center;">COMPANION UPON ADMISSION</th>
            </tr>
            <tr>
                <th colspan="8">Name:  <?= $nameCom ?>  </th>
                <th colspan="10">Contact No.  <?= $contactCom ?> </th>
            </tr>
            <tr>
                <th colspan="8">Address:  <?= $addressCom ?> </th>
                <th colspan="10">Relation to the Client:  <?= $RelatinClient ?> </th>
            </tr>
            <tr>
                <th colspan="18" style="text-align: center;">REFERRING PARTY</th>
            </tr>
            <tr>
                <th colspan="18">Name:  <?= $nameRef ?> </th>
            </tr>
            <tr>
                <th colspan="18">Address:  <?= $addressRef ?> </th>
            </tr>
            <tr>
                <th colspan="18">Contact no.:  <?= $contactRef ?> </th>
            </tr>
        </table>

        <h3 style="text-align: center;">BELONGINGS</h3>
        <table>
            <tr>
                <th colspan="2">No.</th>
                <th colspan="9">Upon Admission</th>
                <th colspan="9">Upon Discharge</th>
            </tr>
            
          <?php  for ($i = 1; $i <= 15; $i++):?> 
                <tr>
                            <th colspan="2"><?= $i ?></th>
                            <th colspan="9"><?= ${"num{$i}Admision"} ?></th>
                            <th colspan="9"><?= ${"num{$i}Discharge"} ?></th>
                        </tr>
            <?php endfor;?>
         
                 <tr>
                    <th colspan="11" style="text-align: center;">
                        <h4 style="margin: 10px 0 0 0; text-align: center;">
                        Inventoried by: 
                        <span style="text-decoration: underline; display: inline-block; width: 200px; text-align: left;">
                            <span style="position: relative; top: 3px; margin-left:20px;"> <?= $inventoriedby?></span>
                        </span>
                        </h4>
                        <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
                        <h4 style="margin: 20px 0 0 0; text-align: center;">
                        Turn Over to: 
                        <span style="text-decoration: underline; display: inline-block; width: 200px; text-align: left;">
                            <span style="position: relative; top: 3px; margin-left:20px;"><?= $turnoverto?></span>
                        </span>
                        </h4>
                        <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
                    </th>
                    
                    <th colspan="9" style="text-align: center;">
                        <h4 style="margin: 0; text-align: center;">
                        Received By: 
                        <span style="text-decoration: underline; display: inline-block; width: 200px; text-align: left;">
                            <span style="position: relative; top: 3px; margin-left:20px;"><?= $receivedby?></span>
                        </span>
                        </h4>
                        <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
                    </th>
                </tr>
            
        </table>

        <div class="signature-section">
            <div class="signature-box Name-Sig">
                <div class="signature-line">  <?= $referringparty?>  </div>
                <p class="signature-text">Name & Signature of Referring Party  </p>
            </div>

            <div class="signature-box social">
                <div class="signature-line"> <?= $socialworker ?> </div>
                <p class="signature-text">Social Worker</p>
            </div>
        </div>
    </div>

</body>
</html>
