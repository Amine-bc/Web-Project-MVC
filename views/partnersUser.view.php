<style>
    .container{
        display: flex;
        align-content: center;
        justify-content: center;
        margin: 10px 50px ;
    }
    .container-button{
        display: flex;
        align-content: center;
        justify-content: center;
        margin: 10px 0 ;
    }
    /* General table styling */
    #main-table {
position: relative;
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    #main-table thead {
        background-color: #f4f4f4;
        text-align: left;
    }

    #main-table th,
    #main-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }

    #main-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    #main-table tr:hover {
        background-color: #f1f1f1;
    }

    /* Button styling */
    .star-button {
        text-decoration: none;
        background-color: #ffc107; /* Yellow color */
        color: #fff; /* White text */
        border: none;
        padding: 8px 12px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: background-color 0.3s ease;
    }

    .star-button:hover {
        background-color: #e0a800;
    }

    /* Responsive table */
    @media screen and (max-width: 600px) {
        #main-table thead {
            display: none;
        }

        #main-table tr {
            display: block;
            margin-bottom: 15px;
        }

        #main-table td {
            display: block;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        #main-table td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: capitalize;
        }


    }


</style>
<!--<div class="container-button">-->
<!--    <a href="/partnersUserStarred" class="star-button">-->
<!--        &#9734; Starred-->
<!--    </a>-->
<!--</div>-->
<!---->
<div class="container">
<table id="main-table">
    <thead>
    <tr>
        <th scope="col">Ville</th>
        <th scope="col">Categorie</th>
        <th scope="col">Nom</th>
        <th scope="col">Reduction</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($advantages as $advantage): ?>
        <tr>
            <td><?php echo htmlspecialchars($advantage['city']); ?></td>
            <td><?php echo htmlspecialchars($advantage['category']); ?></td>
            <td><?php echo htmlspecialchars($advantage['name']); ?></td>
            <td><?php echo htmlspecialchars($advantage['reduction']); ?></td>
            <td>
                <form action="/partnersUser" method="POST">
                    <!-- Hidden input for partner ID -->
                    <input type="hidden" name="partner_id" value="<?php echo htmlspecialchars($advantage['partner_id']); ?>">

                    <?php if ($advantage['starred'] == 0): ?>
                        <!-- Button to star the partner -->
                        <button type="submit" class="star-button">&#9734;</button>

                    <?php else: ?>
                        <!-- Button to unstar the partner -->
                        <button type="submit" class="star-button">&#9733;</button>

                    <?php endif; ?>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

</div>
