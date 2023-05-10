<?php
class Commande {
    private $id_commande;
    private $id_plat;
    private $quantite;
    private $total;
    private $date_commande;
    private $etat;
    private $nom_client;
    private $telephone_client;
    private $email_client;
    private $adresse_client;

    public function __construct($id_commande, $id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client, $email_client, $adresse_client) {
        $this->id_commande = $id_commande;
        $this->id_plat = $id_plat;
        $this->quantite = $quantite;
        $this->total = $total;
        $this->date_commande = $date_commande;
        $this->etat = $etat;
        $this->nom_client = $nom_client;
        $this->telephone_client = $telephone_client;
        $this->email_client = $email_client;
        $this->adresse_client = $adresse_client;
    }

    public function getIdCommande() {
        return $this->id_commande;
    }

    public function setIdCommande($id_commande) {
        $this->id_commande = $id_commande;
    }

    public function getIdPlat() {
        return $this->id_plat;
    }

    public function setIdPlat($id_plat) {
        $this->id_plat = $id_plat;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getDateCommande() {
        return $this->date_commande;
    }

    public function setDateCommande($date_commande) {
        $this->date_commande = $date_commande;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function getNomClient() {
        return $this->nom_client;
    }

    public function setNomClient($nom_client) {
        $this->nom_client = $nom_client;
    }

    public function getTelephoneClient() {
        return $this->telephone_client;
    }

    public function setTelephoneClient($telephone_client) {
        $this->telephone_client = $telephone_client;
    }

    public function getEmailClient() {
        return $this->email_client;
    }

    public function setEmailClient($email_client) {
        $this->email_client = $email_client;
    }

    public function getAdresseClient() {
        return $this->adresse_client;
    }

    public function setAdresseClient($adresse_client) {
        $this->adresse_client = $adresse_client;
    }
}

?>