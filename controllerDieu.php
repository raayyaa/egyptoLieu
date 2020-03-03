<?php
require_once('modelDieu.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = explode('/', $_SERVER['REQUEST_URI'])[3];

    if (isset($_POST['id']) && isset($_POST['Représentation']) && isset($_POST['Fonction'])) {

        $id = $_POST['id'];
        $representation = $_POST['Représentation'];
        $fonction = $_POST['Fonction'];

        if ($action == 'update') {
            $datarecup = updateUnDieu($id, $representation, $fonction);
            echo 'mise a jour avec succes du dieu<br>';
        }

        if ($action == 'create') {
            $datarecup = createUnDieu($id, $representation, $fonction);
            echo 'vous avez bien cree un new champ Dieu<br>';
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
        echo "<a class='button' href='/egyptoLieu/controllerDieu'>Retour</a>";
    }
    return;
}

if (isset($_GET['id']) && ($_GET['action'])) {

    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'modifier') { //Recupere dieu avec id mis dans un formulaire
        $datarecup = getUnDieux($id);
        require_once('vueUnDieu.php');
    }

    if ($action == 'delete') {
        require_once('deleteDieu.php');
        $datarecup = deleteUnDieu($id);
    }
}

// affiche le formulaire d'ajout pr dieu
if (isset($_GET['action'])) {

    if ($_GET['action'] == 'create') {
        $datarecup = createUnDieu();
        require_once('createDieu.php');
    }
}

// affiche tout les Dieux
if (!isset($_GET['id'])) {

    $datarecup = getDieux();
    require_once('vueDieu.php');
}
