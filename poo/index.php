<?php

// Une class va représanter des données et un comportement, qui ici, va afficher une présentation.
class Employe {
    // Des variables dans un objet sont appelées des propriétées
    public $nom;
    public $prenom;
    // le "private" permet de rendre une propriété modifiable juste à l'intérieur d'une classe, comme ca personne ne peut la changer de l'extérieur.
    private $age;
    
    // Le constructeur va nous permètre de donner le comportement que doit avoir notre objet en paramètre
    public function __construct($prenom, $nom, $age){
        $this->nom = $nom;
        $this->prenom = $prenom;
        // Ici on vérifie si l'age est bien un nombre grace à la méthode setAge() que j'ai défini, au cas ou la personne aurai envie de modifier la propriétée via le parametre de mon objet Employe().
        $this->setAge($age);
    }

    // Permet à qq d'extèrieur de pouvoir changer la propriété ->age sous une condition
    public function setAge($age){
        if(is_int($age) && $age > 1 && $age < 120){
        $this->age = $age ;
        }
        else{
            throw new Exception("L'age de l'employe doit etre un entier entre 1 et 120!");
        }
    }

    // Permet de retouner la propriété ->age
    public function getAge(){
        return $this->age;
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

// la personne externe qui va essayer de changer la propriété ->age
$employe1->setAge(50);

// On accède à l'objet pour lancer ca méthode "présentation()".
$employe1->presentation();

