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
            <meta http-equiv="pragma" content ="no cache" />
            <title><?php echo $title ?></title>
            <meta name="description" content=<?php echo $description ?> />
            <meta name="keywords" content=<?php echo self::KEYS ?> />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
    public function card($id, $url, $title, $description)
    {
    ?>
        <div href="" class="card-container">
            <img src="Utils/test.jfif" alt="Logo" class="card-img">
            <div class="card-body">
                <h5 class="card-header"><?php echo $title ?></h5>
                <p class="card-content"><?php echo $description ?></p>
            </div>
            <a class="prm-btn">lire la suite</a>
        </div>
<?php
    }

    //Swiper
    public function swipper(){
        ?>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-pause="hover">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <div class="swiper-item">
                            <img src="Utils/test.jfif" alt="testImg" class="swiper-item-img">
                            <div class="swiper-item-body">
                                <div class="swiper-item-text">
                                    <h3>Title1</h3>
                                    <p>Taco Pasta is made with pasta shells, ground beef, cheese, and a handful of spices and seasonings so you get a delicious dinner in minutes!</p>
                                </div>
                                <a href="" class="prm-btn">afficher la suite</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <div class="swiper-item">
                            <img src="Utils/test.jfif" alt="testImg" class="swiper-item-img">
                            <div class="swiper-item-body">
                                <div class="swiper-item-text">
                                    <h3>Title2</h3>
                                    <p>Taco Pasta is made with pasta shells, ground beef, cheese, and a handful of spices and seasonings so you get a delicious dinner in minutes!</p>
                                </div>
                                <a href="" class="prm-btn">afficher la suite</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="swiper-item" data-bs-interval="2000">
                            <img src="Utils/test.jfif" alt="testImg" class="swiper-item-img">
                            <div class="swiper-item-body">
                                <div class="swiper-item-text">
                                    <h3>Title3</h3>
                                    <p>Taco Pasta is made with pasta shells, ground beef, cheese, and a handful of spices and seasonings so you get a delicious dinner in minutes!</p>
                                </div>
                                <a href="" class="prm-btn">afficher la suite</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <?php
    }
}
?>