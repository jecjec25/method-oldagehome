<!DOCTYPE html>
<html lang="en">
<head>
    <style> 
        .table {
            width: 100%;
            margin-bottom: 20px;
        }    

        .table-striped tbody > tr:nth-child(odd) > td,
        .table-striped tbody > tr:nth-child(odd) > th {
            background-color: #f9f9f9;
        }

        @media print {
            #PrintButton, #DatePrepared {
                display: none;
            }
        }

        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    </style>
</head>
<body>
    <br /> <br /> <br /> <br />
    <b style="color:blue;">Date Prepared:</b>
    <span id="DatePrepared">
        <?php
            $date = date("Y-m-d", strtotime("+6 HOURS"));
            echo $date;
        ?>
    </span>
    <br /><br />
    <table class="table table-striped">
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
                        <th>Profile Picture</th>
                        <th>Communication Address</th>
                        <th>Emergency Address</th>
                        <th>Emergency Contact Number</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                <tr>
                    <td><?=$report['lastname'] ?></td>
                    <td><?=$report['firstname'] ?></td>
                    <td><?=$report['middlename'] ?></td>
                    <td><?=$report['nickname'] ?></td>
                    <td><?=$report['DateBirth'] ?></td>
                    <td><?=$report['gender'] ?></td>
                    <td><?=$report['marital_stat'] ?></td>
                    <td><?=$report['ContNum'] ?></td>
                    <td><img src="<?php base_url();?>/eldersimage/<?=$report['ProfPic'] ?>" alt="" style="width:50px; height:50px; border:box;"></td>
                    <td><?=$report['ComAdd'] ?></td>
                    <td><?=$report['EmergencyAdd'] ?></td>
                    <td><?=$report['EmergencyContNum'] ?></td>
                    <td><?=$report['RegDate'] ?></td>
                    </tbody>
                </table>
    <center><button id="PrintButton" onclick="PrintPage()">Print</button></center>

    <script type="text/javascript">
        function PrintPage() {
            window.print();
        }
       
    </script>
</body>
</html>
