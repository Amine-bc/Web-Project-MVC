<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Case Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }
        .donation-details {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .donation-details h3 {
            color: #4CAF50;
            margin: 10px 0;
        }
        .donation-details img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .donation-details p {
            color: #555555;
            font-size: 14px;
            margin: 10px 0;
            text-align: left;
            width: 100%;
        }
        .donation-details p span {
            font-weight: bold;
            color: #333333;
        }
        .back-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Donation Case Details</h1>

    <div class="donation-details">
        <!-- Picture tag added for responsive image -->
        <picture>
            <source srcset="/images/donation_case_image.webp" type="image/webp">
            <source srcset="/images/donation_case_image.jpg" type="image/jpeg">
            <img src="/images/donation_case_image.jpg" alt="Donation Case Image">
        </picture>

        <h3><?= htmlspecialchars($don['recipient_need']) ?></h3>
        <p><span>Donation ID:</span> <?= htmlspecialchars($don['donation_id']) ?></p>
        <p><span>Required Amount:</span> $<?= htmlspecialchars(number_format($don['required_amount'], 2)) ?></p>
        <p><span>CIB Code:</span> <?= htmlspecialchars($don['cib_code']) ?></p>
        <p><span>CCP Code:</span> <?= htmlspecialchars($don['ccp_code']) ?></p>
        <p><span>Details:</span> <?= htmlspecialchars($don['assistance_details']) ?></p>
        <p><span>Contact Email:</span> <?= htmlspecialchars($don['contact_email']) ?></p>
        <p><span>Contact Phone:</span> <?= htmlspecialchars($don['contact_phone']) ?></p>
        <p><span>Created On:</span> <?= htmlspecialchars($don['creation_date']) ?></p>
        <p><span>Last Updated:</span> <?= htmlspecialchars($don['last_update']) ?></p>

        <!-- Button to go back to the donations list -->
        <a href="donations_list.php" class="back-button">Back to Donations List</a>
    </div>
</div>

</body>
</html>
