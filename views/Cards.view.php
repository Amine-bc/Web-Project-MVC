<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Membre</title>
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
        .button-class {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            background-color: #16C47F;
            border-radius: 4px;
            font-size: 14px;
        }
        .button-class:hover {
            background-color: #13a66c;
        }

        .subscription-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px;
        }

        .subscription-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .subscription-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            margin-bottom: 15px;
        }

        .subscription-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .price {
            font-size: 18px;
            color: #444;
            margin-top: 5px;
        }

        .description {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .buy-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>



    <div class="subscription-list">
        <?php foreach ($cards as $card): ?>
            <div class="subscription-card">
                <div class="card-header">
                    <h3 class="subscription-name"><?php echo htmlspecialchars($card['subscription_name']); ?></h3>
                    <p class="price">$<?php echo number_format($card['price'], 2); ?> / <?php echo htmlspecialchars($card['duration']); ?></p>
                </div>
                <p class="description"><?php echo htmlspecialchars($card['description']); ?></p>
                <button class="buy-button" onclick="window.location.href='buy_subscription.php?subscription=<?php echo urlencode($card['subscription_name']); ?>'">
                    Buy Now
                </button>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
