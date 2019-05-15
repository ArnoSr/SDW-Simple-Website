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
                    if (!isset($_GET['id'])) {

                        echo '<div class="alert alert-danger" role="alert">Erreur</div>';

                    } else {

                        /* Supprimer les données */
                        if (isset($_POST['delete'])) {

                            $id = $_GET['id'];

                            $req = $bdd->prepare("DELETE FROM portfolio WHERE id = :id");
                            $req->execute(array(
                                'id' => $id,
                            ));

                            echo '<div class="alert alert-danger" role="alert">Element supprimé</div>';
                            echo '<a href="portfolio.php" class="btn btn-primary">Retour</a>';

                        } else {

                            ?>

                            <form id="infos-form" method="post">

                                <div class="row pb-3">
                                    <div class="col">
                                        <p>Etes-vous sûr de vouloir le supprimer ?</p>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col">
                                        <a href="portfolio.php" class="btn btn-primary ">Retour</a>

                                        <button type="submit" class="btn btn-danger " name="delete">Delete</button>
                                    </div>
                                </div>
                            </form>

                            <?php
                        }
                    }
                    ?>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php include "include/footer.php"; ?>