<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations</title>
    <link rel="stylesheet" href="path_to_css/bootstrap.css">
    <link rel="stylesheet" href="path_to_css/style.css">
</head>
<body>

<div class="container">
        <h2>Donation List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Establishment</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Contact Number</th>
                    <th>Donation Date</th>
                    <th>Message</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donations as $donation): ?>
                <tr>
                    <td><?= htmlspecialchars($donation['establishment']) ?></td>
                    <td><?= htmlspecialchars($donation['lastname']) ?></td>
                    <td><?= htmlspecialchars($donation['firstname']) ?></td>
                    <td><?= htmlspecialchars($donation['contactnum']) ?></td>
                    <td><?= htmlspecialchars($donation['donationdate']) ?></td>
                    <td><?= htmlspecialchars($donation['message']) ?></td>
                    <td>
                        <?php if (!empty($donation['picture'])): ?>
                            <img src="<?="upload/monetary/" .$donation['picture']?>" alt="Donation Image" style="max-width: 100px; max-height: 100px;">

                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
