<?php

//! L'interface défini des méthodes que l'on veut rendre obligatoire sur tous les objets qui ont "signer le contrat" 
interface Travailleur{
    public function travailler();
}

// ! On fait "signer le contrat" à l'objet en ajoutant le mot-clé "implements"...
// Une class va représanter des données et un comportement, qui ici, va afficher une présentation.
class Employe implements Travailleur{
    // Des variables dans un objet sont appelées des propriétées
    public $nom;
    public $prenom;
    // le "private" permet de rendre une propriété modifiable juste à l'intérieur d'une classe, comme ca personne ne peut la changer de l'extérieur.
    protected $age;
    
    // Le constructeur va nous permètre de donner le comportement que doit avoir notre objet en paramètre
    public function __construct($prenom, $nom, $age){
        $this->nom = $nom;
        $this->prenom = $prenom;
        // Ici on vérifie si l'age est bien un nombre grace à la méthode setAge() que j'ai défini, au cas ou la personne aurai envie de modifier la propriétée via le parametre de mon objet Employe().
        $this->setAge($age);
    }

    // ! ...et on ajoute la fonction travailler()
    public function travailler(){
        return "j'ai signer le contrat donc je m'affiche";
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
        var_dump("Salut, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}

// Ici on veut créer un autre objet ayant les meme propriétées et comportements que l'objet précedent sauf qu'il y a certaine données en + , donc on va faire heriter l'objet Employe à l'objet Patron qui deviendra donc la "fille" de l'objet Employe.
class Patron extends Employe {

    public $voiture;
    
    public function __construct($prenom, $nom, $age, $voiture){
        // Ici on peut regrouper les données du constructeur Employe comme ceci.
        parent::__construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }

    // On redefini la fonction présentation du parent. 
    public function presentation(){
        //  L'age ne sera pas lu donc il faut donner accès à l'age en modifiant le "private" de la propriété age du parent en "protected" pour que cela reste privé mais que les enfants de l'objet parent puissent lire/modifier la propriété age.
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans, je possède aussi une voiture.");
    }

    public function rouler(){
        var_dump("Bonjour, je roule avec ma $this->voiture !");
    }
}

// Un objet donne une réalitée à la class
$employe1 = new Employe("Lior", "Chamla", 32);
$employe2 = new Employe("Issam", "Boumi", 25);
$patron = new Patron("Issam", "Boumi", 25, "Siat");

// la personne externe qui va essayer de changer la propriété ->age
$employe1->setAge(50);

// On accède à l'objet pour lancer ca méthode "présentation()".
$employe1->presentation();
$patron->presentation();
$patron->rouler();

// ! Le but ici et d'etre sur que les prochains developpeur qui passeront dans mon code et qui appelleront ma fonction faireTravailler(), mettent un objet contenant absolument la méthode travailler() en parametre de cette fonction faireTravailler(). Pour cela on va créer une interface qui contiendra un "contrat" que les objets créer devront absolument "signer" pour apparaitre dans cette fonction faireTravailler().
// Dans le cas ou je voudrais créer une fonction qui recevra n'importe quel objet en parametre...
// ! On rajoute le "contrat" qui est ici Travailleur.
function faireTravailler(Travailleur $objet){
// ...et qui afficherai une méthode précise de cet objet(car je veux etre sur et certain que l'objet que la personne a mis dans le parametre de ma fonction possède cette méthode précise).
    var_dump("Travail en cours : {$objet->travailler()}");
}

faireTravailler($employe1);

