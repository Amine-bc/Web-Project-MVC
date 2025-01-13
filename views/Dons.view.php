<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }

    .created {
        position: relative; /* Position it relative to the parent */
        right: 145px; /* Adjust to get desired space from right */
        bottom: 10px;
        font-size: 12px; /* Optional: Adjust text size */
        color: #888888; /* Optional: Style color */
    }
    h1 {
        text-align: center;
        color: #333333;
        margin-bottom: 20px;
    }
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    .card {
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        padding: 10px 20px 50px 20px;
        transition: transform 0.2s;
        text-align: center;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card h3 {
        margin: 10px 0;
        color: #4CAF50;
    }
    .card p {
        margin: 5px 0;
        color: #555555;
        font-size: 14px;
    }
    .card p span {
        font-weight: bold;
        color: #333333;
    }
    footer {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #888888;
    }
    .card img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        object-fit: cover; /* Ensures the image scales properly */
        margin-bottom: 15px; /* Adds space between the image and text */
    }
    .no-data {
        text-align: center;
        font-size: 16px;
        color: #888888;
    }
</style>

<div class="container">
    <h1>Donations List</h1>
    <div class="cards">
        <?php if (!empty($dons)): ?>
            <?php foreach ($dons as $don): ?>
                <div class="card">
                    <p class="created" ><?= date('d-m-Y', strtotime($don['creation_date'])) ?></p>
                    <!-- Picture tag added for responsive image -->
                    <picture>
                        <source srcset="/images/donation.jpeg" type="image/jpeg">
                        <img src="path/to/image.jpg" alt="Donation Image">
                    </picture>
                    <h3><?= htmlspecialchars($don['recipient_need']) ?></h3>
                    <p><span>Required Amount:</span> $<?= htmlspecialchars(number_format($don['required_amount'], 2)) ?></p>
                    <p><span>Details:</span> <?= htmlspecialchars($don['short_description']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-data">No donations found.</p>
        <?php endif; ?>
    </div>
</div>
