<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Admission Slip</title>
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
            <button type="submit">Print</button>
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

<input type="hidden" name="casenum" id="casenum" value="<?= $casenum?>">
<input type="hidden" name="birthplace" id="birthplace" value="<?= $birthplace?>">
<input type="hidden" name="nameCom" id="nameCom" value="<?= $nameCom?>">                 
<input type="hidden" name="contactCom" id="contactCom" value="<?= $contactCom?>">
<input type="hidden" name="addressCom" id="addressCom" value="<?= $addressCom?>">      
<input type="hidden" name="RelatinClient" id="RelatinClient" value="<?=$RelatinClient?>">
<input type="hidden" class="inputer" name="nameRef" id="nameRef" value="<?= $nameRef?> ">
<input type="hidden" class="inputer" name="addressRef" id="addressRef" value="<?= $addressRef?>">
<input type="hidden" name="contactRef" class="inputer" id="contactRef" value ="<?= $contactRef?>">
<input type="hidden" class="inputer" name="num1Admision" id="num1Admision" value="<?= $num1Admision?>">
<input type="hidden" class="inputer" name="num1Discharge" id="num1Discharge" value="<?= $num1Discharge?>">
<input type="hidden" class="inputer" name="num2Admision" id="num2Admision" value="<?= $num2Admision?>">
<input type="hidden" class="inputer" name="num2Discharge" id="num2Discharge" value="<?= $num2Discharge?>">
<input type="hidden" class="inputer" name="num3Admision" id="num3Admision" value="<?= $num3Admision?>"> 
<input type="hidden" class="inputer" name="num3Discharge" id="num3Discharge" value="<?= $num3Discharge?>">
<input type="hidden" class="inputer" name="num4Admision" id="num4Admision" value="<?= $num4Admision?>">
<input type="hidden" class="inputer" name="num4Discharge" id="num4Discharge" value="<?= $num4Discharge?>">
<input type="hidden" class="inputer" name="num5Admision" id="num5Admision" value="<?= $num5Admision?>">
<input type="hidden" class="inputer" name="num5Discharge" id="num5Discharge" value="<?= $num5Discharge?>">
<input value="<?= $num6Admision?>" type="hidden" class="inputer" name="num6Admision" id="num6Admision">
<input value="<?= $num6Discharge?>" type="hidden" class="inputer" name="num6Discharge" id="num6Discharge">
<input value="<?= $num7Admision?>" type="hidden" class="inputer" name="num7Admision" id="num7Admision">
<input value="<?= $num7Discharge?>" type="hidden" class="inputer" name="num7Discharge" id="num7Discharge">
<input value="<?= $num8Admision?>" type="hidden" class="inputer" name="num8Admision" id="num8Admision">
<input value="<?= $num8Discharge?>" type="hidden" class="inputer" name="num8Discharge" id="num8Discharge">
<input value="<?= $num9Admision?>" type="hidden" class="inputer" name="num9Admision" id="num9Admision">
<input value="<?= $num9Discharge?>" type="hidden" class="inputer" name="num9Discharge" id="num9Discharge">
<input value="<?= $num10Admision?>" type="hidden" class="inputer" name="num10Admision" id="num10Admision">
<input value="<?= $num10Discharge?>" type="hidden" class="inputer" name="num10Discharge" id="num10Discharge">
<input value="<?= $num11Admision?>" type="hidden" class="inputer" name="num11Admision" id="num11Admision">
<input value="<?= $num11Discharge?>" type="hidden" class="inputer" name="num11Discharge" id="num11Discharge">
<input value="<?= $num12Admision?>" type="hidden" class="inputer" name="num12Admision" id="num12Admision">
<input value="<?= $num12Discharge?>" type="hidden" class="inputer" name="num12Discharge" id="num12Discharge">
<input value="<?= $num13Admision?>" type="hidden" class="inputer" name="num13Admision" id="num13Admision">
<input value="<?= $num13Discharge?>" type="hidden" class="inputer" name="num13Discharge" id="num13Discharge">
<input value="<?= $num14Admision?>" type="hidden" class="inputer" name="num14Admision" id="num14Admision">
<input value="<?= $num14Discharge?>" type="hidden" class="inputer" name="num14Discharge" id="num14Discharge">
<input value="<?= $num15Admision?>" type="hidden" class="inputer" name="num15Admision" id="num15Admision">
<input value="<?= $num15Discharge?>" type="hidden" class="inputer" name="num15Discharge" id="num15Discharge">
<input value="<?= $inventoriedby?>" type="hidden" class="inputer" name="inventoriedby" id="inventoriedby">
<input value="<?= $turnoverto?>" type="hidden" class="inputer" name="turnoverto" id="turnoverto">
<input value="<?= $receivedby?>" type="hidden" class="inputer" name="receivedby" id="receivedby">
<input value="<?= $referringparty?>" type="hidden" class="inputer" name="referringparty" id="referringparty">
<input value="<?= $socialworker?>" type="hidden" class="inputer" name="socialworker" id="socialworker">

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
    <h4 style="margin: 10px 0 0 0; text-align: center;">Inventoried by: _____________________________ <?= $inventoriedby?></h4>
    <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
    <h4 style="margin: 20px 0 0 0; text-align: center;">Turn Over to: _____________________________ <?= $turnoverto?></h4>
    <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
</th>
<th colspan="9" style="text-align: center;">
    <h4 style="margin: 0; text-align: center;">Received By: _____________________________ <?= $receivedby?></h4>
    <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
</th>

</tr>

</form>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch CSRF token from meta tags or a hidden input
            // For this example, we'll assume it's available as a meta tag
            const csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            // Function to update CSRF token from response
            function updateCsrfHash(newHash) {
                csrfHash = newHash;
            }

            document.getElementById('saveButton').addEventListener('click', function() {
                // Collect data from input fields
                const data = {
                    field1: document.getElementById('casenum').value,
                    field2: document.getElementById('birthplace').value,
                    field3: document.getElementById('nameCom').value,
                    field4: document.getElementById('contactCom').value,
                    field5: document.getElementById('addressCom').value,
                    field6: document.getElementById('RelatinClient').value,
                    field7: document.getElementById('nameRef').value,
                    field8: document.getElementById('addressRef').value,
                    field9: document.getElementById('contactRef').value,
                    field10: document.getElementById('num1Admision').value,
                    field11: document.getElementById('num1Discharge').value,
                    field12: document.getElementById('num2Admision').value,
                    field13: document.getElementById('num2Discharge').value,
                    field14: document.getElementById('num3Admision').value,
                    field15: document.getElementById('num3Discharge').value,
                    field16: document.getElementById('num4Admision').value,
                    field17: document.getElementById('num4Discharge').value,
                    field18: document.getElementById('num5Admision').value,
                    field19: document.getElementById('num5Discharge').value,
                    field20: document.getElementById('num6Admision').value,
                    field21: document.getElementById('num6Discharge').value,
                    field22: document.getElementById('num7Admision').value,
                    field23: document.getElementById('num7Discharge').value,
                    field24: document.getElementById('num8Admision').value,
                    field25: document.getElementById('num8Discharge').value,
                    field26: document.getElementById('num9Admision').value,
                    field27: document.getElementById('num9Discharge').value,
                    field28: document.getElementById('num10Admision').value,
                    field29: document.getElementById('num10Discharge').value,
                    field30: document.getElementById('num11Admision').value,
                    field31: document.getElementById('num11Discharge').value,
                    field32: document.getElementById('num12Admision').value,
                    field33: document.getElementById('num12Discharge').value,
                    field34: document.getElementById('num13Admision').value,
                    field35: document.getElementById('num13Discharge').value,
                    field36: document.getElementById('num14Admision').value,
                    field37: document.getElementById('num14Discharge').value,
                    field38: document.getElementById('num15Admision').value,
                    field39: document.getElementById('num15Discharge').value,
                    field40: document.getElementById('inventoriedby').value,
                    field41: document.getElementById('turnoverto').value,
                    field42: document.getElementById('receivedby').value,
                    field43: document.getElementById('referringparty').value,
                    field44: document.getElementById('socialworker').value,

                };

                // Include CSRF token
                data[csrfName] = csrfHash;

                // Send data via Axios
                axios.post('/datacontroller/savedata', data, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                        // CSRF token can also be sent via headers if preferred
                        // 'X-CSRF-Token': csrfHash
                    }
                })
                .then(function (response) {
                    const res = response.data;
                    const messageDiv = document.getElementById('responseMessage');

                    if (res.status === 'success') {
                        messageDiv.style.color = 'green';
                        messageDiv.textContent = res.message;
                        // Optionally, clear input fields
                        document.getElementById('casenum').value = '';
                        document.getElementById('birthplace').value = '';
                        document.getElementById('nameCom').value = '';
                        document.getElementById('contactCom').value = '';
                        document.getElementById('addressCom').value = '';
                        document.getElementById('RelatinClient').value = '';
                        document.getElementById('addressRef').value = '';
                        document.getElementById('contactRef').value = '';
                        document.getElementById('num1Admision').value = '';
                        document.getElementById('num1Discharge').value = '';
                        document.getElementById('num2Admision').value = '';
                        document.getElementById('num2Discharge').value = '';
                        document.getElementById('num3Admision').value = '';
                        document.getElementById('num3Discharge').value = '';
                        document.getElementById('num4Admision').value = '';
                        document.getElementById('num4Discharge').value = '';
                        document.getElementById('num5Admision').value = '';
                        document.getElementById('num5Discharge').value = '';
                        document.getElementById('num6Admision').value = '';
                        document.getElementById('num6Discharge').value = '';
                        document.getElementById('num7Admision').value = '';
                        document.getElementById('num7Discharge').value = '';
                        document.getElementById('num8Admision').value = '';
                        document.getElementById('num8Discharge').value = '';
                        document.getElementById('num9Admision').value = '';
                        document.getElementById('num9Discharge').value = '';
                        document.getElementById('num10Admision').value = '';
                        document.getElementById('num10Discharge').value = '';
                        document.getElementById('num11Admision').value = '';
                        document.getElementById('num11Discharge').value = '';
                        document.getElementById('num12Admision').value = '';
                        document.getElementById('num12Discharge').value = '';
                        document.getElementById('num13Admision').value = '';
                        document.getElementById('num13Discharge').value = '';
                        document.getElementById('num14Admision').value = '';
                        document.getElementById('num14Discharge').value = '';
                        document.getElementById('num15Admision').value = '';
                        document.getElementById('num15Discharge').value = '';
                        document.getElementById('inventoriedby').value = '';
                        document.getElementById('turnoverto').value = '';
                        document.getElementById('receivedby').value = '';
                        document.getElementById('referringparty').value = '';
                        document.getElementById('socialworker').value = '';
                    } else {
                        messageDiv.style.color = 'red';
                        if (typeof res.message === 'object') {
                            // Display validation errors
                            let errorMessages = 'Errors:<ul>';
                            for (const [key, value] of Object.entries(res.message)) {
                                errorMessages += <li>${value}</li>;
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


                    