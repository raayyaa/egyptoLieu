<?php
require_once('modelLieu.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = explode('/', $_SERVER['REQUEST_URI'])[3];

    if (isset($_POST['id']) && isset($_POST['description']) && isset($_POST['situation'])) {

        $id = $_POST['id'];
        $description = $_POST['description'];
        $situation = $_POST['situation'];

        if ($action == 'update') {
            $datarecup = updateUnLieu($id, $description, $situation);
            echo 'mise a jour avec succes<br>';
        }

        if ($action == 'create') {
            $datarecup = createUnLieu($id, $description, $situation);
            echo 'vous avez bien cree un new<br>';
        }

        // pour les photos
        if (isset($_FILES['photos'])) {

            echo '<br>le nom du fichier est  : ' . $_FILES['photos']['name'];
            echo '<br>Le chemin du fichier temporaire  : ' . $_FILES['photos']['tmp_name'];
            echo '<br>Sa taille est  : ' . $_FILES['photos']['size'];

            $dossier = 'photos/';
            // je creer auparavant un repertoire 'photos' sous mon repertoire actuel ou il y a les fichiers index et recup...

            $fichier = str_replace(' ', '', $id . '.jpg');
            if (move_uploaded_file($_FILES['photos']['tmp_name'], $dossier . $fichier)) {
                echo 'copie effectuée avec succès !';
            } else {
                echo 'Echec de la copie !';
            }
        }
        echo "<a class='button' href='/egyptoLieu'>Retour</a>";
    }
    return;
}

if (isset($_GET['id']) && ($_GET['action'])) {

    $action = $_GET['action'];
    $id = $_GET['id'];
    //echo ($_GET['action']);

    if ($action == 'modifier') { //Recupere lieu avec id mis dans un formulaire
        $datarecup = getUnLieux($id);
        require_once('vueUnLieu.php');
    }

    if ($action == 'delete') {
        require_once('deleteLieu.php');

        $datarecup = deleteUnLieu($id);
    }
}

if (isset($_GET['action'])) {
    //echo ($_GET['action']);

    if ($_GET['action'] == 'create') {
        $datarecup = createUnLieu();

        require_once('createLieu.php');
    }
}
if (!isset($_GET['id'])) {

    $datarecup = getLieux();
    require_once('vueLieu.php');
}
