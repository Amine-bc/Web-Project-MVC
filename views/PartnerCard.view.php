<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        height: 100%;
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

    /* Main Content Area */
    .content {
        flex-grow: 1;
        padding: 20px;
        background-color: #fff;
    }

    .search-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .search-bar {
        width: 300px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }

    .search-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-button:hover {
        background-color: #0056b3;
    }

    .results {
        margin-top: 20px;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 80%;
        max-width: 400px;
        text-align: left;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .results p {
        margin: 0;
        font-size: 18px;
        color: #333;
    }

    /* Footer */
    footer {
        text-align: center;
        padding: 10px;
        background-color: #333;
        color: white;
        position: fixed;
        width: 100%;
        bottom: 0;
    }

    .subscription-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 8px rgba(0, 0, 0, 0.5);
        width: 300px;
        padding: 8px 55px;
        font-family: Arial, sans-serif;
        text-align: center;
        border: 3px solid #ccc;
    }
    img {
        width: 100px;
        height: 100px;
        margin-top: 15px;
        border-radius: 5px;
        object-fit: cover;
    }
    .profile {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .profile-pic {
        font-size: 40px;
        margin-right: 10px;
    }

    .username {
        font-size: 18px;
        font-weight: bold;
    }

    .subscription-info p {
        margin: 10px 0;
        font-size: 14px;
    }

    .manage-btn {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .manage-btn:hover {
        background-color: #45a049;
    }

</style>

<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Partner Dashboard</h2>
        <ul>
            <li><a href="/PartnerProfile">Partner Profile</a></li>

            <li><a href="/PartnerDashboard">Check Users</a></li>
            <li><a href="/PartnerCard">Partner Card</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="subscription-card">
            <div class="profile">
                <img src=<?php echo "".$path_qr ?>>
            </div>
            <div class="username"> <?php echo $partnerName ?> </div>

            <div class="subscription-info">
                <p><strong>Subscription Type:</strong> Partner</p>
                <p><strong>Status:</strong> Active</p>
                <p><strong>Benefits:</strong> Golden pack partner</p>

            </div>
        </div>

    </div>
</div>

<footer>
    <p>© 2024 Partner Dashboard. All Rights Reserved.</p>
</footer>

