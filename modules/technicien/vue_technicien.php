<?php

require_once 'modules/generique/vue_generique.php';

class VueTechnicien extends VueGenerique
{

	public function __construct()
	{
	    parent::__construct();
	}

	public function pageAccueilTech($moduleContent)
	{
	    include 'include/inc_breadcrumb.php';
	    ?>
        <section>
            <div class="content-block">
                <div class="container-fluid">
                    <section class="row">
                        <nav class="col-lg-3" id="sideNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <a href="/technicien" class="btn btn-nav">Tableau de bord</a>
                                        </div>
                                    </div>
                                </li>
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                                <button class="btn btn-nav dropdown-toggle" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Votre profil
                                                </button>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <a class="dropdown-item" href="/technicien/profil">Mes informations</a>
                                            <a class="dropdown-item" href="/technicien/changer-login">Changer mon login</a>
                                            <a class="dropdown-item" href="/technicien/nouveau-mot-de-passe">Changer mon mot de passe</a>
                                        </div>
                                    </div>
                                </div>
                                <li class="nav-item">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <a href="/technicien/mes-tickets" class="btn btn-nav">Mes Tickets</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <a href="/technicien" class="btn btn-nav">Messagerie</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <div class="col-lg">
                            <h1>Votre espace technicien, <?php echo ucfirst($_SESSION['login']);?> </h1>
                            <?= $moduleContent ?>
                        </div>
                    </section>
                </div>
            </div>

            </div>
        </section>
        <?php
	}

	public function afficherMenu()
	{
	    ?>
        <nav id="sideNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/technicien/menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="/technicien/ticket">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="/technicien/nouveauMotDePasse">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="/technicien/menu">Menu</a>
                </li>
            </ul>
        </nav>

        <?php
	}
	public function afficherProfil()
	{
	    ?>
        <div class="card">
            <div class="card-header">Votre profil</div>
            <div class="card-body">Nom, prenom, age, email</div>
        </div>

        <?php
	}


    public function tableauBord()
    {
        ?>
            <h3>Mon tableau de bord</h3>
            <section class="row">
                <h4>Tickets ouverts : </h4>
                <h4>Tickets fermés : </h4>
                <h4>Tickets urgents : </h4>
            </section>
        <?php
    }

	public function afficheTickets($result)
	{
	    foreach ($result as &$ticket) {
	    ?>
            <div class="ticket row card">
                <div class="col-lg card-header">
                    <img src="../../images/60x60.png">
                    <h4 class="d-inline"><?= $ticket['intitule'] ?> - N°<?= $ticket['idTicket'] ?></h4>
                </div>
                <div class="col-lg card-body">
                    <p id="explication"><?= $ticket['explication']; ?></p>
                </div>
                <div class="col-lg card-footer">
                    <p><?= $ticket['idEtat']; ?> - <?= $ticket['idProduit']; ?></p>
                </div>
            </div>

        <?php
        }

	    unset($ticket);
	}

	public function afficheTicket($result)
	{
	}

	public function nouveauLogin()
	{
		echo '<h3>Changer de Login</h3>
		<hr class="mt-2 mb-4">
		
		<div class="card-panel  lighten-4">
			<form action="/technicien/changer-login" method="POST" >
				<div class="row">
					<div class="col-4 form-group">
						<label for="nouveauLogin">Nouveau Login</label>
						<input name="nouveauLogin" type="text" class="form-control">
						<button style="margin-top:20px;"class="btn btn-primary" type="submit" name="action">Valider</button>
					</div>
				</div>
			</form>
		</div>';
	}


	public function nouveauMotDePasse()
	{
		echo  '<h3>Changer votre mot de passe</h3>
		<hr class="mt-2 mb-4">
		
		<form action="" method="post">
			<div class="row">
				<div class="col-4 form-group">
					<label for="old_password">Ancien mot de passe</label>
					<input type="password" name="old_password" class="form-control" required>
				</div>
				<div class="col-4 form-group">
					<label for="nouveau_password1">Nouveau mot de passe</label>
					<input type="password" name="nouveau_password1" class="form-control" required>
				</div>
		
				<div class="col-4 form-group">
					<label for="nouveau_password2">Confirmation mot de passe</label>
					<input type="password" name="nouveau_password2" class="form-control" required>
				</div>		
				<div class="col-4">
					<button type="submit" class="btn btn-primary">Modifier</button>
				</div>
			</div>
		</form>';
	}
}
