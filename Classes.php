<?php
require_once('dbaccess.php');

class Client
{
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $tel;
    private $email;
    private $dba;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function save()
    {
        $dba = new Dbaccess();
        $dba->query("insert into client (nom, prenom, adresse, tel, email) values(
                                                '" . $this->nom . "',
                                                '"  . $this->prenom . "',
                                                '"  . $this->adresse . "',
                                                '"  . $this->tel . "',
                                                '"  . $this->email . "')");
        $dba->execute();
        return 0;
    }

    public function delete()
    {
        $dba = new Dbaccess();
        $dba->query("delete from client where id='" . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function update()
    {
        $dba = new Dbaccess();
        $dba->query("update client set nom = '" . $this->nom . "',
                                        prenom = '"  . $this->prenom . "',
                                        adresse = '"  . $this->adresse . "',
                                        tel = '"  . $this->tel . "',
                                        email = '"  . $this->email . "'
                                        where id = '"  . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function getAll()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from client");
        return $dba->resultSet();
    }

    public function getOne()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from client where id='" . $this->id . "'");
        return $dba->single();
    }

    public function getByName($name)
    {
        $dba = new Dbaccess();
        $dba->query("Select * from client where nom like '%" . $name . "%'");
        return $dba->resultSet();
    }


    public function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from client");
        return $dba->rowCount();
    }
}

class Commande
{
    private $id;
    private $date;
    private $statut;
    private $remarques;
    private $montant;
    private $adresseLivraison;
    private $client;
    private $dba;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getRemarques()
    {
        return $this->remarques;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public function setAdresseLivraison($adresseLivraison)
    {
        $this->adresseLivraison = $adresseLivraison;
    }

    public function save()
    {
        $dba = new Dbaccess();
        $dba->query("insert into commande values('" . $this->id . "',
                                                '" . $this->date . "',
                                                "  . $this->statut . ",
                                                "  . $this->remarques . ",
                                                "  . $this->montant . ",
                                                "  . $this->adresseLivraison . ",
                                                '"  . $this->client . "')");
        $dba->execute();
        return 0;
    }

    public function delete()
    {
        $dba = new Dbaccess();
        $dba->query("delete from commande  where id='" . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function update()
    {
        $dba = new Dbaccess();
        $dba->query("update commande set date = '" . $this->date . "',
                                        status = "  . $this->statut . ",
                                        remarques = "  . $this->remarques . ",
                                        montant = "  . $this->montant . ",
                                        adresse_livraison = "  . $this->adresseLivraison . "
                                        where id = '"  . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function getAll()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from commande inner join client on (client.id = commande.id_client)");
        return $dba->resultSet();
    }

    public function getOne()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from commande inner join client on (client.id = commande.id_client) where id='" . $this->id . "'");
        return $dba->single();
    }

    public function getByDate($date)
    {
        $dba = new Dbaccess();
        $dba->query("Select * from commande inner join client on (client.id = commande.id_client) where date = '%" . $date . "%'");
        return $dba->resultSet();
    }


    public function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from commande");
        return $dba->rowCount();
    }
}

class Facture
{
    private $id;
    private $date;
    private $statut;
    private $montantTotal;
    private $moyenPaiement;
    private $dba;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getMontantTotal()
    {
        return $this->montantTotal;
    }

    public function getMoyenPaiement()
    {
        return $this->moyenPaiement;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function setMontantTotal($montantTotal)
    {
        $this->montantTotal = $montantTotal;
    }

    public function setMoyenPaiement($moyenPaiement)
    {
        $this->moyenPaiement = $moyenPaiement;
    }

    public function save()
    {
        $dba = new Dbaccess();
        $dba->query("insert into facture values('" . $this->id . "',
                                                '" . $this->date . "',
                                                "  . $this->statut . ",
                                                "  . $this->montantTotal . ",
                                                '"  . $this->moyenPaiement . "')");
        $dba->execute();
        return 0;
    }

    public function delete()
    {
        $dba = new Dbaccess();
        $dba->query("delete from facture where id='" . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function update()
    {
        $dba = new Dbaccess();
        $dba->query("update facture set date = '" . $this->date . "',
                                        status = "  . $this->statut . ",
                                        montant_total = "  . $this->montantTotal . ",
                                        moyen_paiement = "  . $this->moyenPaiement . "
                                        where id = '"  . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function getAll()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from facture");
        return $dba->resultSet();
    }

    public function getOne()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from facture where id='" . $this->id . "'");
        return $dba->single();
    }


    public function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from facture");
        return $dba->rowCount();
    }
}
