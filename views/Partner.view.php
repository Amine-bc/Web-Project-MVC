<style>
    /* General Styles for Cards */
    .partner-card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 20px;
        background-color: #f4f4f9;
        margin-top: 50px;

    }

    .partner-card {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        overflow: hidden;
    }

    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .partner-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .partner-card-content {
        padding: 15px;
        text-align: center;
    }

    .partner-card-content h2 {
        font-size: 1.5rem;
        color: #333;
        margin: 10px 0;
    }

    .partner-card-content p {
        font-size: 1rem;
        color: #666;
        margin: 5px 0;
    }

    .partner-card-content .discount {
        font-size: 1.2rem;
        font-weight: bold;
        color: #1d4e9f;
    }

    .partner-card-content a {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 15px;
        color: white;
        background-color: #1d4e9f;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .partner-card-content a:hover {
        background-color: #16427d;
    }
</style>
<div class="partner-card-container">
    <div class="partner-card">
        <img src="/images/partner.jpeg" alt="<?php echo $partner[0]['name']; ?>">
        <div class="partner-card-content">
            <h2><?php echo $partner[0]['name']; ?></h2>
            <p>Category: <strong><?php echo $partner[0]['category']; ?></strong></p>
            <p>City: <strong><?php echo $partner[0]['city']; ?></strong></p>
            <p>Contact:
                <?php if (!empty($partner[0]['contact_info'])): ?>
<?php echo $partner[0]['contact_info']; ?>
                <?php else: ?>
                    <span>N/A</span>
                <?php endif; ?>
            </p>
            <p>Discounts:</p>
            <p>Reduction: <span class="discount"><?php echo $partner[0]['discount']; ?>%</span></p>
            <p>Classic: <span class="discount"><?php echo $partner[0]['reduction_classique']; ?>%</span></p>
            <p>Youth: <span class="discount"><?php echo $partner[0]['reduction_jeunes']; ?>%</span></p>
            <p>Premium: <span class="discount"><?php echo $partner[0]['reduction_premium']; ?>%</span></p>
            <a href="partners">Retour </a>
        </div>
    </div>
</div>
