<?php include "include/header.php"; ?>


    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Mon portfolio</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-12 mb-4">

                    <?php
                    /* Récupérations des données */
                    $stmt = $bdd->prepare("SELECT id, title FROM portfolio ");
                    $stmt->execute();
                    ?>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = $stmt->fetch()){

                            echo '
                                <tr>
                                    <th scope="row">' . $row['id'] . '</th>
                                    <td>' . $row['title'] . '</td>
                                    <td>
                                        <a href="portfolio-edit.php?id=' . $row['id'] . '" ><i class="fas fa-edit"></i></a>
                                        <a href="portfolio-delete.php?id=' . $row['id'] . '" ><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                        </tbody>
                    </table>

                    <a href="portfolio-create.php" ><i class="fas fa-plus"></i> Ajouter</a>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php include "include/footer.php"; ?>