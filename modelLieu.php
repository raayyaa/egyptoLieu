<?php
require_once ( 'connect.php' );

function getLieux() {

    $con = dbconnect();
    $query = 'SELECT * FROM lieu';
    $liste = mysqli_query ( $con, $query );
    $data = mysqli_fetch_all( $liste, MYSQLI_BOTH ); // ou MYSQLI_ASSOC ou MYSQLI_NUM
    dbclose( $con );
    //var_dump( $data );
    return $data;
}

function getUnLieux( $id ) {
    $con = dbconnect();
    $query = "SELECT distinct * FROM lieu WHERE NomLieu='$id'";
    //echo( $query );
    //die();
    $liste = mysqli_query ( $con, $query );
    $data = mysqli_fetch_all( $liste, MYSQLI_BOTH ); // ou MYSQLI_ASSOC ou MYSQLI_NUM
    dbclose( $con );
    //var_dump( $data );
    return $data;
}

function updateUnLieu( $id,$description,$situation) {

    $con = dbconnect();
    $query = "UPDATE lieu SET description='$description', situation='$situation' where Nomlieu = '$id'  ";
    echo( $query );
    $liste = mysqli_query ( $con, $query );
  
}

function deleteUnLieu( $id ) {

    $con = dbconnect();
    $query = "DELETE FROM lieu where NomLieu='$id' " ;
    $liste = mysqli_query ( $con, $query );
    //$data = mysqli_fetch_all( $liste, MYSQLI_BOTH ); // ou MYSQLI_ASSOC ou MYSQLI_NUM
    dbclose( $con );
    //var_dump( $data );
    return $liste;
}

function createUnLieu($id,$description,$situation) {
    $con = dbconnect();
    $query = "INSERT INTO lieu (`NomLieu`, `description`, `situation`) VALUES ('$id','$description','$situation')";
   
    $liste = mysqli_query ( $con, $query );
    dbclose( $con );
    return $liste;
}
