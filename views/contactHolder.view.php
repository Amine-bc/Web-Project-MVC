
    <title>Form Response</title>
    <style>

        .response {
            padding: 20px;
            border: 2px solid #4CAF50;
            background-color: #f9f9f9;
            color: #333;
        }
    </style>

<div class="response">
    <h1>Thank You!</h1>
    <p>Your form has been<strong> Submitted</strong>.</p>
    <p>Submitted by: <strong><?php echo htmlspecialchars($name); ?></strong></p>
    <p><a>Go back to the form</a></p>
</div>