<?php require "template/header.php"; ?>


<main class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Référence</th>
            <th>Description</th>
            <th>Prix TTC</th>
            <th>Prix HT</th>
            <th>Langue</th>
            <th>Quantité</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody id="products">
        </tbody>

    </table>

</main>

<script src="js/fetchproducts.js"></script>
<?php require 'template/footer.php'; ?>
