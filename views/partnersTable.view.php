<table id="main-table">
                <thead>
                <tr>
                    <th scope="row">Ville</th>
                    <th scope="row">Categorie</th>
                    <th scope="row">Nom</th>
                    <th scope="row">Reduction</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($advantages as $advantage): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($advantage['city']); ?></td>
                        <td><?php echo htmlspecialchars($advantage['category']); ?></td>
                        <td><?php echo htmlspecialchars($advantage['name']); ?></td>
                        <td><?php echo htmlspecialchars($advantage['reduction']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
</table>
