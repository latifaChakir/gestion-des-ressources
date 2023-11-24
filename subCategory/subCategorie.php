<!DOCTYPE html>
<html lang="en">

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

    <?php
    include("../nav.php");
    ?>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>SubCategories</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add subCategory</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th> Name</th>
                            <th>Category Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('connect.php');

                        $sqlSelect = "SELECT sub_categorie_id, name_sub_categorie, name_categorie FROM subcategory JOIN categorie ON categorie.categorie_id = subcategory.categorie_id";
                        $result = mysqli_query($conn, $sqlSelect);

                        if (!$result) {
                            die("Error: " . $sqlSelect . "<br>" . mysqli_error($conn));
                        }

                        foreach ($result as $data) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $data['sub_categorie_id']; ?>
                                </td>
                                <td>
                                    <?php echo $data['name_sub_categorie']; ?>
                                </td>
                                <td>
                                    <?php echo $data['name_categorie']; ?>
                                </td>

                                <td>
                                    <a href="view.php?id=<?php echo $data['sub_categorie_id']; ?>" class="btn btn-info">Read
                                        More</a>
                                    <a class="btn btn-warning"
                                        href="edit.php?id=<?php echo $data['sub_categorie_id']; ?>">Edit</a>
                                    <a href="delete.php?id=<?php echo $data['sub_categorie_id']; ?>"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }

                        $conn->close();
                        ?>


                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- create Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="employeeForm" method="post" action="add.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>subCategory name</label>
                            <input type="text" class="form-control" name="name_sub_categorie" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <select class="form-control" name="name_categorie" required>
                                <?php
                                include('connect.php');

                                $categoryQuery = "SELECT categorie_id, name_categorie FROM categorie";
                                $categoryResult = $conn->query($categoryQuery);

                                if (!$categoryResult) {
                                    die("Error: " . $categoryQuery . "<br>" . $conn->error);
                                }

                                while ($row = $categoryResult->fetch_assoc()) {
                                    // Récupérer la valeur postée s'il y en a une
                                    $selected = (isset($_POST['name_categorie']) && $_POST['name_categorie'] == $row['name_categorie']) ? 'selected' : '';

                                    echo "<option value='{$row['name_categorie']}' $selected>{$row['name_categorie']}</option>";
                                }

                                $conn->close();
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>