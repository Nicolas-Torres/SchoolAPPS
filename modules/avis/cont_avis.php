<?php
require_once 'vue_avis.php';
require_once 'modele_avis.php';

class ContAvis
{
    private $vue;
    private $modele;


    public function __construct()
    {
        $this->vue = new  VueAvis();
        $this->modele = new  ModeleAvis();
    }

    public function donnerAvis()
    {
        $avisExiste = $this->modele->avisExiste($_SESSION['idUtilisateur'], $_POST['idProduit']);
        if ($avisExiste != 0) {
            // avis existe déjà
        } else if (isset($_POST['commentaire'])) {
            $result = [
                'idUtilisateur' => $_SESSION['idUtilisateur'],
                'idProduit' => htmlspecialchars($_POST['idProduit']),
                'titre' => htmlspecialchars($_POST['titre']),
                'commentaire' => htmlspecialchars($_POST['commentaire']),
                'note' => htmlspecialchars($_POST['note'])
            ];
            $this->modele->donnerAvis($result);
        } else {
            $this->vue->formDonnerAvis();
        }
    }


    public function supprimerAvis()
    {
        // eventuellement getAvis
        $idAvis = $_POST['idAvis'];
        $this->modele->supprimerAvis($idAvis);
    }

    public function modifierAvis()
    {
        if (isset($_POST['commentaire'])) {
            $result = [
                'idUtilisateur' => $_SESSION['idUtilisateur'],
                'idProduit' => htmlspecialchars($_POST['idProduit']),
                'titre' => htmlspecialchars($_POST['titre']),
                'commentaire' => htmlspecialchars($_POST['commentaire']),
                'note' => htmlspecialchars($_POST['note'])
            ];
            $this->modele->donnerAvis($result);
        } else {
            $idAvis = $_POST['idAvis'];
            $result =  $this->modele->getAvis($idAvis);
            $this->vue->formModifierAvis($result);
        }
    }
}
