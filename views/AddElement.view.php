<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add <?php echo htmlspecialchars($Vis); ?> Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-container div {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Add <?php echo htmlspecialchars($Vis); ?> Form</h1>
    <form action="" method="POST">
        <!-- Hidden field to send $Vis value -->
        <input type="hidden" name="Vis" value="<?php echo htmlspecialchars($Vis); ?>">

        <?php
        // Loop through each label and create input fields dynamically
        foreach ($labels as $label) {
            // Generate input names and IDs
            $inputName = strtolower(str_replace(' ', '_', $label));
            echo '<div>';
            echo '<label for="' . $inputName . '">' . ucfirst(str_replace('_', ' ', $label)) . '</label>';
            echo '<input type="text" id="' . $inputName . '" name="' . $inputName . '" required>';
            echo '</div>';
        }
        ?>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
