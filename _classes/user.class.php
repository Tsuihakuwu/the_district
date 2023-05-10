<?php
class User {
  private $id_utilisateur;
  private $nom;
  private $prenom;
  private $email;
  private $password;

  public function __construct($id_utilisateur, $nom, $prenom, $email, $password) {
    $this->id_utilisateur = $id_utilisateur;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->password = $password;
  }

  public function getIdUtilisateur() {
    return $this->id_utilisateur;
  }

  public function setIdUtilisateur($id_utilisateur) {
    $this->id_utilisateur = $id_utilisateur;
  }

  public function getNom() {
    return $this->nom;
  }

  public function setNom($nom) {
    $this->nom = $nom;
  }

  public function getPrenom() {
    return $this->prenom;
  }

  public function setPrenom($prenom) {
    $this->prenom = $prenom;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }
}
?>