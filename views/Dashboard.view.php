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
    </style>
</head>
<body>
<div class="container">
    <h1 class="text_title">Bienvenue sur votre tableau de bord, <?php echo htmlspecialchars($user->name); ?> !</h1>
</div>

<div class="container">
    <!-- Informations sur l'abonnement -->
    <div class="info-box">
        <h2>Détails de l'Abonnement</h2>
        <p><strong>Type :</strong> <?php echo htmlspecialchars($user->subscription_type); ?></p>
        <p><strong>Date d'expiration :</strong> <?php echo htmlspecialchars($user->expiration_date); ?></p>
        <a class="button-class" href="/renew_subscription" > Renouveler l'abonnement</a>
    </div>

    <!-- Notifications -->
    <div class="info-box notifications">
        <h2>Notifications</h2>
        <ul>
            <?php foreach ($notifications as $notification): ?>
                <li>
                    <strong><?php echo htmlspecialchars($notification['title']); ?> :</strong>
                    <?php echo htmlspecialchars($notification['content']); ?>
                    <br>
                    <small>
                        <?php echo date('j F Y, H:i', strtotime($notification['send_date'])); ?>
                        | Type : <span class="notification-type"><?php echo htmlspecialchars($notification['type']); ?></span>
                    </small>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- Boutons d'accès rapide -->
    <div class="button-group">
        <a class="button-class" href="/discount">Voir les Réductions</a>
        <a class="button-class"  href="/donations">Gérer les Dons</a>
        <a class="button-class"  href="/partnersUser">Partenaires</a>
        <a class="button-class"  href="/volunteering">Opportunités de Bénévolat</a>
        <a class="button-class"  href="/card">Acheter Carte</a>
    </div>
</div>
</body>
</html>
