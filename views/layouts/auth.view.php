<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association - Layout</title>
    <style>
        html, body {
            height: 100%; /* Ensure the height is defined for root elements */
            margin: 0; /* Remove default margin */
        }

        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Force the body to take up the full viewport height */
        }

        /* En-tête */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 20px;
            background-color: #f4f4f4;
            border-bottom: 1px solid #ddd;
        }

        header .logo {
            font-size: 1em;
            font-weight: bold;
            max-height: 50px;
            width: auto;
        }

        header .social-links a {
            margin-left: 10px;
            text-decoration: none;
            color: #555;
        }

        /* Menu de navigation */
        nav {
            background-color: #16C47F;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            padding: 15px 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Zone principale */
        main {
            flex: 1; /* Allow the main content to expand and push the footer down */
        }

        /* Pied de page */
        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 20px;
        }

        footer ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        footer ul li {
            margin: 0 10px;
        }

        footer ul li a {
            color: white;
            text-decoration: none;
        }

        footer ul li a:hover {
            text-decoration: underline;
        }
        .right{
            position: absolute;
            right: 10px;
        }
    </style>

</head>
<body>
<!-- En-tête -->
<header>

    <div class="logo-container">
        <img class="logo" src="images/Logomain.png" alt="Partner 1">
    </div>
    <div class="social-links">
        <a href="https://web.facebook.com/albarakaglobal">Facebook</a>
        <a href="https://x.com/albarakaglobal?mx=2">Twitter</a>
        <a href="https://www.instagram.com/albarakaglobal/">Instagram</a>
    </div>
</header>

<!-- Menu de navigation -->
<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a class="right" href="/login">se deconnecter</a></li>


    </ul>
</nav>

<!-- Zone de contenu dynamique -->
{{CONTENT}}

<!-- Pied de page -->
<footer>
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Dons & Bénévolat</a></li>
        <li><a href="#">Nous contacter</a></li>
    </ul>
    <p>&copy; 2024 Al Barakah Global - Tous droits réservés</p>
</footer>
</body>
</html>
