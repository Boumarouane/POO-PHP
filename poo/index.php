<?php

// Une class va représanter des données et un comportement, qui ici, va afficher une présentation.
class Employe {
    // Des variables dans un objet sont appelées des propriétées
    public $nom;
    public $prenom;
    public $age;
    
    // Le constructeur va nous permètre de donner le comportement que doit avoir notre objet en paramètre
    public function __construct($prenom, $nom, $age){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }

    // Une fonction dans un objet est appelé méthode.
    public function presentation(){
        // Ici on utilise les this pour faire référence au propriétées et ne pas devoir les rapeler dans la méthode final. 
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}

// Un objet donne une réalitée à la class
$employe1 = new Employe("Lior", "Chamla", 32);
$employe2 = new Employe("Issam", "Boumi", 25);

// On accède à l'objet pour lancer ca méthode "présentation()".
$employe1->presentation();

