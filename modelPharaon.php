<?php
require_once ( 'connect.php' );

function getPharaon() {

    $con = dbconnect();
    $query = 'SELECT * FROM pharaon';
    $liste = mysqli_query ( $con, $query );
    $data = mysqli_fetch_all( $liste, MYSQLI_BOTH ); 
    dbclose( $con );
    return $data;
}

function getUnPharaon( $id ) {
    $con = dbconnect();
    $query = "SELECT distinct * FROM pharaon WHERE NomPh='$id'";
    $liste = mysqli_query ( $con, $query );
    $data = mysqli_fetch_all( $liste, MYSQLI_BOTH ); 
    dbclose( $con );
    return $data;
}

function updateUnPharaon( $id,$commentPh) {

    $con = dbconnect();
    $query = "UPDATE pharaon SET commentPh ='$commentPh' where NomPh = '$id'  ";
    $liste = mysqli_query ( $con, $query );
}

function deleteUnPharaon( $id ) {

    $con = dbconnect();
    $query = "DELETE FROM pharaon where NomPh ='$id' " ;
    $liste = mysqli_query ( $con, $query );
    dbclose( $con );
    return $liste;
}

function createUnPharaon ($id,$commentPh) {
    $con = dbconnect();
    $query = "INSERT INTO pharaon (`NomPh`, `commentPh`) VALUES ('$id','$commentPh')";
    $liste = mysqli_query ( $con, $query );
    dbclose( $con );
    return $liste;
}
