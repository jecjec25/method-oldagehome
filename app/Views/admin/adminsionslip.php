    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admission Slip</title>
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
        </style>
    </head>
    <body>
        <div class="button-download">
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

        
            <table>
                    <tr>
                        <th colspan="10" width="60%">Date of Admision</th>
                        <th colspan="8">Case No.</th>
                    </tr>
                    <tr>
                        <th colspan="18" style="text-align: center;">Client</th>
                    </tr>
                    <tr>
                        <th colspan="10">Name: </th>
                        <th colspan="3">Sex:</th>
                        <th colspan="5">Civil Status:</th>
                    </tr>
                    <tr>
                        <th colspan="18">Address</th>
                    </tr>
                    <tr>
                        <th colspan="3">Birth Date</th>
                        <th colspan="7"></th>
                        <th colspan="8">Birth Place </th>
                    </tr>
                    <tr>
                        <th colspan="18" style="text-align: center;">COMPANION UPON ADMISION</th>
                    </tr>
                    <tr>
                        <th colspan="8">Name:</th>
                        <th colspan="10">Contact No.</th>
                    </tr>
                    <tr>
                        <th colspan="8">Address:</th>
                        <th colspan="10">Relation to the Client</th>
                    </tr>
                    <tr>
                        <th colspan="18" style="text-align: center;">REFFERING PARTY</th>
                    </tr>
                    <tr>
                        <th colspan="18">Name:</th>
                    </tr>
                    <tr>
                        <th colspan="18">Address:</th>
                    </tr>
                    <tr>
                        <th colspan="18">Contact no.</th>
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
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                        <th colspan="2">2.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                        <th colspan="2">3.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                        <th colspan="2">4.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr> 
                        <th colspan="2">5.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">6.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">7.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">8.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">9.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">10.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">11.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">12.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">13.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">14.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                    <tr>
                    <th colspan="2">15.</th>
                        <th colspan="9"></th>
                        <th colspan="9"></th>
                    </tr>
                <tr>
        <th colspan="11" style="text-align: center;">
            <h4 style="margin: 0;">Inventoried by: _____________________________</h4>
            <p style="margin: 0; font-size: 12px;">Printed Name over Signature</p>
            <h4 style="margin: 0;">Turn Over to: _____________________________</h4>
            <p style="margin: 0; font-size: 12px;">Printed Name over Signature</p>
        </th>
        <th colspan="9">
        <h4 style="margin: 0;">Received By: _____________________________</h4>
        <p style="margin: 0; font-size: 12px;">Printed Name over Signature</p>
        </th>
    </tr>

            </table>
            <div style="display: flex; justify-content: space-between; margin-top: 40px;">
        <div style="text-align: center;">
            <div style="border-bottom: 1px solid black; width: 200px; margin: 0 auto;"></div>
            <p style="margin: 5px 0 0 0; font-size: 14px;">Name & Signature of Referring Party</p>
        </div>
        <div style="text-align: center;">
            <div style="border-bottom: 1px solid black; width: 200px; margin: 0 auto;"></div>
            <p style="margin: 5px 0 0 0; font-size: 14px;">Social Worker</p>
        </div>
    </div>


                </div>
            </div>
        </div>


    </body>
    </html>
                        