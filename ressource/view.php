<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>

    <form id="employeeForm" method="post">
        <div class="modal-header">
            <h4 class="modal-title">Edit Subcategory</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <?php
            if (isset($_GET['id'])) {
                include("connect.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM ressources WHERE ressource_id=$id";
                $result = mysqli_query($conn, $sql);
                $ressource = mysqli_fetch_array($result);
            }
            ?>

            <div class="form-group">
                <label>Subcategory name</label>
                <input type="text" class="form-control" name="name_sub_categorie" required
                    value="<?php echo $ressource['name_ressource']; ?>">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="name_categorie" required>
                    <?php
                    $categoryQuery = "SELECT categorie_id, name_categorie FROM categorie";
                    $categoryResult = $conn->query($categoryQuery);

                    if (!$categoryResult) {
                        die("Error: " . $categoryQuery . "<br>" . $conn->error);
                    }

                    while ($row = $categoryResult->fetch_assoc()) {
                        $selected = ($ressource['categorie_id'] == $row['categorie_id']) ? 'selected' : '';
                        echo "<option value='{$row['name_categorie']}' $selected>{$row['name_categorie']}</option>";
                    }

                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>subCategory</label>
                <select class="form-control" name="name_sub_categorie" required>
                    <?php
                    $subcategoryQuery = "SELECT sub_categorie_id, name_sub_categorie FROM subcategory";
                    $subcategoryResult = $conn->query($subcategoryQuery);

                    if (!$subcategoryResult) {
                        die("Error: " . $subcategoryQuery . "<br>" . $conn->error);
                    }

                    while ($row = $subcategoryResult->fetch_assoc()) {
                        $selected = ($ressource['sub_categorie_id'] == $row['sub_categorie_id']) ? 'selected' : '';
                        echo "<option value='{$row['name_sub_categorie']}' $selected>{$row['name_sub_categorie']}</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <a href="index.php"><input type="button" class="btn btn-default" data-dismiss="modal"
                    value="Cancel"></a>
            <input type="submit" class="btn btn-success" value="Save Changes" disabled>
        </div>
    </form>
</body>

</html>