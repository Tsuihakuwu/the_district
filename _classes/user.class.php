<?php

class Categorie {
  private $id;
  private $libelle;
  private $image;
  private $active;

  public function __construct($id, $libelle, $image, $active) {
    $this->id = $id;
    $this->libelle = $libelle;
    $this->image = $image;
    $this->active = $active;

  }

  

}

?>