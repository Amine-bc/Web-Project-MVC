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
            justify-content: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
            flex-direction: column;

        }

        .editProfileForm{
            position: relative;
        }

        .profile-photo {
            display: flex;
            align-items: center;
            justify-content: center;
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
            position: relative;
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

        .info-box form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .info-box form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .info-box form button:hover {
            background-color: #45a049;
        }
    </style>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .profile-details {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .info-box {
            margin-bottom: 20px;
        }

        .info-box h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
            font-weight: bold;
        }

        /* Styles des labels */
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        /* Styles des champs de saisie */
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Styles des boutons */
        .form-button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Conception responsive optionnelle */
        @media (max-width: 600px) {
            .profile-details {
                margin: 10px;
                padding: 15px;
            }
        }
    </style>

</head>
<body>
<div class="profile-container">
    <div class="vertical-container">
        <h1>Bienvenue <?php echo $user->name ?> !</h1>
        <button id="editProfileButton" class="editProfileButton">Modifier le profil</button>
    </div>

    <!-- Formulaire de profil modifiable -->
    <div id="edit-profile-container" class="profile-header">
        <!-- Voici le formulaire de profil modifiable -->
        <div class="profile-photo">
            <img src="<?php echo "/images/data/profile_photo/".htmlspecialchars($user->profile_photo); ?>" alt="Photo de profil">
        </div>
        <form method="post" action="" id="profileEditForm" class="editProfileForm">

            <div class="profile-details">
                <div class="info-box">
                    <h3>Modifier les informations personnelles</h3>
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user->name); ?>" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>

                    <label for="phone">Téléphone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user->phone ?? ''); ?>" required>

                    <label for="address">Adresse</label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user->address ?? ''); ?>" required>

                    <button type="submit" class="form-button" >Enregistrer les modifications</button>
                </div>
            </div>
        </form>
    </div>

    <div class="profile-info">

        <div class="info-box">
            <h3>Abonnement</h3>
            <p>Type : <?php echo htmlspecialchars($user->subscription_type); ?></p>
            <p>Statut : <?php echo htmlspecialchars($user->subscription_status); ?></p>
            <p>Rejoint : <?php echo htmlspecialchars($user->join_date); ?></p>
            <p>Expire le : <?php echo htmlspecialchars($user->expiration_date); ?></p>
        </div>
        <div class="info-box">
            <h3>Photo d'identité</h3>
            <img src="<?php echo "/images/data/photo_identity/".htmlspecialchars($user->photo_identity); ?>" alt="Photo d'identité" style="width: 100%; border-radius: 5px;">
        </div>
        <div class="info-box">
            <h3>Preuve de paiement</h3>
            <img src="<?php echo "/images/data/payment_proof/".htmlspecialchars($user->payment_proof); ?>" alt="Preuve de paiement" style="width: 100%; border-radius: 5px;">
        </div>
    </div>
</div>


</body>
</html>
