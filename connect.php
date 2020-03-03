<?php
/******************************************CONNEXION SQL avec MYSQLi ***********************************************/

function dbconnect() {

    require_once ( 'config.php' );

    $con = @mysqli_connect( $serveur, $user, $pwd, $dbname ) or die( 'erreur de connection' );

    mysqli_set_charset( $con, 'utf8' );
    return $con;

}

function dbclose($conrecu){
    mysqli_close( $conrecu );
}
/******************************************CONNEXION SQL avec MYSQLi ***********************************************/

?>
