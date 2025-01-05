<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - <?php echo htmlspecialchars($user->name); ?></title>
    <style>
        .vertical-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .editProfileButton {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .editProfileButton:hover {
            background-color: #45a049;
        }

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
            margin-top: 20px;
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

        .profile-container ul {
            list-style-type: none;
            padding: 0;
        }

        .profile-container  li {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .info-box h3 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="profile-container">

    <div class="vertical-container">
        <h1>Bienvenue <?php echo $user->name ?> ! </h1>
        <a href="/editProfile">
            <button id="editProfileButton" class="editProfileButton">Modifier le Profil</button>
        </a>

    </div>
    <div class="profile-header">
        <div class="profile-photo">
            <img src="<?php echo "/images/data/profile_photo/".htmlspecialchars($user->profile_photo); ?>" alt="Photo de Profil">
        </div>
        <div class="profile-details">
            <h1><?php echo htmlspecialchars($user->name); ?></h1>
            <p>Email : <?php echo htmlspecialchars($user->email); ?></p>
            <p>Téléphone : <?php echo htmlspecialchars($user->phone ?? 'N/A'); ?></p>
        </div>
    </div>
    <div class="profile-info">
        <div class="info-box">
            <h3>Adresse</h3>
            <p><?php echo nl2br(htmlspecialchars($user->address ?? 'N/A')); ?></p>
        </div>
        <div class="info-box">
            <h3>Abonnement</h3>
            <p>Type : <?php echo htmlspecialchars($user->subscription_type); ?></p>
            <p>Statut : <?php echo htmlspecialchars($user->subscription_status); ?></p>
            <p>Inscription : <?php echo htmlspecialchars($user->join_date); ?></p>
            <p>Expiration : <?php echo htmlspecialchars($user->expiration_date); ?></p>
        </div>
        <div class="info-box">
            <h3>Photo d'Identité</h3>
            <img src="<?php echo "/images/data/photo_identity/".htmlspecialchars($user->photo_identity); ?>" alt="Photo d'Identité" style="width: 100%; border-radius: 5px;">
        </div>
        <div class="info-box">
            <h3>Preuve de Paiement</h3>
            <img src="<?php echo "/images/data/payment_proof/".htmlspecialchars($user->payment_proof); ?>" alt="Preuve de Paiement" style="width: 100%; border-radius: 5px;">
        </div>
    </div>
    <div class="profile-info">
        <div class="info-box">
            <h3>Dons</h3>
            <?php if (!empty($donations)): ?>
                <ul>
                    <?php foreach ($donations as $donation): ?>
                        <li>
                            <strong>Montant :</strong> <?php echo htmlspecialchars($donation['amount']); ?> DA<br>
                            <strong>Date :</strong> <?php echo htmlspecialchars($donation['donation_date']); ?><br>
                            <strong>Suivi :</strong> <?php echo $donation['is_tracked'] ? 'Oui' : 'Non'; ?><br>
                            <strong>Reçu :</strong> <a href="<?php echo "docs/receiptDonation/".htmlspecialchars($donation['payment_receipt']); ?>" target="_blank">Voir</a><br>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun don trouvé.</p>
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
    </div>
</div>
</body>
</html>
