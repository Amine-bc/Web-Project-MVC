


<style>
    /* Center the entire section */
    .container-activities {
        display: flex;
        justify-content: center; /* Horizontally center the content */
        align-items: center; /* Vertically center the content (optional) */
        flex-direction: column; /* Ensure items stack vertically */
        text-align: center; /* Center text inside the section */
    }

    /* Center individual elements inside the .activities */
    .activities {
        width: 100%;
        max-width: 800px; /* Set a max width for the content */
        margin: 0 auto; /* Center the container */
    }

    /* Optional: Style the button */
    .btn-more {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007BFF; /* Adjust as needed */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
    }

    .btn-more:hover {
        background-color: #0056b3; /* Adjust hover effect */
    }

    #partners {
        padding: 30px 0;
        background-color: #f4f4f4;
        border: 1px solid #ddd;
        text-align: center;
    }

    #partners h2 {
        margin-bottom: 15px;
        font-size: 24px;
        color: #333;
    }

    .partners-logos {
        display: flex;
        padding: 30px 0;
        justify-content: center;
        gap: 20px;
        align-items: center;
        flex-wrap: wrap;
    }

    .partners-logos img {
        max-width: 150px;
        margin: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .partners-logos img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    /* General container styling */
    .container-table {
        margin: 20px 20px;
        font-family: Arial, sans-serif;
    }

    /* Table styling */
    #main-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: 16px;
    }

    #main-table thead {
        background-color: #16C47F;
        color: white;
    }

    #main-table th,
    #main-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }

    /* Alternating row colors */


    #main-table tbody tr {
        background-color: #fff;
    }

    /* Hover effect */
    #main-table tr:hover {
        background-color: #16C47F;
        font-weight: bold;
    }

    /* Header alignment */
    #main-table th {
        text-align: center;
        font-weight: bold;
    }

    /* First column styling */
    #main-table th[scope="col"],
    {
        background-color: #16C47F;
        font-weight: bold;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        #main-table {
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        #main-table {
            font-size: 12px;
        }

        #main-table th, #main-table td {
            padding: 8px 10px;
        }
    }
    .diaporama {
        padding-top: 20px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        animation: slide 20s linear infinite; /* Smooth and continuous */
        width: calc(100vw * 4); /* Adjust this based on the number of images */
    }

    .diaporama img {
        width: 100vw; /* Each image takes up full viewport width */
        height: auto;
        margin-right: 20px;
        flex-shrink: 0; /* Prevent shrinking */
    }

    .container-diapo {
        width: 100%; /* Full container width */
        overflow: hidden; /* Hide the overflow */
    }

    .diaporama {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        animation: slide 20s linear infinite; /* Smooth and continuous */
        width: calc(100vw * 4); /* Adjust this based on the number of images */
    }

    .diaporama img {
        width: 100vw; /* Each image takes up full viewport width */
        height: auto;
        flex-shrink: 0; /* Prevent shrinking */
    }

    /* Keyframes for smooth sliding and returning */
    @keyframes slide {
        0% {
            transform: translateX(0vw); /* Start at the original position */
        }
        100% {
            transform: translateX(-220vw); /* Slide all images off screen (for 4 images) */
        }

    }

    .event-card{
        margin-top: 30px;
        max-height: 300px ;
        width: auto;
    }



    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }



    /* Styles pour les nouvelles et activités */
    #news-activities {
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    #news-activities h2 {
        margin-bottom: 15px;
    }

    .news-item {
        margin-bottom: 30px;
    }

    .news-item h3 {
        margin: 0;
        color: #333;
    }

    .news-item p {
        margin: 5px 0;
        color: #555;
    }

    .btn-more {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 15px;
        background-color: #16C47F;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-more:hover {
        background-color: #0056b3;
    }

    /* Styles pour les partenaires */
    #partners {
        padding: 20px;
        background-color: #f4f4f4;
        border: 1px solid #ddd;
    }

    #partners h2 {
        margin-bottom: 15px;
    }

    .partners-logos {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .partners-logos img {
        max-width: 150px;
        margin: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .pagination {
        text-align: center;
        margin-top: 20px;
    }
    .pagination a {
        margin: 10px 10px;
        padding: 10px 20px;
        text-decoration: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
    }
    .pagination a:hover {
        background-color: #0056b3;
    }
    .pagination span {
        margin: 0 5px;
        padding: 10px 20px;
        background-color: #f4f4f4;
        color: #333;
        border-radius: 5px;
    }


</style>

<main>
    <!-- Section du diaporama -->
    <section id="diaporama">

        <div class="container-diapo">
            <div id="diaporama" class="diaporama">

                <img src="/images/slideshow/slide1.png" alt="Image 1" >
                <img src="/images/slideshow/slide2.png" alt="Image 1" >
                <img src="/images/slideshow/slide3.png" alt="Image 1" >


            </div>
        </div>

    </section>


    <!-- Section des nouvelles et activités -->
    <section id="news-activities" class="container-activities">
        <div class="activities">
            <h2>Nouvelles des Activités</h2>

            <?php foreach ($news as $item): ?>
                <div class="news-item">
                    <h3><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <img class="event-card" src="<?= htmlspecialchars($item['image_path'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>">
                    <p><?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            <?php endforeach; ?>

            <a href="/news" class="btn-more">Voir toutes les nouvelles</a>
        </div>

    </section>

    <?php
    // Fetch the current page number from the query string (default to 1)
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 10; // Set how many rows you want to display per page



    // Pagination: Slice the data array based on the current page
    $start = ($pageNumber - 1) * $itemsPerPage;
    $paginatedAdvantages = array_slice($advantages, $start, $itemsPerPage);

    // Calculate the total number of pages
    $totalPages = 30;
    ?>

    <section id="partners">
        <h2>Nos Partenaires</h2>
        <div class="partners-logos">
            <img class="partner-logo" src="images/partner1.png" alt="Partenaire 1">
            <img class="partner-logo" src="images/partner2.jpg" alt="Partenaire 2">
            <img class="partner-logo" src="images/partner3.png" alt="Partenaire 3">
        </div>
    </section>

    <section id="Avantages">
        <div class="container-table">
            <h2>Avantages</h2>

            <table id="main-table">
                <thead>
                <tr>
                    <th scope="row">Ville</th>
                    <th scope="row">Categorie</th>
                    <th scope="row">Nom</th>
                    <th scope="row">Reduction</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($advantages as $advantage): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($advantage['city']); ?></td>
                        <td><?php echo htmlspecialchars($advantage['category']); ?></td>
                        <td><?php echo htmlspecialchars($advantage['name']); ?></td>
                        <td><?php echo htmlspecialchars($advantage['reduction']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div id="partnersPage">
                <div id="partnersList">
                </div>

                <div class="pagination" id="pagination">


                        <a href="javascript:void(0);" class="prevPage" onclick="getNextTable(<?php echo $pageNumber - 1; ?>)">Previous</a>

                    <span>Page <?php echo $pageNumber; ?> </span>

                    <?php if ($pageNumber < $totalPages): ?>
                        <a href="javascript:void(0);" class="nextPage" onclick="getNextTable(<?php

                        echo $pageNumber + 1;  ?>)">Next</a>
                    <?php endif; ?>
                </div>


            </div>

        </div>

        <script>
            // Function to get the next table based on the page number
            function getNextTable() {
                // Step 1: Get the current page number from the DOM
                const paginationSpan = document.querySelector('#pagination span');
                const currentPageText = paginationSpan.textContent; // e.g., "Page 2 of 5"

                // Extract the current page number by splitting the text and getting the first part (before 'of')
                const currentPageNumber = parseInt(currentPageText.split(' ')[1]);

                // Determine the next page number
                let nextPageNumber = currentPageNumber;
                if (nextPageNumber < 1 ) {
                    nextPageNumber = 1;
                }
                // Check if the button clicked is "Next" or "Previous"
                if (event.target.classList.contains('nextPage')) {
                    nextPageNumber++;
                } else if (event.target.classList.contains('prevPage')) {
                    nextPageNumber--;
                }

                // Step 2: Send GET request to fetch data for the new page
                fetch(`/tablePartners?page=${nextPageNumber}`)
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newTable = doc.getElementById('main-table'); // The ID of the table you want to update

                        // Update the table content
                        if (newTable) {
                            document.getElementById('main-table').innerHTML = newTable.innerHTML;
                        } else {
                            console.error('Table with id "main-table" not found in the response');
                        }

                        // Step 3: Update the pagination display with the new page number
                        document.querySelector('#pagination span').textContent = `Page ${nextPageNumber} `; // Update page display dynamically
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }

        </script>


    </section>






</main>
