<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription des Membres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .cofc {
            margin-top: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .containerRegister {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .containerRegister h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .containerRegister input, .containerRegister select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .containerRegister button {
            width: 100%;
            padding: 10px;
            background-color: #16C47F;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .containerRegister button:hover {
            background-color: #0056b3;
        }
        .containerRegister a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="cofc">
    <div class="containerRegister">
        <h1>Devenir Membre</h1>
        <form id="registration-form" enctype="multipart/form-data" method="POST" action="">
            <input type="text" name="name" placeholder="Nom Complet" required>
            <input type="email" name="email" placeholder="Adresse Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="password" name="confirm_password" placeholder="Confirmer le Mot de passe" required>

            <select name="subscription_type" required>
                <option value="">Type de Carte</option>
                <option value="Classique">Classique</option>
                <option value="Jeunes">Jeunes</option>
                <option value="Premium">Premium</option>
            </select>

            <label>Photo:</label>

            <input type="file" name="photo" accept="image/*" required>
            <label>Pièce d'identité:</label>
            <input type="file" name="identity" accept="image/*,application/pdf" required>
            <label>Reçu de Paiement:</label>
            <input type="file" name="payment_receipt" accept="image/*,application/pdf" required>


            <button type="submit">S'inscrire</button>
        </form>
        <a href="/login">Déjà membre ? Se connecter</a>
    </div>
</div>
</body>
</html>
