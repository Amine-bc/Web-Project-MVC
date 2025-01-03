
    <style>
        .container {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        .info {
            margin-top: 20px;
            font-size: 18px;
        }
        img {
            margin-top: 20px;
            width: 200px; /* Adjust the size as needed */
            height: 200px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .download-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .download-btn:hover {
            background-color: #45a049;
        }
    </style>

    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($name); ?>!</h1>
        <div class="info">
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        </div>
        <p>Enregistrez le QR code comme votre identifiant dans l'association :</p>
        <img src="<?php echo $path; ?>" alt="QR Code">
        <br>
        <a href="<?php echo $path; ?>" download>
            <button class="download-btn">Download QR Code</button>
        </a>


    </div>

