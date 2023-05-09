<?php

class Categorie {
  private $id_categorie;
  private $libelle;
  private $image;
  private $active;

  public function __construct($id_categorie, $libelle, $image, $active) {
    $this->id_categorie = $id_categorie;
    $this->libelle = $libelle;
    $this->image = $image;
    $this->active = $active;
  }

  public function getIdCategorie() {
    return $this->id_categorie;
  }

  public function setIdCategorie($id_categorie) {
    $this->id_categorie = $id_categorie;
  }

  public function getLibelle() {
    return $this->libelle;
  }

  public function setLibelle($libelle) {
    $this->libelle = $libelle;
  }

  public function getImage() {
    return $this->image;
  }

  public function setImage($image) {
    $this->image = $image;
  }

  public function isActive() {
    return $this->active;
  }

  public function setActive($active) {
    $this->active = $active;
  }
}
