<style>
    /* General Styles */
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

    th {
        cursor: pointer; /* Indicates the header is clickable */
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

    /* Content Area */
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

    /* Table Container */
    .admin-table-container {
        width: 80%;
        max-width: 2500px;
        margin: 30px auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Title Styling */
    .admin-table-container h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
        color: #333;
        font-weight: bold;
    }

    td {
        background-color: #fafafa;
    }

    /* Hover effect for table rows */
    tr:hover {
        background-color: #f9f9f9;
    }

    /* Styling for columns */
    td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Make table responsive on small screens */
    @media (max-width: 768px) {
        table {
            width: 100%;
            display: block;
            overflow-x: auto;
        }

        th, td {
            white-space: nowrap;
            padding: 8px;
        }

        th {
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }
    }
    /* Improved filter container */
    .filter-container {
        display: flex;
        width: 100%;
        justify-content: center;
        margin-bottom: 20px;
        align-content: center;
    }

    /* Input field styling */
    .filter-container input {
        width: 100%; /* Wider input field */
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box; /* Ensure padding doesn't increase the width */
    }



       /* Hover effect for table rows */
    tr:hover {
        background-color: #f0f0f0; /* Light grey on hover */
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
</style>
<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/AdminDashboard" style="text-decoration: none; color: white;">
            <h2>Admin Dashboard</h2>
        </a>
        <ul>
            <li><a href="/manageUsers">Manage Users</a></li>
            <li><a href="/managePartners">Manage Partners</a></li>
            <li><a href="/manageDonations">Manage Donations</a></li>
            <li><a href="/manageVolunteers">Manage Volunteers</a></li>
            <li><a href="/manageNotifications">Manage Notifications</a></li>
            <li><a href="/managePayments">Manage Payments & Subscriptions</a></li>
            <li><a href="/manageAdmin">Manage Admin</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </div>



    <!-- Table Admin Area -->
    <div class="admin-table-container">
        <h1>Manage <?php echo $Vis?></h1>

<!--  ADD HERE STATS FOR PARTNERS -->

        <?php if($Vis == 'Partners'):?>



        <section id="average_reductions" class="progress-container">
            <h2>Average Reductions</h2>

            <?php
            // Loop through the reductions and display the progress bars dynamically
            $reductions = $stats['average_reductions']; // Get the average reductions array
            $colors = [
                'avg_reduction_classique' => '#FF5733',
                'avg_reduction_jeunes' => '#33B5FF',
                'avg_reduction_premium' => '#8BC34A',
            ];

            foreach ($reductions as $key => $value) {
                $category = ucfirst(str_replace('_', ' ', substr($key, 14))); // Format the category name
                $percentage = number_format($value, 2); // Format percentage with 2 decimals
                $width = $percentage; // Use the percentage as width
                $color = $colors[$key];

                echo "<div class='progress-bar'>
                <span style='width: {$width}%; background-color: {$color};'>{$category}: {$percentage}%</span>
              </div>";
            }
            ?>
        </section>

        <style>
            .progress-container {
                margin-top: 40px;
                padding: 20px;
            }

            .progress-bar {
                height: 60px; /* Increased height for bigger bars */
                border-radius: 15px;
                background-color: #e0e0e0;
                margin-bottom: 20px; /* More space between bars */
                width: 100%; /* Full width of the parent container */
            }

            .progress-bar span {
                display: block;
                height: 100%;
                border-radius: 15px;
                text-align: center;
                color: white;
                font-weight: bold;
                line-height: 60px; /* Vertically center the text */
                font-size: 1.5rem; /* Increased font size for bigger text */
                padding-left: 15px; /* More space to the left for text */
                padding-right: 150px; /* More space to the right for text */
                white-space: nowrap; /* Prevent text from wrapping */
                overflow: hidden; /* Hide overflow text */
            }
        </style>

        <!-- Partner Counts Visualization -->

        <section id="partner_counts">
            <h2>Partner Counts by Category</h2>

            <?php
            // Loop through the partner counts and display the category bars dynamically
            foreach ($stats['partner_counts'] as $partner) {
                $category = $partner['category'];
                $count = $partner['partner_count'];
                $width = $count * 10; // Scale width based on the partner count
                $color = '#' . substr(md5($category), 0, 6); // Generate a dynamic color based on the category name

                echo "<div class='partner-category'>
                <span style='width: {$width}px; background-color: {$color};'>{$category} ({$count})</span>
              </div>";
            }
            ?>
        </section>

        <style>
            #partner_counts {
                margin-top: 40px;
                padding: 20px;
            }

            #partner_counts h2 {
                color: #333;
                margin-bottom: 20px;
                font-size: 1.6rem; /* Larger title */
                text-align: center;
            }

            .partner-category {
                height: 50px; /* Height of each bar */
                border-radius: 10px;
                margin-bottom: 15px; /* Space between bars */
                width: 100%; /* Full width of the parent container */
            }

            .partner-category span {
                display: block;
                height: 100%;
                border-radius: 10px;
                text-align: center;
                color: white;
                font-weight: bold;
                line-height: 50px; /* Vertically center the text */
                font-size: 1.3rem; /* Larger font size for the text */
                padding-left: 10px;
                padding-right: 500px;
                white-space: nowrap;
                overflow: hidden;
            }
        </style>

            <h2> Partners </h2>

        <?php endif; ?>






        <!-- Filter Form -->
        <div class="filter-container">
            <input type="text" id="filterInput" placeholder="Search <?php echo $Vis ?> ..." onkeyup="filterTable()">
        </div>
        <table id="partnerTable">
            <!-- Table Header (Labels) -->
            <thead>
            <tr>
                <?php foreach ($labels as $label): ?>
                    <th onclick="sortTable(0)"><?php echo htmlspecialchars($label); ?></th>
                <?php endforeach; ?>
            </tr>
            </thead>

            <!-- Table Body (Content) -->
            <tbody>
            <?php if (!empty($content)): ?>
                <?php foreach ($content as $row): ?>
                    <tr>
                        <?php
                        $cleaned_row = array_filter($row, function($key) {
                            return is_string($key);
                        }, ARRAY_FILTER_USE_KEY);

                        foreach ($cleaned_row as $column => $value): ?>
                            <td><?php echo htmlspecialchars($value ?? ''); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?php echo count($labels); ?>">No data available</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<footer>
    &copy; 2025 Your Company. All Rights Reserved.
</footer>

<script>
    // Function to sort the table by clicking on column headers
    let sortOrder = [true, true, true, true, true]; // Keep track of sort direction for each column

    function sortTable(columnIndex) {
        const table = document.getElementById("partnerTable");
        const rows = Array.from(table.rows).slice(1); // Skip header row
        const direction = sortOrder[columnIndex] ? 1 : -1;

        rows.sort((a, b) => {
            const cellA = a.cells[columnIndex].textContent.trim().toLowerCase();
            const cellB = b.cells[columnIndex].textContent.trim().toLowerCase();

            if (cellA < cellB) return -1 * direction;
            if (cellA > cellB) return 1 * direction;
            return 0;
        });

        rows.forEach(row => table.appendChild(row)); // Reorder the rows
        sortOrder[columnIndex] = !sortOrder[columnIndex]; // Toggle sort direction
    }


    // Function to filter the table rows based on the input field
    function filterTable() {
        const filterInput = document.getElementById('filterInput').value.toLowerCase();
        const table = document.getElementById('partnerTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) { // Skip header row
            const cells = rows[i].getElementsByTagName('td');
            let match = false;

            // Check if any cell contains the filter value
            for (let j = 0; j < cells.length; j++) {
                const cellValue = cells[j].textContent.trim().toLowerCase();
                if (cellValue.indexOf(filterInput) > -1) {
                    match = true;
                    break;
                }
            }

            // Show or hide the row based on the match
            if (match) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

</script>