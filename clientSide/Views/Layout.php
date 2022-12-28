<?php
class layout
{
    // Contante attribute that hold the keywords of our website
    const KEYS = "dz, algerian, food, recipe";

    // All the views has a function Head that hold the title and description
    public function head($title, $description)
    {
?>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $title ?></title>
            <meta name="description" content=<?php echo $description ?> />
            <meta name="keywords" content=<?php echo self::KEYS ?> />
            <link rel="stylesheet" href="style.css">

        </head>
    <?php
    }

    //All the views share the same navbar
    public function navbar()
    {
    ?>
        <nav>
            <a href=""><img src="Utils/Logo.png" alt="Wasfati" class="logo"></a>

            <ul class="menu">
                <li><a href="">Accueil</a></li>
                <li><a href="">News</a></li>
                <li><a href="">Idées de recette</a></li>
                <li>Recette
                    <ul class="sub-menu">
                        <li><a href="">Healthy</a></li>
                        <li><a href="">Saison</a></li>
                        <li><a href="">Fête</a></li>
                    </ul>
                </li>
                <li><a href="">Nutrition</a></li>
                <li><a href="">Contact</a></li>
            </ul>

            <div class="call-action">
                <div class="social-media">
                    <a href="">
                        <img src="Utils/facebook.png" alt="facebook">
                    </a>
                    <a href=""><img src="Utils/instagram.png" alt="instagram"></a>
                    <a href=""><img src="Utils/linkedin.png" alt="linkedin" class="linkedin"></a>
                </div>
                <button class="prm-btn">
                    S'indentifier
                </button>
            </div>
        </nav>

    <?php
    }

    // All the views share the same footer
    public function footer()
    {
    ?>
        <footer>
            <div>
                <img src="Utils/Logo.png" alt="Wasfati" class="footer-logo">
                <p>
                    Vous avez besoin d'une recette ou vous en avez une géniale que vous souhaitez partager avec les familles algériennes ? Allez n'importe où car Wasfati est le site parfait pour vous
                </p>
            </div>
            <div>
                <p class="H6">
                    Menu
                </p>
                <div class="footer-menu">
                    <ul>
                        <li><a href="">Accueil</a></li>
                        <li><a href="">News</a></li>
                        <li><a href="">Idées de recette</a></li>
                        <li><a href="">Healthy</a></li>
                    </ul>
                    <ul>
                        <li><a href="">Saison</a></li>
                        <li><a href="">Fêtes</a></li>
                        <li><a href="">Nutrution</a></li>
                        <li><a href="">contact us</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <p class="H6">Social Media</p>
                <div class="footer-social-media">
                    <a href=""><img src="Utils/facebook.png" alt="facebook">WasfatiOrg</a>
                    <a href=""><img src="Utils/instagram.png" alt="instagram">Wasfati01</a>
                    <a href=""><img src="Utils/linkedin.png" alt="linkedin" class="linkedin">WasfatiOrg</a>
                </div>
            </div>
        </footer>
    <?php
    }

    // Many of our views use similair Card
    public function card($url, $title, $description)
    {
    ?>
        <div>
            <div>img</div>
            <div> <?php echo $title ?> </div>
            <div> <?php echo $description ?> </div>
        </div>
<?php
    }
}
?>