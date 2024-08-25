
<?php 

try{
    $db = new PDO("mysql:host=localhost;dbname=users","root","");
    echo"connexion reussie";
}catch(PDOException $e){
    print_r("erreur de connexion a la db". $e->getMessage());
}

?>