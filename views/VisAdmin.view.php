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

    /* Sidebar Styles */
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
        width: 90%;
        max-width: 2500px;
        margin: 30px auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

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
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    tr:hover {
        background-color: #f9f9f9;
    }

    /* Responsive Table */
    @media (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
        }

        th, td {
            padding: 8px;
            font-size: 14px;
        }
    }

    /* Filter Container */
    .filter-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        align-content: center;
    }

    .filter-container input {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Progress Bars */
    .progress-container {
        margin-top: 40px;
        padding: 20px;
    }

    .progress-bar {
        height: 60px;
        border-radius: 15px;
        background-color: #e0e0e0;
        margin-bottom: 20px;
        width: 100%;
    }

    .progress-bar span {
        display: block;
        height: 100%;
        border-radius: 15px;
        text-align: center;
        color: white;
        font-weight: bold;
        line-height: 60px;
        font-size: 1.5rem;
        padding-left: 15px;
        padding-right: 150px;
        white-space: nowrap;
        overflow: hidden;
    }

    /* Partner Categories */
    #partner_counts {
        margin-top: 40px;
        padding: 20px;
    }

    #partner_counts h2 {
        color: #333;
        margin-bottom: 20px;
        font-size: 1.6rem;
        text-align: center;
    }

    .partner-category {
        height: 50px;
        border-radius: 10px;
        margin-bottom: 15px;
        width: 100%;
    }

    .partner-category span {
        display: block;
        height: 100%;
        border-radius: 10px;
        text-align: center;
        color: white;
        font-weight: bold;
        line-height: 50px;
        font-size: 1.3rem;
        padding-left: 10px;
        padding-right: 500px;
        white-space: nowrap;
        overflow: hidden;
    }

    /* Delete Button */
    .delete-form .delete-button {
        background-color: #ed9187;
        color: white;
        border: none;
        padding: 8px 16px;
        font-size: 1rem;
        height: 3rem;
        width: 7rem;
        font-weight: bold;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .delete-form .delete-button:hover {
        background-color: #e03e3e;
        transform: scale(1.05);
    }

    .delete-form .delete-button:active {
        background-color: #c62d2d;
        transform: scale(0.98);
    }

    .delete-form .delete-button:focus {
        outline: 2px solid #f39c12;
        outline-offset: 2px;
    }

    /* Footer Styles */
    footer {
        text-align: center;
        padding: 15px;
        background-color: #333;
        color: white;
        position: fixed;
        width: 100%;
        bottom: 0;
        font-size: 0.9rem;

        input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 1rem;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        /* Hide Save button initially */
        .save-button {
            display: none;
            height: 3rem;
            font-size: 1rem;
            width: 7rem;
            margin-bottom: 10px;
        }

        /* Delete Button */



    }

/*   HERE WILL BE ME  */
    /* Edit Button Styling */
    .edit-button {
        background-color: #87abed; /* Green color for editing */
        color: white;
        padding: 8px 16px;
        font-size: 1rem;
        font-weight: bold;
        height: 3rem;
        width: 7rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 10px;
        display: inline-flex;
        align-items: center; /* Align text and icon */
        transition: background-color 0.3s, transform 0.2s;
    }

    /* Edit Button Icon */
    .edit-button::before {
        content: "\270F"; /* Unicode for the pen icon (✏️) */
        margin-right: 8px; /* Space between icon and text */
    }

    /* Hover Effect for Edit Button */
    .edit-button:hover {
        background-color: #1f61db; /* Slightly darker green when hovered */
        transform: scale(1.05);
    }

    /* Active Effect for Edit Button */
    .edit-button:active {
        background-color: #388e3c; /* Even darker green when clicked */
        transform: scale(0.98);
    }

    /* Focus Effect for Edit Button */
    .edit-button:focus {
        outline: 2px solid #f39c12;
        outline-offset: 2px;
    }

/*  Form edit  */
    /* Save Button Style (Hidden by default) */
    .save-button {
        background-color: #A8D6A1; /* Green with low saturation */
        color: white;
        border: none;
        padding: 8px 16px;
        height: 3rem;
        font-size: 1rem;
        width: 7rem;
        margin-bottom: 10px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s, transform 0.2s;
        display: none; /* Hidden by default */
        align-items: center;
        justify-content: center;
    }

    .save-button:hover {
        background-color: #8EC088; /* Darker green on hover */
        transform: scale(1.05);
    }

    .save-button:active {
        background-color: #7A9E76; /* Even darker green on active */
        transform: scale(0.98);
    }

    .save-button:focus {
        outline: 2px solid #F39C12; /* Outline color on focus */
        outline-offset: 2px;
    }

    /* Edit Form Styling (Inside table cells) */
    .edit-form input {
        width: 100%;
        padding: 6px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fafafa;
        transition: border-color 0.3s;
    }

    .edit-form input:focus {
        border-color: #5fa8d0; /* Border color on focus */
        outline: none;
    }

    /* Additional Form Styling */
    .edit-form {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .edit-form button {
        background-color: #5fa8d0; /* Blue color for save action */
        color: white;
        padding: 8px 16px;

        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .edit-form button:hover {
        background-color: #4a8bba;
    }

    .edit-form button:active {
        background-color: #3a7b9b;
    }
/* Button for cancel  */

    /* Cancel Button Style (Hidden by default) */
    .cancel-button {
        background-color: white; /* Same red with low saturation as Edit */
        color: red;
        border:1px solid red;
        padding: 8px 16px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        width: 7rem;
        height: 3rem;
        border-radius: 4px;
        transition: background-color 0.3s, transform 0.2s;
        display: none; /* Hidden by default */
        align-items: center;
        justify-content: center;
    }

    .cancel-button:hover {
        background-color: #B06868; /* Darker red on hover */
        transform: scale(1.05);
    }

    .cancel-button:active {
        background-color: #9F5A5A; /* Even darker red on active */
        transform: scale(0.98);
    }

    .cancel-button:focus {
        outline: 2px solid #F39C12; /* Outline color on focus */
        outline-offset: 2px;
    }
    .btn {
        padding: 12px 24px; /* Adds padding inside the button */
        background-color: #007bff; /* Sets the background color */
        color: white; /* Sets the text color */
        border: none; /* Removes the border */
        border-radius: 4px; /* Rounds the corners */
        font-size: 16px; /* Adjusts the font size */
        cursor: pointer; /* Changes the mouse cursor to a pointer */
        transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    .btn:hover {
        background-color: #0056b3; /* Changes background color on hover */
    }

    .btn:active {
        background-color: #003f7f; /* Changes background color when button is clicked */
    }

    .btn:focus {
        outline: none; /* Removes the focus outline */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Adds a subtle glow effect when focused */
    }
    .validate-button {
        display: inline-block;
        padding: 0.5rem;
        width: 6rem;
        height: 2rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none; /* Remove underline from link */
    }

    .validate-button button {
        background-color: transparent;
        border: none;
        color: inherit;
        font-size: inherit;
    }

    .validate-button:hover {
        background-color: #45a049;
    }
</style>

<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/AdminDashboard" style="text-decoration: none; color: white;" >
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
            <li><a href="/manageCards">Manage Cards</a></li>
            <li><a href="/manageOffers">Manage Offers</a></li>
            <li><a href="/manageNews">Manage News</a></li>


            <li><a href="/settings">Settings</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </div>

    <!-- Admin Table Area -->
    <div class="admin-table-container">
        <h1>Manage <?php echo $Vis?></h1>
        <h1>Add <?php echo $Vis?> </h1>
        <!--  ADD HERE STATS FOR PARTNERS -->
        <a href="/addElement?Vis=<?php echo urlencode($Vis); ?>">
            <button type="button" class="btn">Go to Add Element</button>
        </a>

        <?php if($Vis == 'Partners'):?>
            <section id="average_reductions">
                <h2>Average Reductions</h2>
                <?php
                $reductions = $stats['average_reductions'];
                $colors = [
                    'avg_reduction_classique' => '#FF5733',
                    'avg_reduction_jeunes' => '#33B5FF',
                    'avg_reduction_premium' => '#8BC34A',
                ];

                foreach ($reductions as $key => $value) {
                    $category = ucfirst(str_replace('_', ' ', substr($key, 14)));
                    $percentage = number_format($value, 2);
                    $width = $percentage;
                    $color = $colors[$key];

                    echo "<div class='progress-bar'>
                        <span style='width: {$width}%; background-color: {$color};'>{$category}: {$percentage}%</span>
                      </div>";
                }
                ?>
            </section>

            <section id="partner_counts">
                <h2>Partner Counts by Category</h2>
                <?php
                foreach ($stats['partner_counts'] as $partner) {
                    $category = $partner['category'];
                    $count = $partner['partner_count'];
                    $width = $count * 10;
                    $color = '#' . substr(md5($category), 0, 6);

                    echo "<div class='partner-category'>
                        <span style='width: {$width}px; background-color: {$color};'>{$category} ({$count})</span>
                      </div>";
                }
                ?>
            </section>
        <?php endif; ?>

        <!-- Filter Form -->
        <div class="filter-container">
            <input type="text" id="filterInput" placeholder="Search <?php echo $Vis ?> ..." onkeyup="filterTable()">
        </div>

        <table id="partnerTable">
            <thead>
            <tr>
                <?php foreach ($labels as $index => $label): ?>
                    <th onclick="sortTable(<?php echo $index; ?>)">
                        <?php echo htmlspecialchars($label); ?>
                    </th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($content)): ?>
                <?php foreach ($content as $row): ?>
                    <tr id="row-<?php echo htmlspecialchars($row[0]); ?>">
                        <?php
                        $cleaned_row = array_filter($row, function($key) {
                            return is_string($key);
                        }, ARRAY_FILTER_USE_KEY);

                        // Render the table cells
                        foreach ($cleaned_row as $column => $value): ?>
                            <td id="cell-<?php echo htmlspecialchars($row[0]) . '-' . htmlspecialchars($column); ?>">
                                <?php echo htmlspecialchars($value ?? ''); ?>
                            </td>
                        <?php endforeach; ?>

                        <td>
                            <!-- Edit Button -->
                            <button class="edit-button" onclick="editRow('<?php echo htmlspecialchars($row[0]); ?>')">Edit</button>

                            <!-- Delete Form -->
                            <div class="delete-form">
                                <form action="/deleteItem" method="POST" onsubmit="return confirmDelete();">
                                    <input type="hidden" name="content_id" value="<?php echo htmlspecialchars($row[0]); ?>">
                                    <input type="hidden" name="Vis" value="<?php echo $Vis; ?>">
                                    <button type="submit" class="delete-button">Delete &#128465;</button>
                                </form>
                            </div>

                            <!-- Validation Button -->
                            <?php if (isset($row['validated']) && $row['validated'] == 0): ?>
                                <a href="/validate?Vis=<?php echo htmlspecialchars($Vis); ?>&id=<?php echo htmlspecialchars($row[0]); ?>"
                                   class="validate-button">
                                    <button type="button">Validate</button>
                                </a>
                            <?php endif; ?>


                            <!-- Save & Cancel Buttons -->
                            <button class="save-button" onclick="saveRow('<?php echo htmlspecialchars($row[0]); ?>')" style="display: none;">💾 Save</button>
                            <button class="cancel-button" onclick="cancelEdit('<?php echo htmlspecialchars($row[0]); ?>')" style="display: none;">❌ Cancel</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?php echo count($labels) + 1; ?>">No data available</td>
                </tr>
            <?php endif; ?>
            </tbody>

            <script>

                function sortTable(columnIndex) {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("partnerTable"); // The table ID
                    switching = true; // Set flag to start switching
                    dir = "asc"; // Default sort direction

                    while (switching) {
                        switching = false; // Reset the switching flag
                        rows = table.rows; // Get all rows

                        for (i = 1; i < (rows.length - 1); i++) { // Skip header row
                            shouldSwitch = false; // Reset switch flag
                            x = rows[i].getElementsByTagName("TD")[columnIndex]; // Cell in the current row
                            y = rows[i + 1].getElementsByTagName("TD")[columnIndex]; // Cell in the next row

                            // Special case: Convert to number if columnIndex is 1
                            let xValue = columnIndex === 0 ? parseFloat(x.innerHTML) || 0 : x.innerHTML.toLowerCase();
                            let yValue = columnIndex === 0 ? parseFloat(y.innerHTML) || 0 : y.innerHTML.toLowerCase();

                            if (dir === "asc") {
                                if (xValue > yValue) {
                                    shouldSwitch = true; // Mark for switching
                                    break;
                                }
                            } else if (dir === "desc") {
                                if (xValue < yValue) {
                                    shouldSwitch = true; // Mark for switching
                                    break;
                                }
                            }
                        }

                        if (shouldSwitch) {
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]); // Swap rows
                            switching = true; // Keep switching
                            switchcount++;
                        } else {
                            if (switchcount === 0 && dir === "asc") {
                                dir = "desc"; // If no switches, reverse direction
                                switching = true;
                            }
                        }
                    }
                }



                function filterTable() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("filterInput"); // Search box input
                    filter = input.value.toUpperCase(); // Convert to uppercase for case-insensitive comparison
                    table = document.getElementById("partnerTable"); // The table ID
                    tr = table.getElementsByTagName("tr"); // Get all rows

                    for (i = 1; i < tr.length; i++) { // Skip the header row
                        tr[i].style.display = "none"; // Hide all rows initially
                        td = tr[i].getElementsByTagName("td"); // Get cells in the row

                        for (var j = 0; j < td.length; j++) { // Loop through all cells
                            if (td[j]) {
                                txtValue = td[j].textContent || td[j].innerText; // Extract cell content
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = ""; // Show row if a match is found
                                    break; // No need to check other cells in this row
                                }
                            }
                        }
                    }
                }

                // Optional confirmation on form submission
                document.querySelectorAll('.delete-form form').forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        const confirmDelete = confirm("Are you sure you want to delete this item?");
                        if (!confirmDelete) {
                            event.preventDefault();  // Prevent form submission if not confirmed
                        }
                    });
                });

                // EDIT

                var originalValues = {};

                function editRow(rowId) {
                    var row = document.getElementById("row-" + rowId);

                    originalValues[rowId] = {};

                    var cells = row.getElementsByTagName("td");
                    for (var i = 0; i < cells.length - 1; i++) { // Exclude last cell (buttons)
                        var cell = cells[i];
                        var cellValue = cell.innerHTML.trim(); // Trim spaces before and after the text
                        originalValues[rowId][cell.id] = cellValue; // Store original value for canceling later

                        var inputField = document.createElement("input");
                        inputField.type = "text";
                        inputField.value = cellValue; // Set the trimmed value in the input field
                        inputField.setAttribute("name", cell.id); // Unique name based on cell id

                        // Add styles to the input field
                        inputField.style.width = "7rem";
                        inputField.style.height = "3rem";

                        // Clear the cell and append the input field
                        cell.innerHTML = "";
                        cell.appendChild(inputField);
                    }

                    // Hide Edit button, Show Save and Cancel buttons
                    row.querySelector(".edit-button").style.display = "none";
                    row.querySelector(".save-button").style.display = "inline-block";
                    row.querySelector(".cancel-button").style.display = "inline-block";
                }

                function saveRow(rowId) {
                    var row = document.getElementById("row-" + rowId);
                    if (!row) return; // Exit if the row does not exist

                    var cells = row.getElementsByTagName("td");
                    var form = document.createElement("form");  // Create a unique form for each row
                    form.action = "editItem"; // Change to your actual submission URL
                    form.method = "POST";

                    // Gather the form data from the row's input fields
                    for (var i = 0; i < cells.length - 1; i++) { // Skip the last cell (buttons)
                        var cell = cells[i];
                        var inputField = cell.querySelector("input");
                        if (inputField) {
                            var input = document.createElement("input");
                            input.type = "hidden";
                            input.name = cell.id; // Use the cell's id as the name
                            input.value = inputField.value.trim(); // Trim any extra spaces
                            form.appendChild(input); // Append the hidden input to the form
                        }
                    }
                    var visInput = document.createElement("input");
                    visInput.type = "hidden";
                    visInput.name = "Vis";
                    visInput.value = "<?php echo $Vis; ?>";  // PHP will output the value of $Vis
                    form.appendChild(visInput);

                    document.body.appendChild(form);  // Append form to the document
                    form.submit(); // Submit the form

                    // Revert the row back to non-editable state
                    row.querySelector(".save-button").style.display = "none";
                    row.querySelector(".cancel-button").style.display = "none";
                    row.querySelector(".edit-button").style.display = "inline-block";
                }

                function cancelEdit(rowId) {
                    var row = document.getElementById("row-" + rowId);
                    var cells = row.getElementsByTagName("td");

                    // Revert to the original values
                    for (var i = 0; i < cells.length - 1; i++) {
                        var cell = cells[i];
                        var originalValue = originalValues[rowId][cell.id];
                        cell.innerHTML = originalValue; // Restore the original content
                    }

                    // Hide Save and Cancel buttons, show Edit button
                    row.querySelector(".save-button").style.display = "none";
                    row.querySelector(".cancel-button").style.display = "none";
                    row.querySelector(".edit-button").style.display = "inline-block";
                }
            </script>

