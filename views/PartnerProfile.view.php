<style>
    /* General Styles for Cards */
    .partner-card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 20px;
        background-color: #f7f9fc;
        margin-top: 50px;
    }

    .partner-card {
        background-color: white;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        width: 400px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        height: 700px;
        margin: 10rem auto;
    }

    .partner-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .partner-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .partner-card-content {
        padding: 20px;
        text-align: center;
    }

    .partner-card-content h2 {
        font-size: 1.8rem;
        color: #333;
        margin: 10px 0;
        font-weight: bold;
    }

    .partner-card-content p {
        font-size: 1rem;
        color: #555;
        margin: 8px 0;
        line-height: 1.5;
    }

    .partner-card-content .discount {
        font-size: 1.3rem;
        font-weight: bold;
        color: #0073e6;
    }

    .partner-card-content a {
        display: inline-block;
        margin-top: 15px;
        padding: 12px 20px;
        color: #fff;
        background-color: #0073e6;
        text-decoration: none;
        border-radius: 8px;
        font-size: 1rem;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .partner-card-content a:hover {
        background-color: #005bb5;
        transform: scale(1.05);
    }
    .container {
        display: flex;
        min-height: 100vh;
    }
    /* Sidebar */
    .sidebar {
        background-color: #333;
        color: white;
        width: 250px;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        text-align: center;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 15px 0;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: white;
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }

    .sidebar ul li a:hover {
        color: #f39c12;
    }

</style>
<div class="container">
<div class="sidebar">
    <h2>Partner Dashboard</h2>
    <ul>
        <li><a href="/PartnerProfile">Partner Profile</a></li>
        <li><a href="/PartnerDashboard">Check Users</a></li>
        <li><a href="/PartnerCard">Partner Card</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</div>
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
        </div>
</div>
</div>