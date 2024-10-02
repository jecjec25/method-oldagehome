<!-- save_data_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Preview Admission Slip</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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

        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        table-layout: fixed;
        font-size: 14px; /* Slightly reduce font size */
    }

    table, th, td {
        border: 1px solid black;
        word-wrap: break-word;
    }

    th, td {
        padding: 4px; /* Reduce padding to minimize height */
        text-align: left;
    }
    input[type="text"] {
        width: auto;
        box-sizing: border-box;
        padding: 5px;
        border: none; 
        background-color: transparent; 
    }
    input[type="text" class="inputer"] {
        width: 90%;
        box-sizing: border-box;
        padding: 5px;
        border: none; 
        background-color: transparent; 
    }
    input[type="text"]:focus {
        outline: none; 
    }
    
    .button-print {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .button-print button {
            padding: 10px 20px;
            font-size: 16px;
            border:white;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-print button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
<form action="<?= base_url('saveToPdfSlip/' . $elder['Id'])?>" method="GET">
    <div class="button-download">
    </div>
    <div class="button-print">
    <button id="saveButton">Save</button>
    <div id="responseMessage"></div>

    </div>
    
    <div class="button-back">
        <a href="javascript:history.back()">Back</a>
    </div>
    <div class="size">
        <div class="header">
            <h5 style="margin: 0;">Republic of the Philippines</h5>
            <h5 style="margin: 0;">Province of Oriental Mindoro</h5>
            <h5 style="margin: 0;">Barangay Managpi, Calapan City</h5>
            <h5 style="margin: 0;">Company Registration Number: CN2011421030</h5>
            <h5 style="margin: 0;">Company TIN Number: 008-893-471</h5>
            <h4 style="margin: 0; padding-top: 5px;">ARUGA-KAPATID FOUNDATION INCORPORATED</h4>
        </div>

        <h4 style="text-align: center;">ADMISION SLIP</h4>

<input type="hidden" name="casenum" value="<?= $casenum?>">
<input type="hidden" name="birthplace" value="<?= $birthplace?>">
<input type="hidden" name="nameCom" value="<?= $nameCom?>">                 
<input type="hidden" name="contactCom" value="<?= $contactCom?>">          
<input type="hidden" name="addressCom" value="<?= $addressCom?>">          
<input type="hidden" name="RelatinClient" value="<?=$RelatinClient?>">
<input type="hidden" class="inputer" name="nameRef" value="<?= $nameRef?> ">
<input type="hidden" class="inputer" name="addressRef" value="<?= $addressRef?>">
<input type="hidden" name="contactRef" class="inputer" value ="<?= $contactRef?>">
<input type="hidden" class="inputer" name="num1Admision" value="<?= $num1Admision?>">
<input type="hidden" class="inputer" name="num1Discharge" value="<?= $num1Discharge?>">
<input type="hidden" class="inputer" name="num2Admision" value="<?= $num2Admision?>">
<input type="hidden" class="inputer" name="num2Discharge" value="<?= $num2Discharge?>">
<input type="hidden" class="inputer" name="num3Admision" value="<?= $num3Admision?>"> 
<input type="hidden" class="inputer" name="num3Discharge" value="<?= $num3Discharge?>">
<input type="hidden" class="inputer" name="num4Admision" value="<?= $num4Admision?>">
<input type="hidden" class="inputer" name="num4Discharge" value="<?= $num4Discharge?>">
<input type="hidden" class="inputer" name="num5Admision" value="<?= $num5Admision?>">
<input type="hidden" class="inputer" name="num5Discharge" value="<?= $num5Discharge?>">
<input value="<?= $num6Admision?>" type="hidden" class="inputer" name="num6Admision">
<input value="<?= $num6Discharge?>" type="hidden" class="inputer" name="num6Discharge">
<input value="<?= $num7Admision?>" type="hidden" class="inputer" name="num7Admision">
<input value="<?= $num7Discharge?>" type="hidden" class="inputer" name="num7Discharge">
<input value="<?= $num8Admision?>" type="hidden" class="inputer" name="num8Admision">
<input value="<?= $num8Discharge?>" type="hidden" class="inputer" name="num8Discharge">
<input value="<?= $num9Admision?>" type="hidden" class="inputer" name="num9Admision">
<input value="<?= $num9Discharge?>" type="hidden" class="inputer" name="num9Discharge">
<input value="<?= $num10Admision?>" type="hidden" class="inputer" name="num10Admision">
<input value="<?= $num10Discharge?>" type="hidden" class="inputer" name="num10Discharge">
<input value="<?= $num11Admision?>" type="hidden" class="inputer" name="num11Admision">
<input value="<?= $num11Discharge?>" type="hidden" class="inputer" name="num11Discharge">
<input value="<?= $num12Admision?>" type="hidden" class="inputer" name="num12Admision">
<input value="<?= $num12Discharge?>" type="hidden" class="inputer" name="num12Discharge">
<input value="<?= $num13Admision?>" type="hidden" class="inputer" name="num13Admision">
<input value="<?= $num13Discharge?>" type="hidden" class="inputer" name="num13Discharge">
<input value="<?= $num14Admision?>" type="hidden" class="inputer" name="num14Admision">
<input value="<?= $num14Discharge?>" type="hidden" class="inputer" name="num14Discharge">
<input value="<?= $num15Admision?>" type="hidden" class="inputer" name="num15Admision">
<input value="<?= $num15Discharge?>" type="hidden" class="inputer" name="num15Discharge">
<input value="<?= $inventoriedby?>" type="hidden" class="inputer" name="inventoriedby">
<input value="<?= $turnoverto?>" type="hidden" class="inputer" name="turnoverto">
<input value="<?= $receivedby?>" type="hidden" class="inputer" name="receivedby">
<input value="<?= $referringparty?>" type="hidden" class="inputer" name="referringparty">
<input value="<?= $socialworker?>" type="hidden" class="inputer" name="socialworker">
</form>
    <input type="hidden" name="casenum" id="scId" value="<?= htmlspecialchars($elder['Id'], ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="casenum" id="casenum" value="<?= htmlspecialchars($casenum, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="birthplace" id="birthplace" value="<?= htmlspecialchars($birthplace, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="nameCom" id="nameCom" value="<?= htmlspecialchars($nameCom, ENT_QUOTES, 'UTF-8') ?>">                 
    <input type="hidden" name="contactCom" id="contactCom" value="<?= htmlspecialchars($contactCom, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="addressCom" id="addressCom" value="<?= htmlspecialchars($addressCom, ENT_QUOTES, 'UTF-8') ?>">      
    <input type="hidden" name="RelatinClient" id="RelationClient" value="<?= htmlspecialchars($RelatinClient, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="nameRef" id="nameRef" value="<?= htmlspecialchars($nameRef, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="addressRef" id="addressRef" value="<?= htmlspecialchars($addressRef, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="contactRef" class="inputer" id="contactRef" value="<?= htmlspecialchars($contactRef, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num1Admision" id="Num1A" value="<?= htmlspecialchars($num1Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num1Discharge" id="Num1D" value="<?= htmlspecialchars($num1Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num2Admision" id="Num2A" value="<?= htmlspecialchars($num2Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num2Discharge" id="Num2D" value="<?= htmlspecialchars($num2Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num3Admision" id="Num3A" value="<?= htmlspecialchars($num3Admision, ENT_QUOTES, 'UTF-8') ?>"> 
    <input type="hidden" class="inputer" name="num3Discharge" id="Num3D" value="<?= htmlspecialchars($num3Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num4Admision" id="Num4A" value="<?= htmlspecialchars($num4Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num4Discharge" id="Num4D" value="<?= htmlspecialchars($num4Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num5Admision" id="Num5A" value="<?= htmlspecialchars($num5Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num5Discharge" id="Num5D" value="<?= htmlspecialchars($num5Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num6Admision" id="Num6A" value="<?= htmlspecialchars($num6Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num6Discharge" id="Num6D" value="<?= htmlspecialchars($num6Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num7Admision" id="Num7A" value="<?= htmlspecialchars($num7Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num7Discharge" id="Num7D" value="<?= htmlspecialchars($num7Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num8Admision" id="Num8A" value="<?= htmlspecialchars($num8Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num8Discharge" id="Num8D" value="<?= htmlspecialchars($num8Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num9Admision" id="Num9A" value="<?= htmlspecialchars($num9Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num9Discharge" id="Num9D" value="<?= htmlspecialchars($num9Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num10Admision" id="Num10A" value="<?= htmlspecialchars($num10Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num10Discharge" id="Num10D" value="<?= htmlspecialchars($num10Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num11Admision" id="Num11A" value="<?= htmlspecialchars($num11Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num11Discharge" id="Num11D" value="<?= htmlspecialchars($num11Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num12Admision" id="Num12A" value="<?= htmlspecialchars($num12Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num12Discharge" id="Num12D" value="<?= htmlspecialchars($num12Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num13Admision" id="Num13A" value="<?= htmlspecialchars($num13Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num13Discharge" id="Num13D" value="<?= htmlspecialchars($num13Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num14Admision" id="Num14A" value="<?= htmlspecialchars($num14Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num14Discharge" id="Num14D" value="<?= htmlspecialchars($num14Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num15Admision" id="Num15A" value="<?= htmlspecialchars($num15Admision, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="num15Discharge" id="Num15D" value="<?= htmlspecialchars($num15Discharge, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="inventoriedby" id="inventoriedby" value="<?= htmlspecialchars($inventoriedby, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="turnoverto" id="turnoverto" value="<?= htmlspecialchars($turnoverto, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="receivedby" id="receivedby" value="<?= htmlspecialchars($receivedby, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="referringparty" id="referringparty" value="<?= htmlspecialchars($referringparty, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" class="inputer" name="socialworker" id="socialworker" value="<?= htmlspecialchars($socialworker, ENT_QUOTES, 'UTF-8') ?>">




    <table>
                <tr>
                    <th colspan="10" width="60%">Date of Admision: <?= date('F d, Y', strtotime($elder['InputedDate'])) ?></th>
                    <th colspan="8">Case No. <?= $casenum?></th>   
                </tr>
                <tr>
                    <th colspan="18" style="text-align: center;">Client</th>
                </tr>
                <tr>
                    <th colspan="10">Name: <?= $elder['firstname']?> <?= $elder['middlename']?> <?= $elder['lastname']?></th>
                    <th colspan="3">Sex: <?= $elder['gender']?></th>
                    <th colspan="5">Civil Status: <?= $elder['marital_stat']?></th>
                </tr>
                <tr>
                    <th colspan="18">Address: <?= $elder['ComAdd']?></th>
                </tr>
                <tr>
                    <th colspan="3">Birth Date </th>
                  <th colspan="7"><?= date('F d, Y', strtotime($elder['DateBirth'])) ?></th>
                    <th colspan="8">Birth Place <?= $birthplace?></th>
                </tr>
                <tr>
                    <th colspan="18" style="text-align: center;">COMPANION UPON ADMISION</th>
                </tr>
                <tr>
                    <th colspan="8">Name: <?= $nameCom?></th>
                    <th colspan="10">Contact No. <?= $contactCom?></th>
                </tr>
                <tr>
                    <th colspan="8">Address:  <?= $addressCom?></th>
                    <th colspan="10">Relation to the Client <?=$RelatinClient?></th>
                </tr>
                <tr>
                    <th colspan="18" style="text-align: center;">REFFERING PARTY</th>
                </tr>
                <tr>
                    <th colspan="18">Name: <?= $nameRef?>  </th>
                </tr>
                <tr>
                    <th colspan="18">Address: <?= $addressRef?></th>
                </tr>
                <tr>
                    <th colspan="18">Contact no. <?= $contactRef?></th>
                </tr>

          
        </table>
        <h3 style="text-align: center;">BELONGINGS</h1>
        <table >
                <tr>
                    <th colspan="2">No.</th>
                    <th colspan="9">Upon admision</th>
                    <th colspan="9">Upon Discharge</th>
                </tr>
                <tr>
                    <th colspan="2">1.</th>
                    <th colspan="9"><?= $num1Admision?></th>
                    <th colspan="9"><?= $num1Discharge?></th>
                </tr>
                <tr>
                    <th colspan="2">2.</th>
                    <th colspan="9"><?= $num2Admision?></th>
                    <th colspan="9"><?= $num2Discharge?></th>
                </tr>
                <tr>
                    <th colspan="2">3.</th>
                    <th colspan="9"><?= $num3Admision?></th>
                    <th colspan="9"><?= $num3Discharge?></th>
                </tr>
                <tr>
                    <th colspan="2">4.</th>
                    <th colspan="9"><?= $num4Admision?></th>
                    <th colspan="9"><?= $num4Discharge?></th>
                </tr>
                <tr> 
                    <th colspan="2">5.</th>
                   <th colspan="9"><?= $num5Admision?></th>
                    <th colspan="9"><?= $num5Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">6.</th>
                   <th colspan="9"><?= $num6Admision?></th>
                    <th colspan="9"><?= $num6Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">7.</th>
                   <th colspan="9"><?= $num7Admision?></th>
                    <th colspan="9"><?= $num7Discharge?></th>
                </tr>
                <tr>                
                <th colspan="2">8.</th>
                   <th colspan="9"><?= $num8Admision?></th>
                    <th colspan="9"><?= $num8Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">9.</th>
                   <th colspan="9"><?= $num9Admision?></th>
                    <th colspan="9"><?= $num9Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">10.</th>
                   <th colspan="9"><?= $num10Admision?></th>
                    <th colspan="9"><?= $num10Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">11.</th>
                   <th colspan="9"><?= $num11Admision?></th>
                    <th colspan="9"><?= $num11Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">12.</th>
                   <th colspan="9"><?= $num12Admision?></th>
                    <th colspan="9"><?= $num12Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">13.</th>
                   <th colspan="9"><?= $num13Admision?></th>
                    <th colspan="9"><?= $num13Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">14.</th>
                   <th colspan="9"><?= $num14Admision?></th>
                    <th colspan="9"><?= $num14Discharge?></th>
                </tr>
                <tr>
                <th colspan="2">15.</th>
                   <th colspan="9"><?= $num15Admision?></th>
                    <th colspan="9"><?= $num15Discharge?></th>
                </tr>
                <tr>
                    <th colspan="11" style="text-align: center;">
                        <h4 style="margin: 10px 0 0 0; text-align: center;">
                        Inventoried by: 
                        <span style="text-decoration: underline; display: inline-block; width: 200px; text-align: left;">
                            <span style="position: relative; top: -10px;"><?= $inventoriedby ?></span>
                        </span>
                        </h4>
                        <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
                        <h4 style="margin: 20px 0 0 0; text-align: center;">
                        Turn Over to: 
                        <span style="text-decoration: underline; display: inline-block; width: 200px; text-align: left;">
                            <span style="position: relative; top: -10px;"><?= $turnoverto ?></span>
                        </span>
                        </h4>
                        <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
                    </th>
                    
                    <th colspan="9" style="text-align: center;">
                        <h4 style="margin: 0; text-align: center;">
                        Received By: 
                        <span style="text-decoration: underline; display: inline-block; width: 200px; text-align: left;">
                            <span style="position: relative; top: -10px;"><?= $receivedby ?></span>
                        </span>
                        </h4>
                        <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
                    </th>
                </tr>

        </table>
        <div style="display: flex; justify-content: space-between; margin-top: 40px;">
    <div style="text-align: center;">
        <div style="border-bottom: 1px solid black; width: 200px; margin: 0 auto;"> <?= $referringparty?></th></div>
        <p style="margin: 5px 0 0 0; font-size: 14px;">Name & Signature of Referring Party</p>
    </div>
    <div style="text-align: center;">
        <div style="border-bottom: 1px solid black; width: 200px; margin: 0 auto;"> <?= $socialworker?></th></div>
        <p style="margin: 5px 0 0 0; font-size: 14px;">Social Worker </p>
    </div>
</div>


            </div>
        </div>
    </div>

    <!-- JavaScript Code -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure this script is in a PHP file to interpret PHP tags
            const csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            // Function to update CSRF token from response
            function updateCsrfHash(newHash) {
                csrfHash = newHash;
            }

            // Array of all input field IDs
            const fieldIds = [
                
                'scId', 'casenum', 'birthplace', 'nameCom', 'contactCom', 'addressCom',
                'RelationClient', 'nameRef', 'addressRef', 'contactRef',
                'Num1A', 'Num1D', 'Num2A', 'Num2D',
                'Num3A', 'Num3D', 'Num4A', 'Num4D',
                'Num5A', 'Num5D', 'Num6A', 'Num6D',
                'Num7A', 'Num7D', 'Num8A', 'Num8D',
                'Num9A', 'Num9D', 'Num10A', 'Num10D',
                'Num11A', 'Num11D', 'Num12A', 'Num12D',
                'Num13A', 'Num13D', 'Num14A', 'Num14D',
                'Num15Admision', 'Num15D', 'inventoriedby', 'turnoverto',
                'receivedby', 'referringparty', 'socialworker'
            ];

            document.getElementById('saveButton').addEventListener('click', function() {
                // Collect data from input fields
                const data = {};

                fieldIds.forEach(function(id) {
                    const element = document.getElementById(id);
                    data[id] = element ? element.value : '';
                });

                // Include CSRF token
                data[csrfName] = csrfHash;

                // Send data via Axios
                axios.post('/NewController/savedata', data, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                        // 'X-CSRF-Token': csrfHash // Optional: If you prefer sending CSRF token via headers
                    }
                })
                .then(function (response) {
                    const res = response.data;
                    const messageDiv = document.getElementById('responseMessage');

                    if (res.status === 'success') {
                        messageDiv.style.color = 'green';
                        messageDiv.textContent = res.message;

                        // Clear input fields using loop
                        fieldIds.forEach(function(id) {
                            const element = document.getElementById(id);
                            if (element) {
                                element.value = '';
                            }
                        });
                    } else {
                        messageDiv.style.color = 'red';
                        if (typeof res.message === 'object') {
                            // Display validation errors
                            let errorMessages = 'Errors:<ul>';
                            for (const [key, value] of Object.entries(res.message)) {
                                errorMessages += `<li>${value}</li>`; // Use backticks for template literals
                            }
                            errorMessages += '</ul>';
                            messageDiv.innerHTML = errorMessages;
                        } else {
                            messageDiv.textContent = 'Error: ' + res.message;
                        }
                    }

                    // Update CSRF hash for next request
                    if (res.csrfHash) {
                        updateCsrfHash(res.csrfHash);
                    }
                })
                .catch(function (error) {
                    const messageDiv = document.getElementById('responseMessage');
                    messageDiv.style.color = 'red';
                    messageDiv.textContent = 'An error occurred: ' + error;
                });
            });
        });
    </script>

</body>
</html>
