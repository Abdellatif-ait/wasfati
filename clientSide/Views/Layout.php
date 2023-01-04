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
    public function card($Card)
    {
    ?>
        <div class="card-container" key=<?php echo $Card->id ?>>
            <img src=<?php echo $Card->url ?> alt="Logo" class="card-img">
            <div class="card-body">
                <h5 class="card-header"><?php echo $Card->title ?></h5>
                <p class="card-content"><?php echo $Card->description ?></p>
            </div>
            <a class="prm-btn">lire la suite</a>
        </div>
<?php
    }

    //Swiper
    public function swipper($List){
        ?>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-pause="hover">
                <div class="carousel-inner">
                    <?php
                        $index=0;
                        foreach($List as $Card){
                            if($index == 0){
                                $index++;
                                ?>
                                    <div class="carousel-item active" data-bs-interval="5000">
                                        <div class="swiper-item">
                                            <img src=<?php echo $Card->url ?> alt="testImg" class="swiper-item-img">
                                            <div class="swiper-item-body">
                                                <div class="swiper-item-text">
                                                    <h3><?php echo $Card->title ?></h3>
                                                    <p><?php echo $Card->description ?></p>
                                                </div>
                                                <a href="" class="prm-btn">afficher la suite</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }else{
                                ?>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <div class="swiper-item">
                                            <img src=<?php echo $Card->url ?> alt="testImg" class="swiper-item-img">
                                            <div class="swiper-item-body">
                                                <div class="swiper-item-text">
                                                    <h3><?php echo $Card->title ?></h3>
                                                    <p><?php echo $Card->description ?></p>
                                                </div>
                                                <a href="" class="prm-btn">afficher la suite</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <?php
    }

    //Categories
    public function categories($List){
        ?>
            <div class="categories">
                <?php
                    foreach($List as $category){
                        ?>
                            <div class="category">
                                <div class="category-header">
                                    <h3>
                                        <?php echo $category->title ?>
                                    </h3>
                                    <a href="">voir tout<img src="Utils/svg/arrowRightExtend.svg" alt=""></a>
                                </div>
                                <div class="category-body">
                                    <div class="list-view">
                                        <?php
                                            foreach($category->List as $Card){
                                                $this->card($Card);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        <?php
    }
    public function detailPage($data){
        ?>
            <!-- Recipe Page -->
            <div>
                <!-- Title & description & Image -->
                <div class="horizontale-container">
                    <div class="">
                        <div class="header"> <!-- header -->
                            <p><?php echo $data->title ?></p>
                            <p><?php if(isset($data->difficulte)) echo $data->difficulte; ?></p>
                            <?php if(isset($data->calories)){
                                ?>
                                    <p><?php echo $data->calories ?> <img src="Utils/svg/calorie.svg" alt=""></p>
                                <?php
                            }
                            ?>
                            <?php if(isset($data->rate)){
                                ?>
                                    <p><?php echo $data->rate ?> <img src="Utils/svg/star.svg" alt=""></p>
                                <?php
                            }
                            ?>
                            <button><img src="Utils/svg/favorite.svg" alt=""></button>
                        </div>
                        <p> <!---- description -->
                            <?php echo $data->description ?>
                        </p>
                        <?php if(isset($data->timePreparation)){
                            ?>
                                <p><span class="H6">temps de preparation : &nbsp;</span><?php echo $data->timePreparation ?> min <img src="Utils/svg/time.svg" alt=""></p>
                                <p><span class="H6">temps de repos : &nbsp;</span><?php echo $data->timeRepo ?> min <img src="Utils/svg/time.svg" alt=""></p>
                                <p><span class="H6">temps de cuisson : &nbsp;</span><?php echo $data->timeCuisson ?> min <img src="Utils/svg/time.svg" alt=""></p>
                            <?php
                        }
                        ?>
                    </div>
                    <img src="<?php echo $data->imgPath?>" alt="RecipeImg">                   
                </div>
                <!-- Video & details -->
                <div class="verticale-container">
                    <div class="horizontale-container">
                        <?php if(isset($data->ingredients)){
                            ?>
                                <div>
                                    <p class="H6">Ingrédients</p>
                                    <ul>
                                        <?php
                                            foreach($data->ingredients as $ingredient){
                                                ?>
                                                    <li><?php echo $ingredient ?></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            <?php
                        }
                        ?>
                        <?php if(isset($data->steps)){
                            ?>
                                <div>
                                    <p class="H6">Etapes</p>
                                    <ol>
                                        <?php
                                            foreach($data->steps as $step){
                                                ?>
                                                    <li><?php echo $step ?></li>
                                                <?php
                                            }
                                        ?>
                                    </ol>
                                </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                        if(isset($data->videoPath)){
                            ?>
                                <video controls>
                                    <source src="<?php echo $data->videoPath ?>" type="video/mp4">
                                </video>
                            <?php
                        }
                    ?>
                </div>
                <div class="rate-container">
                    <p class="H6">Noté cette recette</p>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
            </div>
        <?php
    }
    public function listView($List){
        ?>
            <div class="list-container">
                <div class="list-header">

                </div>
                <div class="list-grid">
                    <?php
                        foreach($List as $Card){
                            $this->card($Card);
                        }
                    ?>
                </div>
            </div>
        <?php
    }
    public function profile($profile){
        ?>
            <div class="profile">
                <div class="profile-header">
                    <div class="profile-img">
                        <img src="Utils/assets/pdp.png" alt="pdp">
                    </div>
                    <div class="profile-info">
                        <p class="H6">AITEUR Abdelatif</p>
                        <p class="H6">ja_aiteur@esi.dz</p>
                        <p><span class="H6">Sexe: </span>&nbsp;Homme</p>
                        <p><span class="H6">Date de naissance: </span>&nbsp;15/12/2001</p>
                    </div>
                </div>
                <div class="profile-body">
                    <div class="verticale-container">
                        <div class="horizantale-container">
                            <p class="H6">
                                Mes recettes
                            </p>
                            <button>ajouter une recette</button>
                        </div>
                        <div class="category-body">
                            <div class="list-view">
                                <?php
                                    foreach($profile->List as $Card){
                                        $this->card($Card);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="verticale-container">
                        <div class="horizantale-container">
                            <p class="H6">
                                Les recettes favorisées
                            </p>
                        </div>
                        <div class="category-body">
                            <div class="list-view">
                                <?php
                                    foreach($profile->List as $Card){
                                        $this->card($Card);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
?>