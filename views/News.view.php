<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }
    .news-item {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 15px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .news-item img {
        width: 150px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 15px;
    }
    .news-item h3 {
        margin: 0 0 10px;
        font-size: 18px;
        color: #333;
    }
    .news-item p {
        margin: 0;
        font-size: 14px;
        color: #555;
    }
    .btn-more {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    .btn-more:hover {
        background-color: #0056b3;
    }

    .btn-more {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 24px;
        background-color: #28a745; /* Green background */
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        text-align: center;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-more:hover {
        background-color: #218838; /* Darker green for hover */
        transform: translateY(-2px); /* Slightly lift the button on hover */
    }

    .btn-more:active {
        transform: translateY(1px); /* Button "press" effect */
    }



</style>

<div class="container">
    <h2>Latest News</h2>

    <?php
    // Loop through the news array and display each item
    foreach ($news as $newsItem) {
        echo '<div class="news-item">';
        echo '<img src="' . htmlspecialchars($newsItem['image_path']) . '" alt="' . htmlspecialchars($newsItem['title']) . '">';
        echo '<div>';
        echo '<h3>' . htmlspecialchars($newsItem['title']) . '</h3>';
        echo '<p>' . htmlspecialchars($newsItem['description']) . '</p>';
        // Form section - fixed syntax for PHP within HTML
        echo '<form action="/news" method="POST">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($newsItem['id']) . '">';
        echo '<button type="submit" class="btn-more">View Details</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    ?>

    <a href="/news" class="btn-more">See all news</a>
</div>
