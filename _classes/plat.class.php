<?php

class Plat
{
  private $id_plat;
  private $libelle;
  private $description;
  private $prix;
  private $image;
  private $id_categorie;
  private $active;

  public function __construct($id_plat, $libelle, $description, $prix, $image, $id_categorie, $active)
  {
    $this->id_plat = $id_plat;
    $this->libelle = $libelle;
    $this->description = $description;
    $this->prix = $prix;
    $this->image = $image;
    $this->id_categorie = $id_categorie;
    $this->active = $active;
  }
  public function getIdPlat()
  {
    return $this->id_plat;
  }

  public function setIdPlat($id_plat)
  {
    $this->id_plat = $id_plat;
  }

  public function getLibelle()
  {
    return $this->libelle;
  }

  public function setLibelle($libelle)
  {
    $this->libelle = $libelle;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getPrix()
  {
    return $this->prix;
  }

  public function setPrix($prix)
  {
    $this->prix = $prix;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function setImage($image)
  {
    $this->image = $image;
  }

  public function getIdCategorie()
  {
    return $this->id_categorie;
  }

  public function setIdCategorie($id_categorie)
  {
    $this->id_categorie = $id_categorie;
  }

  public function isActive()
  {
    return $this->active;
  }

  public function setActive($active)
  {
    $this->active = $active;
  }
}
