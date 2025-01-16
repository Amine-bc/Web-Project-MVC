<style>
    /* Reset body styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        line-height: 1.6;
    }

    /* Container setup for sidebar and content */
    .container {
        display: flex;
        min-height: 100vh;
        overflow: hidden;
    }

    /* Sidebar styles */
    .sidebar {
        background-color: #1d4e9f;
        color: white;
        width: 250px;
        padding: 20px;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
        transition: width 0.3s ease, box-shadow 0.3s ease;
    }

    .sidebar:hover {
        box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
    }

    .sidebar h2 {
        font-size: 1.6rem;
        margin-bottom: 30px;
        text-align: center;
        font-weight: 600;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 20px 0;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: white;
        font-size: 1.1rem;
        display: block;
        padding: 8px 0;
        transition: color 0.3s, background-color 0.3s;
        border-radius: 4px;
    }

    .sidebar ul li a:hover {
        color: #f39c12;
        background-color: rgba(243, 156, 18, 0.1);
        padding-left: 10px;
    }

    /* Content area styles */
    .content {
        flex-grow: 1;
        padding: 30px;
        background-color: #fff;
        overflow-y: auto;
    }

    .content h1 {
        font-size: 2.2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .content p {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 30px;
    }

    /* Card styles */
    .content .card {
        background-color: #f8f8f8;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-top: 25px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .content .card:hover {
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .content .card h3 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .content .card p {
        color: #777;
        margin-bottom: 15px;
    }

    .content .card a {
        text-decoration: none;
        font-size: 1rem;
        color: #1d4e9f;
        font-weight: 600;
        transition: color 0.3s;
    }

    .content .card a:hover {
        color: #f39c12;
    }

    /* Footer styles */
    footer {
        text-align: center;
        padding: 15px;
        background-color: #333;
        color: white;
        position: fixed;
        width: 100%;
        bottom: 0;
        font-size: 0.9rem;
    }

    /* Media Queries for responsiveness */
    @media screen and (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            box-shadow: none;
        }

        .content {
            padding: 20px;
        }

        .sidebar ul li {
            text-align: center;
        }

        .content h1 {
            font-size: 1.8rem;
        }

        .content .card h3 {
            font-size: 1.2rem;
        }
    }
</style>



<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="/manageUsers">Manage Users</a></li>
            <li><a href="/managePartners">Manage Partners</a></li>
<!--            <li><a href="/manageMembers">Manage Members</a></li>-->
            <li><a href="/manageDonations">Manage Donations</a></li>
            <li><a href="/manageVolunteers">Manage Volunteers</a></li>
            <li><a href="/manageNotifications">Manage Notifications</a></li>
            <li><a href="/managePayments">Manage Payments & Subscriptions</a></li>
<!--            <li><a href="/settings">Settings</a></li>-->
            <li><a href="/manageAdmin">Manage Admin</a></li>

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
            <a href="/managePartners">Go to Manage Partners</a>
        </div>

        <div class="card">
            <h3>Member Management Overview</h3>
            <p>Review and approve membership requests, manage user data and subscriptions.</p>
            <a href="/manageUsers">Go to Manage Members</a>

        </div>

        <div class="card">
            <h3>Donation and Volunteer Management</h3>
            <p>Manage donations, track volunteer sign-ups, and handle notifications.</p>
            <a href="/manageDonations">Go to Donations</a>
        </div>
    </div>
</div>
