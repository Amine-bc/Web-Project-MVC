<style>
    /* Global Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f8;
        margin: 0;
        padding: 0;
        color: #333333;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .donation-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 12px;
        margin-bottom: 24px;
    }

    .donation-header h1 {
        font-size: 1.8rem;
        color: #4CAF50;
        margin: 0;
    }

    .donation-header .date {
        font-size: 0.9rem;
        color: #6b7280;
    }

    .image-container {
        text-align: center;
        margin-bottom: 24px;
    }

    .image-container img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .donation-details {
        margin-bottom: 24px;
    }

    .donation-details h2 {
        font-size: 1.4rem;
        color: #1f2937;
        margin-bottom: 16px;
        border-left: 4px solid #4CAF50;
        padding-left: 8px;
    }

    .donation-details p {
        font-size: 1rem;
        color: #4b5563;
        margin: 8px 0;
        line-height: 1.6;
    }

    .donation-details p span {
        font-weight: bold;
        color: #111827;
    }

    .cta-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 30px;
        justify-content: flex-start;
    }

    .cta-buttons button {
        background-color: #2563eb;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        padding: 12px 18px;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .cta-buttons button:hover {
        background-color: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .cta-buttons button:focus {
        outline: none;
        box-shadow: 0 0 6px #2563eb;
    }

    .cta-buttons button.danger {
        background-color: #ef4444;
    }

    .cta-buttons button.danger:hover {
        background-color: #dc2626;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 16px;
        }

        .donation-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .donation-header h1 {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .donation-header .date {
            font-size: 0.85rem;
        }

        .cta-buttons {
            flex-direction: column;
            gap: 8px;
        }

        .cta-buttons button {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .donation-header h1 {
            font-size: 1.4rem;
        }

        .donation-details h2 {
            font-size: 1.2rem;
        }

        .donation-details p {
            font-size: 0.9rem;
        }
    }
</style>


<div class="container">
    <div class="donation-header">
        <h1><?= htmlspecialchars($don['recipient_need']) ?></h1>
        <div class="date"><?= htmlspecialchars(date("F j, Y", strtotime($don['creation_date']))) ?></div>
    </div>

    <div class="image-container">
        <img src="/images/donation.jpeg" alt="Donation Image">
    </div>

    <div class="donation-details">

        <h2>📋 Details</h2>
        <p><?= htmlspecialchars($don['assistance_details']) ?></p>
        <p><span>💰 Required Amount:</span> $<?= htmlspecialchars(number_format($don['required_amount'], 2)) ?></p>
        <p><span>🏦 CIB Code:</span> <?= htmlspecialchars($don['cib_code']) ?></p>
        <p><span>🏧 CCP Code:</span> <?= htmlspecialchars($don['ccp_code']) ?></p>
        <p><span>📧 Contact Email:</span> <?= htmlspecialchars($don['contact_email']) ?></p>
        <p><span>📞 Contact Phone:</span> <?= htmlspecialchars($don['contact_phone']) ?></p>
        <p><span>📅 Created On:</span> <?= htmlspecialchars($don['creation_date']) ?></p>
        <p><span>🕒 Last Updated:</span> <?= htmlspecialchars($don['last_update']) ?></p>

    </div>


</div>
