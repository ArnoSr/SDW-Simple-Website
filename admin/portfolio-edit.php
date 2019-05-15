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



                    if(!isset($_GET['id'])){

                        echo '<div class="alert alert-danger" role="alert">Erreur</div>';

                    }else{

                        $id = $_GET['id'];

                    // Sauvegarder les données
                    if(isset($_POST['title'])) {

                        if (isset($_FILES['image']) && !empty($_FILES['image']["name"])) {

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
                                $req = $bdd->prepare("UPDATE portfolio SET title = :title, image = :image WHERE id = :id");
                                $req->execute(array(
                                    'title' => $_POST['title'],
                                    'image' => $image_name,
                                    'id' => $id,
                                ));

                                // Upload file
                                move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $image_name);

                                echo '<div class="alert alert-success" role="alert">Portfolio sauvegardées</div>';

                            }else {
                                echo '<div class="alert alert-danger" role="alert">Format image incorrect </div>';

                            }

                        }else{

                            $req = $bdd->prepare('UPDATE portfolio SET title = :title WHERE id = :id');
                            $req->execute(array(
                                'title' => $_POST['title'],
                                'id' => $id,
                            ));

                            echo '<div class="alert alert-success" role="alert">Portfolio sauvegardées</div>';

                        }

                    }


                    // Récupérations des données
                    $stmt = $bdd->prepare("SELECT title, image FROM portfolio WHERE id = :id ");
                    $stmt->execute(array(
                            'id' => $id
                    ));
                    $row = $stmt->fetch();



                    ?>

                    <form id="infos-form" method="post" enctype='multipart/form-data' >

                        <div class="row pb-3">
                            <div class="col">
                                <input type="text" name="title" class="form-control" placeholder="Titre" required value="<?php echo $row['title']; ?>" >
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col">
                                <label for="image" >Image : </label><br/>
                                <input type='file' name='image' />
                            </div>
                            <div class="col">
                                <img width="200" src="upload/portfolio/<?php echo $row['image']; ?>" />
                            </div>
                        </div>

                        <div class="row pb-3" >
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