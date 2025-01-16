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


        /*   here they end */
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
            <h3>Qr Code</h3>
            <img src="<?php echo "/images/data/qr_code/".htmlspecialchars($user->qr_code); ?>" alt="Qr code" style="width: 100%; border-radius: 5px;">
        </div>
        <div class="info-box">
            <h3>Preuve de Paiement</h3>
            <img src="<?php echo "/images/data/payment_proof/".htmlspecialchars($user->payment_proof); ?>" alt="Preuve de Paiement" style="width: 100%; border-radius: 5px;">
        </div>
    </div>

        <div class="info-box">
            <h3>Cartes achetée</h3>
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
        </div>
    </div>
</div>
</body>
</html>
