<?php

Flight::route("GET /register", function(){
    Flight::render("templates/register.tpl",array("titre"=>"Inscription") );
});

Flight::route("POST /register", function(){

    $error = array();
    $db = Flight::get('db');

    if(empty($_POST['nom'])){
        $error["nom"] = 'Vous devez donner un nom.';
    }

    if(empty($_POST['email'])){
        $error["email"] = "Vous devez donner un email";
    }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === TRUE){
        $error['email'] = "Merci d'écrire une adresse email valide";
        //cf filter_var
    }else {
        $st = $db->prepare("select email from Utilisateur where email = ?");
        $st->execute(array($_POST['email']));
        if($st->rowCount()!=0){
            $error['email']="Adresse email déjà utilisé";
        }
    }

    if(empty($_POST['mdp'])){
        $error["mdp"] = "Veuillez entrer un mot de passe.";
    }else if(strlen($_POST['mdp']) < 8 && !$error){
        $error['mdp'] = "Le mot de passe doit faire 8 caractères minimum";
    }


    if(!empty($error)){ //erreurs
        Flight::view()->assign("error",$error);
        Flight::view()->assign($_POST);
        Flight::view()->display('register.tpl');
    } else {

        $req = $db -> prepare('INSERT INTO utilisateur VALUES(:Nom, :Email, :Motdepasse)');
        $req -> execute(array(":Nom" => $_REQUEST['nom'], ":Email" => $_REQUEST['email'], ":Motdepasse" => $_REQUEST['mdp']));

        Flight::redirect("/success");  
    }

});

Flight::route("POST /login", function(){
    $error = false;
    if (!isset($_POST['email']) || $_POST['email'] == ""){
        $error["email"] = "Merci de remplir ce champs";
    } 
    if (!isset($_POST['mdp']) || $_POST['mdp'] == ""){
        $error["mdp"] = "Merci de remplir ce champs";
    }
    if (!$error) {
        $db = Flight::get("db");
        $req = $db->prepare("SELECT * FROM `tp4_utilisateur` WHERE `Email` = ?");
        $req->execute(array($_POST['email']));
        if ($data = $req->fetch()) {
            print_r($data);
            if (password_verify($_POST['mdp'], $data['Motdepasse'])) {
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $data['Nom'];
            } else {
                $error['error'] = "Adresse Email ou mot de passe invalide.";
            }
        } else {
            $error['error'] = "Adresse email ou mot de passe invalide.";
        } 
    }
    if ($error) {
        Flight::render("templates/login.tpl", array("post" => $_POST, "error" => $error));
    } else {
        $_SESSION['last_page'] = "POST /login";
        Flight::redirect("/");
    }
});

Flight::route("/profil", function(){
    if (!$_SESSION['logged']) {
        Flight::redirect("/login");
    } else {
        $req = Flight::get('db')->prepare("SELECT `Nom`, `Email` from tp4_utilisateur WHERE `Nom` = ?");
        $req->execute(array($_SESSION['username']));
        $user = $req->fetch();
        Flight::render("templates/profil.tpl", array("username" => $user['Nom'], "email" => $user['Email']));
        $_SESSION['last_page'] = "/profil";
    }
});

Flight::route("/success", function(){
    //if ($_SESSION['last_page'] != "POST /register") {
     //   Flight::redirect("/");
      //  return true;
    //}
    
    Flight::render("templates/success.tpl", array());
});
