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
        display: block; /* Show the card initially */
        margin: 0 auto;
        width: 350px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .results .user-card {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .user-info {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .profile-pic {
        font-size: 50px;
        margin-right: 15px;
    }

    .user-details {
        text-align: left;
    }

    .user-name {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .subscription-type {
        font-size: 14px;
        color: #777;
    }

    .partner-info {
        font-size: 14px;
        color: #555;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .partner-name {
        font-weight: bold;
    }

    .results:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
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

<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Partner Dashboard</h2>
        <ul>
            <li><a href="/PartnerDashboard">Check Users</a></li>
            <li><a href="/PartnerCard">Partner Card</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="content">
        <div class="search-container">
            <input type="email" id="search" name="email" class="search-bar" placeholder="Enter user email...">
            <button class="search-button" onclick="performSearch()">Search</button>
        </div>

        <div id="results" class="results" style="display: none;">
            <div class="user-card">
                <div class="user-info">
                    <div class="profile-pic">👤</div>
                    <div class="user-details">
                        <p id="user-name" class="user-name"></p>
                        <p id="sub-type" class="subscription-type"></p>
                        <p id="partner-name" class="partner-name"></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<footer>
    <p>© 2024 Partner Dashboard. All Rights Reserved.</p>
</footer>

<script type="text/javascript">
    function performSearch() {
        const email = document.getElementById('search').value;

        // Create a new FormData object to send the email to the backend
        const formData = new FormData();
        formData.append('email', email);

        // Send the data using fetch and handle the response
        fetch('/CheckUsers', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                const resultsDiv = document.getElementById('results');
                const userNameElement = document.getElementById('user-name');
                const partnerNameElement = document.getElementById('partner-name');
                const usertypeElement = document.getElementById('sub-type');

                if (data.error) {
                    userNameElement.textContent = 'Error: ' + data.error;
                    partnerNameElement.textContent = '';
                } else {

                    userNameElement.textContent = ` ${data.user.name}`;
                    usertypeElement.textContent = `User Type: ${data.user.subtype}`;
                    partnerNameElement.textContent = `Benefits : ${data.partner.name} %`;

                }

                // Display the results section
                resultsDiv.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
