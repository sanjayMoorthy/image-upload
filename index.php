<?php
require "connection.php";

$conection = new Database();
if(isset($_POST['username']) && isset($_FILES['photo'])){
    $filename = $_POST['username'];
    $photo = $_FILES['photo']['name'];
//    print_r($photo) ;
    
    $path = 'images/'.$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$path);
    
    $app['db'] = (new Database())->db;
    $insert = $app['db']->query("INSERT INTO files(name,image)VALUES('$filename','$path')");

}
 $statement = $conection->db->query("SELECT * FROM files");
 $fetchData = $statement->fetchAll(PDO::FETCH_OBJ);

require 'index.html';
