<?php
require_once ( 'connect.php' );

function getDieux() {

    $con = dbconnect();
    $query = 'SELECT * FROM dieu';
    $liste = mysqli_query ( $con, $query );
    $data = mysqli_fetch_all( $liste, MYSQLI_BOTH ); // ou MYSQLI_ASSOC ou MYSQLI_NUM
    dbclose( $con );
    return $data;
}

function getUnDieux( $id ) {
    $con = dbconnect();
    $query = "SELECT distinct * FROM dieu WHERE NomDieu='$id'";
    $liste = mysqli_query ( $con, $query );
    $data = mysqli_fetch_all( $liste, MYSQLI_BOTH ); // ou MYSQLI_ASSOC ou MYSQLI_NUM
    dbclose( $con );
    return $data;
}

function updateUnDieu( $id,$representation,$fonction) {

    $con = dbconnect();
    $query = "UPDATE dieu SET Représentation='$representation', Fonction='$fonction' where NomDieu = '$id'  ";
    echo( $query );
    $liste = mysqli_query ( $con, $query );
  
}

function deleteUnDieu( $id ) {

    $con = dbconnect();
    $query = "DELETE FROM dieu where NomDieu='$id' " ;
    $liste = mysqli_query ( $con, $query );
    dbclose( $con );
    return $liste;
}

function createUnDieu($id,$representation,$fonction) {
    $con = dbconnect();
    $query = "INSERT INTO dieu (`NomDieu`, `Représentation`, `Fonction`) VALUES ('$id','$representation','$fonction')";
    $liste = mysqli_query ( $con, $query );
    dbclose( $con );
    return $liste;
}
