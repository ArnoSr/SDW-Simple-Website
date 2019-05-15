<?php include "include/header.php"; ?>


    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Mes Infos</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-12 mb-4">

                    <?php
                    /* Sauvegarder les données */
                    if(isset($_POST['firstname'])) {

                        $req = $bdd->prepare('UPDATE infos SET firstname = :firstname, lastname = :lastname WHERE id = 1');
                        $req->execute(array(
                            'firstname' => $_POST['firstname'],
                            'lastname' => $_POST['lastname']
                        ));

                        echo '<div class="alert alert-success" role="alert">Infos sauvegardées</div>';
                    }


                    /* Récupérations des données */
                    $stmt = $bdd->prepare("SELECT firstname, lastname FROM infos WHERE id = 1");
                    $stmt->execute();
                    $row = $stmt->fetch();
                    
                    ?>

                    <form id="infos-form" action="infos.php" method="post" >
                        <div class="row pb-3">
                            <div class="col">
                                <input type="text" name="firstname" class="form-control" placeholder="Nom" required value="<?php echo $row['firstname']; ?>" >
                            </div>
                            <div class="col">
                                <input type="text" name="lastname" class="form-control" placeholder="Prénom" required value="<?php echo $row['lastname']; ?>" >
                            </div>
                        </div>

                        <div class="row pb-3" >
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php include "include/footer.php"; ?>