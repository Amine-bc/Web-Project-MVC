<?php
// Example data (you should replace this with actual data from your database)
$newsItem = $new ;
?>

<style>
    /* Global Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        width: 90%;
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px 30px;
        background-color: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 50px;
    }

    .news-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .news-header h1 {
        font-size: 2.4rem;
        color: #333;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .news-header .published-date {
        font-size: 1rem;
        color: #777;
        margin-top: 5px;
    }

    .news-image {
        width: 100%;
        max-width: 800px;  /* Adjust max-width to fit your design */
        height: auto;
        border-radius: 10px;
        margin: auto ;  /* This centers the image horizontally */
        padding: 2rem;
        display: block;  /* Makes the image a block-level element for centering */
    }

    .news-content {
        font-size: 1.2rem;
        line-height: 1.7;
        color: #444;
        margin-bottom: 40px;
        text-align: justify;
    }

    .news-author {
        font-style: italic;
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 40px;
    }

    .back-button {
        display: inline-block;
        padding: 12px 25px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s, transform 0.2s;
    }

    .back-button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .back-button:active {
        transform: translateY(2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }

        .news-header h1 {
            font-size: 2rem;
        }

        .news-content {
            font-size: 1rem;
        }

        .news-author {
            font-size: 1rem;
        }

        .back-button {
            padding: 10px 20px;
            font-size: 1rem;
        }
    }
</style>

<div class="container">
    <div class="news-header">
        <h1><?= htmlspecialchars($newsItem['title']) ?></h1>
        <div class="published-date"><?= htmlspecialchars($newsItem['created_at']) ?></div>
    </div>

    <div class="news-image">
        <img src="/images/benevolat.jpeg" alt="<?= htmlspecialchars($newsItem['title']) ?>">
    </div>

    <div class="news-content">
        <p><?= nl2br(htmlspecialchars($newsItem['detailed_description'])) ?></p>
    </div>

    <div class="news-author">
        <p>Written by: Ahmed Abdou</p>
    </div>

    <a href="/news" class="back-button">Back to News List</a>
</div>
