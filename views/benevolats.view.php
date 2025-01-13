
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
    .action-button {
        background-color: var(--primary-color);
        color: #ffffff;
        border: none;
        border-radius: 4px;
        padding: 10px 15px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.2s ease;
        text-align: center;
    }

    .action-button:hover {
        background-color: var(--primary-hover);
    }

    .action-button:active {
        transform: scale(0.98);
    }

    .action-button:focus {
        outline: none;
        box-shadow: 0 0 4px var(--primary-color);
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
        margin-top: 1.5rem;
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

    :root {
        --primary-color: #2563eb;
        --primary-hover: #1d4ed8;
        --background: #f8fafc;
        --card-background: #ffffff;
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --border-color: #e2e8f0;
        --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --radius: 0.5rem;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--background);
        color: var(--text-primary);
        line-height: 1.5;
    }

    .container {
        max-width: 1200px;
        margin: 5rem auto;
        background-color: var(--card-background);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
    }

    .header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border-color);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    h1 {
        font-size: 1.875rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-right: 4rem;
    }

    .subtitle {
        color: var(--text-secondary);
        font-size: 0.875rem;
    }

    .heart-icon {
        width: 2rem;
        height: 2rem;
        stroke: #ef4444;
        margin-right: 2rem;
    }

    .search-container {
        position: relative;
    }

    .search-input {
        width: 300px;
        padding: 0.5rem 1rem 0.5rem 2.5rem;
        border: 1px solid var(--border-color);
        border-radius: var(--radius);
        font-size: 0.875rem;
        outline: none;
        transition: border-color 0.2s;
    }

    .search-input:focus {
        border-color: var(--primary-color);
    }

    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        width: 1rem;
        height: 1rem;
        stroke: var(--text-secondary);
    }

    .table-container {
        overflow-x: auto;
        padding: 1rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 0.75rem 1rem;
        font-weight: 600;
        font-size: 0.875rem;
        color: var(--text-secondary);
        border-bottom: 1px solid var(--border-color);
    }

    td {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        font-size: 0.875rem;
    }

    tr:last-child td {
        border-bottom: none;
    }

    .id-recipient {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .donation-id {
        font-weight: 600;
    }

    .recipient {
        color: var(--text-secondary);
    }

    .amount {
        font-weight: 600;
        color: var(--primary-color);
    }

    .codes {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .details {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .contact, .dates {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .email, .phone, .date {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .icon {
        width: 1rem;
        height: 1rem;
        stroke: var(--text-secondary);
    }

    footer{
        position: absolute;
        bottom: 0;
    }

    .no-data {
        text-align: center;
        color: var(--text-secondary);
        padding: 2rem !important;
    }

    tr:hover {
        background-color: #f8fafc;
    }

    @media (max-width: 1024px) {
        body {
            padding: 1rem;
        }

        .header-content {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .search-container {
            width: 100%;
            margin-left: 20px;
        }

        .search-input {
            width: 100%;
            margin-left: 20px;

        }
    }

    @media (max-width: 768px) {
        .table-container {
            padding: 0.5rem;
        }

        td, th {
            padding: 0.75rem;
        }
    }
</style>

<style>
    /* Additional styling for image */
    .card img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        object-fit: cover;
        margin-bottom: 15px;
    }
</style>

<div class="container">
    <header class="header">
        <div class="header-content">
            <h1>
                <svg class="heart-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                Volunteering List
            </h1>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search volunteering..." class="search-input">
                <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
    </header>

    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Event</th>
                <th>Description</th>
                <th>Participation Date</th>
                <th>Image</th>
                <th>More Details</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($volunteering)): ?>
                <?php foreach ($volunteering as $volunteer): ?>
                    <tr>
                        <td>
                            <div class="event-name">
                                <div class="event"><?= htmlspecialchars($volunteer['event_name']) ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="description">
                                <?= htmlspecialchars($volunteer['description']) ?>
                            </div>
                        </td>
                        <td>
                            <div class="participation-date">
                                <?= htmlspecialchars($volunteer['participation_date']) ?>
                            </div>
                        </td>
                        <td>
                            <img src="/images/benevolat.jpeg" alt="Event Image" class="event-image" />
                        </td>
                        <td>
                            <form action="/benevolat" method="POST">
                                <input type="hidden" name="volunteer_id" value="<?= htmlspecialchars($volunteer['volunteer_id']) ?>">
                                <button type="submit" class="action-button">View Details</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-data">No volunteering events found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchText) ? '' : 'none';
        });
    });
</script>
