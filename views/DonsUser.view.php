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
    .info-box {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }
    .info-box li {
        margin-left: 3rem;
        font-size: 18px;
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
    .centered-button h1 {
        margin: 0; /* Remove default margin from <h1> */
        font-size: 2rem; /* Adjust the font size */
        text-align: center;
    }

    .centered-button a {
        display: inline-block;
        padding: 15px 30px;
        background-color: #007BFF; /* Primary blue color */
        color: white; /* White text */
        text-decoration: none; /* Remove underline */
        font-weight: bold; /* Make the text bold */
        font-size: 1.2rem; /* Adjust font size for the link */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transition: background-color 0.3s, transform 0.2s; /* Add smooth hover effect */
    }

    .centered-button a:hover {
        background-color: #0056b3; /* Darker blue on hover */
        transform: translateY(-2px); /* Slightly lift the button */
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
    .centered-button {
        text-align: center;
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
    .centering {
        margin-top: 4rem;
        display: flex; /* Enables flexbox */
        justify-content: center; /* Centers content horizontally */
        align-items: center; /* Centers content vertically */
    }
</style>



<div class="container">
    <header class="header">
        <div class="header-content">
            <h1>
                <svg class="heart-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>

                Donations List
            </h1>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search donations..." class="search-input">
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
                <th>ID & Recipient</th>
                <th>Amount</th>
                <th>Codes</th>
                <th>Details</th>
                <th>Contact</th>
                <th>more details</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($dons)): ?>
                <?php foreach ($dons as $don): ?>
                    <tr>
                        <td>
                            <div class="id-recipient">
                                <div class="donation-id"><?= htmlspecialchars($don['donation_id']) ?></div>
                                <div class="recipient"><?= htmlspecialchars($don['recipient_need']) ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="amount">
                                $<?= htmlspecialchars(number_format($don['required_amount'], 2)) ?>
                            </div>
                        </td>
                        <td>
                            <div class="codes">
                                <div>CIB: <?= htmlspecialchars($don['cib_code']) ?></div>
                                <div>CCP: <?= htmlspecialchars($don['ccp_code']) ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="details" title="<?= htmlspecialchars($don['assistance_details']) ?>">
                                <?= htmlspecialchars($don['assistance_details']) ?>
                            </div>
                        </td>
                        <td>
                            <div class="contact">
                                <div class="email">
                                    <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <?= htmlspecialchars($don['contact_email']) ?>
                                </div>
                                <div class="phone">
                                    <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    <?= htmlspecialchars($don['contact_phone']) ?>
                                </div>
                            </div>
                        </td>
                        <td>

                            <form action="/donsUser" method="POST">
                                <input type="hidden" name="donation_id" value="<?= htmlspecialchars($don['donation_id']) ?>">
                                <button type="submit" class="action-button">View Details</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="no-data">No donations found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="info-box">
    <h3>Historique Dons </h3>
    <?php if (!empty($donations)): ?>
        <ul>
            <?php foreach ($donations as $donation): ?>
                <li>
                    <strong>Montant :</strong> <?php echo htmlspecialchars($donation['donated_amount']); ?> DA<br>
                    <strong>Date :</strong> <?php echo htmlspecialchars($donation['donation_date']); ?><br>
                    <strong>Organisme</strong> <?php echo htmlspecialchars($donation['recipient_organization']); ?><br>
                    <strong>recipient_need</strong> <?php echo htmlspecialchars($donation['recipient_need']); ?><br>

                    <!--
<strong>Reçu :</strong> <a href="--><?php //echo "docs/receiptDonation/".htmlspecialchars($donation['payment_receipt']); ?><!--" target="_blank">Voir</a><br>-->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun don trouvé.</p>
    <?php endif; ?>
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