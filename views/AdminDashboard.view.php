<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
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

    /* Content Area */
    .content {
        flex-grow: 1;
        padding: 20px;
        background-color: #fff;
    }

    .content h1 {
        font-size: 2rem;
        color: #333;
    }

    .content p {
        font-size: 1.1rem;
        color: #555;
    }

    .content .card {
        background-color: #f8f8f8;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .content .card h3 {
        font-size: 1.3rem;
        color: #333;
    }

    .content .card p {
        color: #555;
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
</style>
</head>
<body>
<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="/managePartners">Manage Partners</a></li>
            <li><a href="/manageMembers">Manage Members</a></li>
            <li><a href="/manageDonations">Manage Donations</a></li>
            <li><a href="/manageVolunteers">Manage Volunteers</a></li>
            <li><a href="/manageNotifications">Manage Notifications</a></li>
            <li><a href="/managePayments">Manage Payments & Subscriptions</a></li>
            <li><a href="/settings">Settings</a></li>
            <li><a href="/logout">Logout</a></li>

        </ul>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h1>Welcome to Admin Dashboard</h1>
        <p>Select an option from the sidebar to get started.</p>

        <!-- Overview Cards (example) -->
        <div class="card">
            <h3>Partner Management Overview</h3>
            <p>Manage and track all partner establishments, their offers, and statistics.</p>
            <a href="/manage-partners">Go to Manage Partners</a>
        </div>

        <div class="card">
            <h3>Member Management Overview</h3>
            <p>Review and approve membership requests, manage user data and subscriptions.</p>
            <a href="/manage-members">Go to Manage Members</a>
        </div>

        <div class="card">
            <h3>Donation and Volunteer Management</h3>
            <p>Manage donations, track volunteer sign-ups, and handle notifications.</p>
            <a href="/manage-donations">Go to Donations</a>
        </div>
    </div>
</div>
