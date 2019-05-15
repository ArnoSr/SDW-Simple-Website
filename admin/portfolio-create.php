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
                    /* Sauvegarder les données */
                    if (isset($_POST['title'])) {

                        $image_name = $_FILES['image']['name'];
                        $target_dir = "upload/portfolio/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);

                        // Select file type
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        // Valid file extensions
                        $extensions_arr = array("jpg", "jpeg", "png", "gif");

                        // Check extension
                        if (in_array($imageFileType, $extensions_arr)) {

                            // Insert record
                            $req = $bdd->prepare("INSERT INTO portfolio(title, image) values(:title , :image)");
                            $req->execute(array(
                                'title' => $_POST['title'],
                                'image' => $image_name,
                            ));

                            // Upload file
                            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $image_name);

                        }

                        echo '<div class="alert alert-success" role="alert">Portfolio sauvegardées</div>';
                        echo '<a href="portfolio.php" class="btn btn-primary">Retour</a>';

                    } else {

                    ?>

                        <form id="infos-form" action="portfolio-create.php" method="post" enctype='multipart/form-data' >
                            <div class="row pb-3">
                                <div class="col">
                                    <input type="text" name="title" class="form-control" placeholder="Titre" required>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col">
                                    <label for="image" >Image : </label><br/>
                                    <input type='file' name='image' required />
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </div>
                        </form>

                    <?php
                    }
                    ?>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php include "include/footer.php"; ?>