<?php
session_start();
//session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css"/>
    <link rel = "stylesheet" href = "styleindex.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class = "container"> 
  <a class="navbar-brand" href="a.php"><img src ="logo_esih.png" width = "100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class = "col-auto">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="a.php">Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="formulaire_test.php">Ajouter des nouvelles personnes</a>
      </li>
     
    </ul>
    <button type="button" class="btn btn-danger">Deconnexion</button>
  </div>
  </div>
  </div>
</nav>

<div class="card mb-3">
  <img class="card-img-top" src="SMS.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">Bienvenue !</h4>
    <p class="card-text">Citation de la journée: "Personne n'est trop vieux pour se fixer un nouvel objectif ou réaliser de nouveaux reves." </p>
    <p class="card-text"><small class="text-muted">Last updated 1 min ago</small></p>
  </div>
</div>
    
    <form class = "container" action="" method="post">
        <fieldset>
            <legend>Formulaire d'enregistrement</legend>
        <div class="row">
        <div class="col-md-6 mb-3">
        <label for="code">Code</label>
        <input type="text" class="form-control" name="code">
        </div>

        <div class="col-md-6 mb-3">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom">
        </div>

        <div class="col-md-6 mb-3">
        <label for="prenom" >Prénom</label>
        <input type="text" class="form-control" name="prenom">
        </div>

        <div class="col-md-6 mb-3">
        <label for = "nationalite">Nationalité</label>
        <input type="text" class="form-control" name = "nationalite">
        </div>

        <div class="col-md-6 mb-3">
        <label for="sexe">Sexe</label>
        <input type="text" class="form-control" name = "sexe">
        </div>

        <div class="col-md-6 mb-3">
        <label for="ddn">Date de naissance</label>
        <input type="text" class="form-control" name = "ddn">
        </div>

        <div class="col-md-6 mb-3">
        <label for="tel">Téléphone</label>
        <input type="text" class="form-control" name = "tel">
        </div>

        <div class="col-md-6 mb-3">
        <label for="email">Email</label>
        <input type="text" class="form-control" name = "email">
        </div>

        <div class="col-md-6 mb-3">
        <label for="prenom" >Type Personne</label>
        <select class="form-control"  id="" name="Type">
                <option value=""></option>
                <option value="Etudiant">Etudiant</option>
                <option value="Professeur">Professeur</option>
                <option value="Administration">Personne Administrative</option>
        </select>
        </div>
        </div>
        

        <button class="btn btn-primary" type="submit" name="envoyer">Envoyer</button></fieldset>
        
    </form>
    <br><br>
    
   
<br><br>
                      <legend>Liste des personnes enregistrées</legend>
    <table class="table">
            <thead class = "th">
            <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nationalite</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date Naissance</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Type</th>
            </tr>
            </thead>

            <tbody class = "tb">
            
                <?php
               

                     require("ClassTest.php");
                    if(isset($_POST['envoyer'])){
                       
                        $code = $_POST['code'];
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $nationalite = $_POST['nationalite'];
                        $sexe = $_POST['sexe'];
                        $datedenais = $_POST['ddn'];
                        $tel = $_POST ['tel'];
                        $email = $_POST ['email'];  
                        $Type= $_POST['Type'];

                        $et = new Etudiant($code,$nom,$prenom,$nationalite, $sexe, $datedenais,$tel,$email,$Type);
                        $t_et = [
                        'code'=>$et->getCode(),
                        'nom'=>$et->getNom(),
                        'prenom'=>$et->getPrenom(),
                        'nationalite'=>$et->getNationalite(),
                        'sexe'=>$et->getSexe(),
                        'ddn'=>$et->getDatedenais(),
                        'tel'=>$et->getTel(),
                        'tel'=>$et->getTel(),
                        'email'=>$et->getEmail(),
                        'Type'=>$et->getType()
                        ];
                        
                        $_SESSION['etudiant'][]=$t_et;
                        
                        $m= $_SESSION['etudiant'][0]['code']."".$_SESSION['etudiant'][0]['nom']."".$_SESSION['etudiant'][0]['prenom']."".$_SESSION['etudiant'][0]['nationalite']."".$_SESSION['etudiant'][0]['sexe']."".$_SESSION['etudiant'][0]['ddn']."".$_SESSION['etudiant'][0]['tel']."".$_SESSION['etudiant'][0]['email']."".$_SESSION['etudiant'][0]['Type'];
                     
                       echo("<pre>");
                        print_r($m);
                        
                    echo("</pre>");
                    

                }
            
                foreach($_SESSION['etudiant'] as $t){
                    echo("
                        <tr>
                            <td>$t[code]</td>
                            
                            <td>$t[nom]</td>
                            
                            <td>$t[prenom]</td>
                            
                            <td>$t[nationalite]</td>
                            
                            <td>$t[sexe]</td>
                            
                            <td>$t[ddn]</td>
                           
                            <td>$t[tel]</td>
                            
                            <td>$t[email]</td>
                            <td>$t[Type]</td>
                        </tr>
                    
                    ");
                }

                //echo("<pre>");
                    //print_r($_SESSION['etudiant'][0]['prenom']);
                    //echo("</pre>");

                    

                
                 ?> 
            </tbody>
    </table>

    <br><br>
  
    <legend>Liste des personnes recherchées par index de position</legend>
    <form action="" method="GET">
    <div class="col-md-3 mb-2">
         <label for="recherche"> Type</label>
        <input class = "form-control" type="text" name="re" id="recherche">
        <input class="btn btn-success" type="submit" name="recherche" value = "Rechercher"> 
    </div>
       <!--  < <label for="" id="se"> Type</label>
        <select  id="se" name="type">
                <option value=""></option>
                <option value="Etudiant">Etudiant</option>
                <option value="Professeur">Professeur</option>
        </select> --> 

        
    </form>
    <table  class="table">
            <thead class = "th">
                    <th scope="col">Code</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nationalite</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date Naissance</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Type</th>
            </thead>

            <tbody class = "tb">
                    <?php
                        if(isset($_GET['recherche'])){
                        $recherche = (int)$_GET['re'];
                        echo("<tr>");
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['code'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['nom'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['prenom'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['nationalite'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['sexe'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['ddn'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['tel'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['email'].'</td>');
                        echo('<td>'.$_SESSION['etudiant'][$recherche]['Type'].'</td>');
                        echo("</tr>");
                        
                    //getCode($recherche);
                        
                    }
                        
                ?> 
            </tbody>
    </table>
</body>
</html>