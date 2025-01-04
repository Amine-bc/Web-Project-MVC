<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue des Partenaires</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 28px;
            color: #007BFF;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .filter-section select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            margin-right: 10px;
        }

        .filter-section button {
            padding: 8px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter-section button:hover {
            background-color: #0056b3;
        }

        /* Catalogue Cards */
        .category-section {
            margin-bottom: 40px;
        }

        .category-section h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 2px solid #007BFF;
            display: inline-block;
            padding-bottom: 5px;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: calc(33.333% - 10px);
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 18px;
            margin: 0 0 10px;
            color: #007BFF;
        }

        .card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .card a:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .card {
                width: calc(50% - 10px);
            }
        }

        @media (max-width: 480px) {
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<h1>Catalogue des Partenaires</h1>

<div class="container">
    <!-- Filter Form -->
    <div class="filter-section">
        <select name="city" id="city-filter">
            <option value="">Filtrer par Ville</option>
            <option value="Alger">Alger</option>
            <option value="Annaba">Annaba</option>
            <option value="Batna">Batna</option>
            <option value="Bejaia">Bejaia</option>
            <option value="Oran">Oran</option>
        </select>

        <select name="category" id="category-filter">
            <option value="">Filtrer par Catégorie</option>
            <option value="Hotel">Hôtels</option>
            <option value="Clinique">Cliniques</option>
            <option value="Ecole">Écoles</option>
            <option value="Agence">Agences de Voyage</option>
        </select>

        <button id="apply-filters">Appliquer</button>
        <button id="reset-filters">Réinitialiser</button>
    </div>

    <!-- Catalogue Section -->
    <div id="catalogue">
        <?php
        // PHP rendering logic remains the same, grouped by category
        $categories = [];
        foreach ($partners as $partner) {
            $categories[$partner['category']][] = $partner;
        }

        foreach ($categories as $category => $partnersInCategory): ?>
            <div class="category-section" data-category="<?= $category ?>">
                <h2><?= $category ?></h2>
                <div class="cards-container">
                    <?php foreach ($partnersInCategory as $partner): ?>
                        <div class="card" data-city="<?= $partner['city'] ?>">
                            <h3><?= $partner['name'] ?></h3>
                            <p><strong>Ville:</strong> <?= $partner['city'] ?></p>
                            <p><strong>Remise:</strong> <?= $partner[$SubType] ; ?></p>

                            <a href="<?= $partner['details_link'] ?>">Voir Plus</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function updateCatalogue(city, category) {
        // Construct the query string
        const queryParams = new URLSearchParams();
        if (city) queryParams.append('city', city);
        if (category) queryParams.append('category', category);

        // Send GET request via fetch
        fetch(`?${queryParams.toString()}`)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newCatalogue = doc.getElementById('catalogue');
                document.getElementById('catalogue').innerHTML = newCatalogue.innerHTML;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function ResetCatalogue(city, category) {
        // Construct the data object to send in the POST request body
        const postData = new FormData();
        if (city) postData.append('city', city);
        if (category) postData.append('category', category);

        // Send POST request via fetch
        fetch('', {
            method: 'POST',
            body: postData, // Send the data in the request body
        })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newCatalogue = doc.getElementById('catalogue');
                document.getElementById('catalogue').innerHTML = newCatalogue.innerHTML;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    document.getElementById('apply-filters').addEventListener('click', function (e) {
        e.preventDefault();
        const city = document.getElementById('city-filter').value;
        const category = document.getElementById('category-filter').value;
        updateCatalogue(city, category);
    });

    document.getElementById('reset-filters').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('city-filter').value = '';
        document.getElementById('category-filter').value = '';
        ResetCatalogue('', '');
    });
</script>

</body>
</html>
