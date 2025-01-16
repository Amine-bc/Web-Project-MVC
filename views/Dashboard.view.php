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
        .container-dashboard {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .center-this{

            text-align: center;
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

        /*  here are the card styles  */

        .user-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: #fff;
            padding: 10px 50px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 0 auto;
        }

        .card-logo img {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
        }

        .card-details {
            margin: 10px 0;
        }

        .card-details h2 {
            font-size: 18px;
            margin: 5px 0;
            color: #333;
        }

        .card-details p {
            font-size: 14px;
            margin: 0;
            color: #666;
        }

        .card-qr img {
            width: 100px;
            height: 100px;
            margin-top: 15px;
            border-radius: 5px;
            object-fit: cover;
        }

    </style>
</head>
<body>
<div class="container-dashboard">
    <h1 class="text_title">Bienvenue sur votre tableau de bord, <?php echo htmlspecialchars($user->name); ?> !</h1>
</div>

<h1 class="center-this">Votre Carte Utilisateur</h1>

<div class="user-card">

    <div class="card-details">
        <h2><?php echo htmlspecialchars($user->name); ?></h2>
        <p><?php echo htmlspecialchars($user->email); ?></p>

    </div>
    <div class="card-qr">
        <img src="<?php echo "/images/data/qr_code/" . htmlspecialchars($user->qr_code); ?>" alt="QR Code">
    </div>
    <p><span style="font-weight: bold; font-size: 18px; margin: 0; color: #666;">Pack: <?php echo htmlspecialchars($user->subscription_type); ?></span></p>

</div>

<div class="container-dashboard">
    <!-- Boutons d'accès rapide -->
    <div class="button-group">
        <a class="button-class" href="/discount">Voir les Réductions</a>
        <a class="button-class"  href="/donsUser">Gérer les Dons</a>
        <a class="button-class"  href="/partnersUser">Partenaires</a>
        <a class="button-class"  href="/benevolat">Opportunités de Bénévolat</a>
        <a class="button-class"  href="/Card">Acheter Carte</a>
    </div>
    <!-- Informations sur l'abonnement -->
    <div class="info-box">
        <h2>Détails de l'Abonnement</h2>
        <p><strong>Type :</strong> <?php echo htmlspecialchars($user->subscription_type); ?></p>
        <p><strong>Date d'expiration :</strong> <?php echo htmlspecialchars($user->expiration_date); ?></p>
        <a class="button-class" href="/Card" > Renouveler l'abonnement</a>
    </div>
    <div class="profile-info">
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
        <div class="info-box">
            <h3>Dons</h3>
            <?php if (!empty($donations)): ?>
                <ul>
                    <?php foreach ($donations as $donation): ?>
                        <li>
                            <strong>Montant :</strong> <?php echo htmlspecialchars($donation['donated_amount']); ?> DA<br>
                            <strong>Date :</strong> <?php echo htmlspecialchars($donation['donation_date']); ?><br>
                            <strong>Organisme</strong> <?php echo htmlspecialchars($donation['recipient_organization']); ?><br>
                            <strong>recipient_need</strong> <?php echo htmlspecialchars($donation['recipient_need']); ?><br>

                            <!--
      <strong>Reçu :</strong> <a href="--><?php //echo "docs/receiptDonation/".htmlspecialchars($donation['payment_receipt']); ?><!--" target="_blank">Voir</a><br>-->
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun don trouvé.</p>
            <?php endif; ?>
        </div>



        <div class="info-box">
            <h3>Activités de Bénévolat</h3>
            <?php if (!empty($volunteering)): ?>
                <ul>
                    <?php foreach ($volunteering as $activity): ?>
                        <li>
                            <strong>Événement :</strong> <?php echo htmlspecialchars($activity['event_name']); ?><br>
                            <strong>Description :</strong> <?php echo htmlspecialchars($activity['description']); ?><br>
                            <strong>Date :</strong> <?php echo htmlspecialchars($activity['participation_date']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucune activité de bénévolat trouvée.</p>
            <?php endif; ?>
        </div>
        <div class="info-box">
            <h3>Paiements d'Abonnement</h3>
            <?php if (!empty($subscriptions)): ?>
                <ul>
                    <?php foreach ($subscriptions as $payment): ?>
                        <li>
                            <strong>Montant :</strong> <?php echo htmlspecialchars($payment['amount']); ?> DA<br>
                            <strong>Statut :</strong> <?php echo htmlspecialchars($payment['status']); ?><br>
                            <strong>Date :</strong> <?php echo htmlspecialchars($payment['payment_date']); ?><br>
                            <strong>Reçu :</strong> <a href="<?php echo "docs/receiptSubscription/".htmlspecialchars($payment['receipt_path']); ?>" target="_blank">Voir</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun paiement d'abonnement trouvé.</p>
            <?php endif; ?>
        </div>

</div>
</div>

