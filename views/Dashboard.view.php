
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <style>
        .text_title{
            align-content: center;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #16C47F;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .info-box {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .info-box h2 {
            margin: 0 0 10px;
            font-size: 18px;
        }
        .notifications ul {
            list-style-type: none;
            padding: 0;
        }
        .notifications li {
            margin: 5px 0;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 4px;
        }
        .button-group a {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            background-color: #16C47F;
            border-radius: 4px;
            font-size: 14px;
        }
        .button-group a:hover {
            background-color: #13a66c;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text_title">Welcome to Your Dashboard, <?php echo htmlspecialchars($user->name); ?>!</h1>
</div>

<div class="container">
    <!-- Subscription Info -->
    <div class="info-box">
        <h2>Subscription Details</h2>
        <p><strong>Type:</strong> <?php echo htmlspecialchars($user->subscription_type); ?></p>
        <p><strong>Expiry Date:</strong> <?php echo htmlspecialchars($user->expiration_date); ?></p>
        <a href="/renew_subscription" style="color: #16C47F; text-decoration: underline;">Renew Subscription</a>
    </div>

    <!-- Notifications -->
    <div class="info-box notifications">
        <h2>Notifications</h2>
        <ul>
            <?php foreach ($notifications as $notification): ?>
                <li>
                    <strong><?php echo htmlspecialchars($notification['title']); ?>:</strong>
                    <?php echo htmlspecialchars($notification['content']); ?>
                    <br>
                    <small>
                        <?php echo date('F j, Y, g:i A', strtotime($notification['send_date'])); ?>
                        | Type: <span class="notification-type"><?php echo htmlspecialchars($notification['type']); ?></span>
                    </small>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- Quick Access Buttons -->
    <div class="button-group">
        <a href="/discount">View Discounts</a>
        <a href="/donations">Manage Donations</a>
        <a href="/partnersUser">Partners</a>
        <a href="/volunteering">Volunteer Opportunities</a>
    </div>
</div>
</body>
</html>
