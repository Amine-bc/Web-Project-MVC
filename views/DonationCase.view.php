 <title>Demande d'Aide</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .form-container input,
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>

<h1>Demande d'Aide</h1>

<div class="form-container">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Prénom</label>
        <input type="text" id="surname" name="surname" required>

        <label for="dob">Date de naissance</label>
        <input type="date" id="dob" name="dob" required>

        <label for="help_type">Type d'Aide</label>
        <select id="help_type" name="help_type" required>
            <option value="financière">Aide financière</option>
            <option value="logement">Aide au logement</option>
            <option value="santé">Aide en santé</option>
            <option value="autre">Autre</option>
        </select>

        <label for="description">Description de la demande</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="file">Envoyer un dossier </label>
        <input type="file" id="file" name="file" accept="*" required>

        <button type="submit">Envoyer la demande</button>
    </form>
</div>

