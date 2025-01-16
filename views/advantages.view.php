<style>
    /* General Page Styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        color: #333;
        line-height: 1.6;
    }

    /* Main Content Area */
    .admin-table-container {
        margin: 40px auto;
        max-width: 1200px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .admin-table-container h1 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    /* Filter Input Styling */
    .filter-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .filter-container input {
        width: 100%;
        max-width: 400px;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .filter-container input:focus {
        border-color: #1d4e9f;
        outline: none;
        box-shadow: 0 0 5px rgba(29, 78, 159, 0.5);
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #1d4e9f;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    td {
        background-color: #fafafa;
    }

    /* Hover Effect for Rows */
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
            white-space: nowrap;
        }

        .filter-container input {
            width: 90%;
        }
    }


</style>


<div class="container">
    <!-- Sidebar -->


    <!-- Table Admin Area -->
    <div class="admin-table-container">
        <h1>Avantages</h1>

        <!-- Filter Form -->
        <div class="filter-container">
            <input type="text" id="filterInput" placeholder="Search advantages..." onkeyup="filterTable()">
        </div>

        <!-- Advantages Table -->
        <table id="advantagesTable">
            <!-- Table Header (Column Names) -->
            <thead>
            <tr>
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Category</th>
                <th onclick="sortTable(2)">City</th>
                <th onclick="sortTable(3)">Reduction</th>
                <th onclick="sortTable(4)">Reduction Jeunes</th>
                <th onclick="sortTable(5)">Reduction Classique</th>
                <th onclick="sortTable(6)">Reduction Premium</th>
            </tr>
            </thead>

            <!-- Table Body (Dynamic Content) -->
            <tbody>
            <?php if (!empty($advantages)): ?>
                <?php foreach ($advantages as $advantage): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($advantage["name"] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($advantage["category"] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($advantage["city"] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($advantage["reduction"] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($advantage["reduction_jeunes"] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($advantage["reduction_classique"] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($advantage["reduction_premium"] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No advantages available</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>



<script>
    // Function to sort the table by clicking on column headers
    let sortOrder = [true, true, true, true, true, true, true]; // Keep track of sort direction for each column

    function sortTable(columnIndex) {
        const table = document.getElementById("advantagesTable");
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
        const table = document.getElementById('advantagesTable');
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
