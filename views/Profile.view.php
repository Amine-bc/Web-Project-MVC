<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php echo htmlspecialchars($user->name); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }
        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-details {
            flex-grow: 1;
        }
        .profile-details h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .profile-details p {
            margin: 5px 0;
            color: #555;
        }
        .profile-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .info-box {
            flex: 1 1 45%;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .info-box h3 {
            margin-top: 0;
            font-size: 16px;
            color: #333;
        }
        .info-box p {
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>
<body>
<div class="profile-container">
    <div class="profile-header">
        <div class="profile-photo">
            <img src="<?php echo "/images/data/profile_photo/".htmlspecialchars($user->profile_photo); ?>" alt="Profile Photo">
        </div>
        <div class="profile-details">
            <h1><?php echo htmlspecialchars($user->name); ?></h1>
            <p>Email: <?php echo htmlspecialchars($user->email); ?></p>
            <p>Phone: <?php echo htmlspecialchars($user->phone ?? 'N/A'); ?></p>
        </div>
    </div>
    <div class="profile-info">
        <div class="info-box">
            <h3>Address</h3>
            <p><?php echo nl2br(htmlspecialchars($user->address ?? 'N/A')); ?></p>
        </div>
        <div class="info-box">
            <h3>Subscription</h3>
            <p>Type: <?php echo htmlspecialchars($user->subscription_type); ?></p>
            <p>Status: <?php echo htmlspecialchars($user->subscription_status); ?></p>
            <p>Joined: <?php echo htmlspecialchars($user->join_date); ?></p>
            <p>Expires: <?php echo htmlspecialchars($user->expiration_date); ?></p>
        </div>
        <div class="info-box">
            <h3>Identity Photo</h3>
            <img src="<?php echo "/images/data/photo_identity/".htmlspecialchars($user->photo_identity); ?>" alt="Identity Photo" style="width: 100%; border-radius: 5px;">

        </div>
        <div class="info-box">
            <h3>Identity Photo</h3>
            <img src="<?php echo "/images/data/payment_proof/".htmlspecialchars($user->payment_proof); ?>" alt="Payment Proof" style="width: 100%; border-radius: 5px;">

        </div>

    </div>
</div>
</body>
</html>
