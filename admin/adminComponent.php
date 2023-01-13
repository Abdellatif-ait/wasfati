<?php

class adminComponents
{
    // Contante attribute that hold the keywords of our website
    const KEYS = "dz, algerian, food, admin";

    // All the views has a function Head that hold the title and description
    public function head($title, $description)
    {
?>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="pragma" content="no cache" />
            <title><?php echo $title ?></title>
            <meta name="description" content=<?php echo $description ?> />
            <meta name="keywords" content=<?php echo self::KEYS ?> />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <link rel="stylesheet" href="/style.css">

        </head>
    <?php
    }
    // All the views has a function navbar that hold the navbar
    public function navbar()
    {
    ?>
        <nav>
            <a href="/admin.php"><object data="Utils/svg/Logo.svg" class="nav-logo"></object></a>

            <div class="call-action">
                <a href="/index.php/indexDisplay" target="_blank" class="secondary-btn">Visiter Site</a>

                <a href="/index.php/authDisplay" class="prm-btn">Se deconnecter</a>
            </div>
        </nav>
    <?php
    }
    public function dashboard()
    {
    ?>
        <div class="dashboard-container">
            <div class="card-container">
                <img src="Utils/test.jfif" alt="Logo" class="card-img">
                <div class="card-body">
                    <h5 class="card-header">Gestion des recettes</h5>
                </div>
                <a href="/index.php/detailDisplay/" class="prm-btn">lire la suite</a>
            </div>

            <div class="card-container">
                <img src="Utils/test.jfif" alt="Logo" class="card-img">
                <div class="card-body">
                    <h5 class="card-header">Gestion des News</h5>
                </div>
                <a href="/index.php/detailDisplay/" class="prm-btn">lire la suite</a>
            </div>

            <div class="card-container">
                <img src="Utils/test.jfif" alt="Logo" class="card-img">
                <div class="card-body">
                    <h5 class="card-header">La gestion des utilisateurs</h5>
                </div>
                <a href="/index.php/detailDisplay/" class="prm-btn">lire la suite</a>
            </div>

            <div class="card-container">
                <img src="Utils/test.jfif" alt="Logo" class="card-img">
                <div class="card-body">
                    <h5 class="card-header">Gestion de la nutrition</h5>
                </div>
                <a href="/index.php/detailDisplay/" class="prm-btn">lire la suite</a>
            </div>

            <div class="card-container">
                <img src="Utils/test.jfif" alt="Logo" class="card-img">
                <div class="card-body">
                    <h5 class="card-header">Gestion du Paramètres</h5>
                </div>
                <a href="/index.php/detailDisplay/" class="prm-btn">lire la suite</a>
            </div>
        </div>

    <?php
    }
    public function mentoring()
    {
    ?>
    
<?php
    }
    public function authDisplay()
    {

    }
}
?>