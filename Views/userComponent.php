<?php
class userComponents
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
            <meta http-equiv="pragma" content="no cache" />
            <title><?php echo $title ?></title>
            <meta name="description" content=<?php echo $description ?> />
            <meta name="keywords" content=<?php echo self::KEYS ?> />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <link rel="stylesheet" href="/style.css">
            <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            <script src="/index.js"></script>
        </head>
    <?php
    }

    //All the views share the same navbar
    public function navbar()
    {
        session_start();
    ?>
        <nav>
            <a href=""><object data="/Utils/svg/Logo.svg" class="nav-logo"></object></a>

            <ul class="menu">
                <li><a href="/index.php/indexDisplay">Accueil</a></li>
                <li><a href="/index.php/listDisplay/news">News</a></li>
                <li><a href="/index.php/listDisplay/recettes">Idées de recette</a></li>
                <li>Recette
                    <ul class="sub-menu">
                        <li><a href="/index.php/listDisplay/recettes?healthy=1">Healthy</a></li>
                        <li><a href="/index.php/listDisplay/recettes?saison=hiver">Saison</a></li>
                        <li><a href="/index.php/listDisplay/recettes">Fête</a></li>
                    </ul>
                </li>
                <li><a href="/index.php/listDisplay/nutrition">Nutrition</a></li>
                <li><a href="/index.php/contactDisplay">Contact</a></li>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <li><a href="/index.php/profileDisplay">profile</a></li>
                <?php
                }
                ?>
            </ul>

            <div class="call-action">
                <div class="social-media">
                    <a href="https://www.facebook.com/abdellatif.aiteur">
                        <img src="/Utils/facebook.png" alt="facebook">
                    </a>
                    <a href="instagram.com/abdellatifaiteur/"><img src="/Utils/instagram.png" alt="instagram"></a>
                    <a href="https://www.linkedin.com/in/abdelatif-aiteur-29a2b1216/"><img src="/Utils/linkedin.png" alt="linkedin" class="linkedin"></a>
                </div>

                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <a href="/index.php/logoutHandler" class="prm-btn">Logout</a>
                <?php
                } else {
                ?>
                    <a href="/index.php/authDisplay" class="prm-btn">S'indentifier</a>
                <?php
                }
                ?>
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
                <object data="/Utils/svg/Logo.svg" class="footer-logo"></object>
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
                        <li><a href="/index.php/indexDisplay">Accueil</a></li>
                        <li><a href="/index.php/listDisplay/news">News</a></li>
                        <li><a href="/index.php/listDisplay/recettes">Idées de recette</a></li>
                        <li><a href="/index.php/listDisplay/recettes?Healthy=1">Healthy</a></li>
                    </ul>
                    <ul>
                        <li><a href="/index.php/listDisplay/recettes?saison=hiver">Saison</a></li>
                        <li><a href="/index.php/listDisplay/recettes">Fêtes</a></li>
                        <li><a href="/index.php/listDisplay/nutrition">Nutrution</a></li>
                        <li><a href="/index.php/contactDisplay">contact us</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <p class="H6">Social Media</p>
                <div class="footer-social-media">
                    <a href="https://www.facebook.com/abdellatif.aiteur"><img src="/Utils/facebook.png" alt="facebook">WasfatiOrg</a>
                    <a href="instagram.com/abdellatifaiteur/"><img src="/Utils/instagram.png" alt="instagram">Wasfati01</a>
                    <a href="https://www.linkedin.com/in/abdelatif-aiteur-29a2b1216/"><img src="/Utils/linkedin.png" alt="linkedin" class="linkedin">WasfatiOrg</a>
                </div>
            </div>
        </footer>
    <?php
    }

    // Many of our views use similair Card
    public function card($Card, $type)
    {
    ?>
        <div class="card-container" key=<?php echo $Card['id'] ?>>
            <img src="<?php echo $Card['imgPath'] ?>" alt="Logo" class="card-img">
            <div class="card-body">
                <h5 class="card-header"><?php echo $Card['titre'] ?></h5>
                <p class="card-content"><?php echo $Card['description'] ?></p>
                <p class="card-content">
                    <?php
                    if ($type == 'nutrition') {
                        foreach ($Card['nutrition'] as $info) {
                            echo $info['titre'].': '.$info['description'] . '<br>';
                        }
                    }
                    ?>
                </p>
            </div>
            <?php
            if ($type != 'nutrition') {
            ?>
                <a href="/index.php/detailDisplay/<?php if ($type == 'news') {
                                                        echo $Card['type'] . '&' . $Card['id'];
                                                    } else {
                                                        echo $type . '&' . $Card['id'];
                                                    } ?>" class="prm-btn">lire la suite</a>
            <?php
            }
            ?>
        </div>
    <?php
    }

    //Swiper
    public function swipper($List)
    {
    ?>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-pause="hover">
            <div class="carousel-inner">
                <?php
                $index = 0;
                foreach ($List as $Card) {
                    if ($index == 0) {
                        $index++;
                ?>
                        <div class="carousel-item active" data-bs-interval="5000">
                            <div class="swiper-item">
                                <img src="<?php echo $Card['imgPath'] ?>" alt="testImg" class="swiper-item-img">
                                <div class="swiper-item-body">
                                    <div class="swiper-item-text">
                                        <h3><?php echo $Card['titre'] ?></h3>
                                        <p><?php echo $Card['description'] ?></p>
                                    </div>
                                    <a href="<?php echo $Card['url'] ?>" target="_blank" class="prm-btn">afficher la suite</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="carousel-item" data-bs-interval="2000">
                            <div class="swiper-item">
                                <img src="<?php echo $Card['imgPath'] ?>" alt="testImg" class="swiper-item-img">
                                <div class="swiper-item-body">
                                    <div class="swiper-item-text">
                                        <h3><?php echo $Card['titre'] ?></h3>
                                        <p><?php echo $Card['description'] ?></p>
                                    </div>
                                    <a href="<?php echo $Card['url'] ?>" target="_blank" class="prm-btn">afficher la suite</a>
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
    public function categories($List)
    {
    ?>
        <div class="categories">
            <?php
            foreach ($List as $category) {
            ?>
                <div class="category">
                    <div class="category-header">
                        <h3>
                            <?php echo $category['titre'] ?>
                        </h3>
                        <a href="/index.php/listDisplay/recettes?typePlat=<?php echo $category['titre'] ?>">voir tout<img src="/Utils/svg/arrowRightExtend.svg" alt=""></a>
                    </div>
                    <div class="category-body">
                        <div class="list-view">
                            <?php
                            foreach ($category['recipes'] as $Card) {
                                $this->card($Card, 'recettes');
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
    public function detailPage($data)
    {
    ?>
        <!-- Recipe Page -->
        <div>
            <!-- Title & description & Image -->
            <div class="horizontale-container">
                <div class="header-container">
                    <div class="header"> <!-- header -->
                        <p><?php echo $data['titre'] ?></p>
                        <p><?php if (isset($data['difficulte'])) echo $data['difficulte']; ?></p>
                        <?php if (isset($data['calories'])) {
                        ?>
                            <p><?php echo $data['calories'] ?> <img src="/Utils/svg/calorie.svg" alt=""></p>
                        <?php
                        }
                        ?>
                        <?php if (isset($data['rate'])) {
                        ?>
                            <p><?php echo intval($data['rate']) ?> <img src="/Utils/svg/star.svg" alt=""></p>
                        <?php
                        }
                        ?>
                    </div>
                    <p> <!---- description -->
                        <?php echo $data['description'] ?>
                    </p>
                    <?php if (isset($data['tempsPreparation'])) {
                    ?>
                        <ul>
                            <li class="H6">temps de preparation : &nbsp;</span><?php echo $data['tempsPreparation'] ?> min <img src="/Utils/svg//time.svg" alt=""></li>
                            <li class="H6">temps de repos : &nbsp;</span><?php echo $data['tempsRepo'] ?> min <img src="/Utils/svg//time.svg" alt=""></li>
                            <li class="H6">temps de cuisson : &nbsp;</span><?php echo $data['tempsCuisson'] ?> min <img src="/Utils/svg//time.svg" alt=""></li>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
                <img src="<?php echo $data['imgPath'] ?>" alt="RecipeImg">
            </div>
            <!-- Video & details -->
            <div class="verticale-container">
                <div class="horizontale-container">
                    <?php if (isset($data['ingredients'])) {
                    ?>
                        <div>
                            <p class="H6">Ingrédients</p>
                            <ul>
                                <?php
                                foreach ($data['ingredients'] as $ingredient) {
                                ?>
                                    <li><?php echo $ingredient['titre'] . ":" . $ingredient['quantite'] ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if (isset($data['steps'])) {
                    ?>
                        <div>
                            <p class="H6">Etapes</p>
                            <ol>
                                <?php
                                foreach ($data['steps'] as $step) {
                                ?>
                                    <li><?php echo $step['instruction'] ?></li>
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
                if (isset($data['videoPath'])) {
                ?>
                    <video controls>
                        <source src="<?php echo $data['videoPath'] ?>" type="video/mp4">
                    </video>
                <?php
                }
                ?>
            </div>
            <?php
            session_start();
            if (isset($_SESSION['user'])) {
            ?>
                <div class="rate-container">
                    <p class="H6">Noté cette recette</p>
                    <form class="rate" action="">
                        <input type="text" name="id" value="<?php echo $data['recetteID'] ?>" hidden>
                        <input type="radio" id="star5" name="rate" value="5" <?php if ($data['userRate'] == 5) echo 'checked' ?> />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" <?php if ($data['userRate'] == 4) echo 'checked' ?> />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" <?php if ($data['userRate'] == 3) echo 'checked' ?> />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" <?php if ($data['userRate'] == 2) echo 'checked' ?> />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" <?php if ($data['userRate'] == 1) echo 'checked' ?> />
                        <label for="star1" title="text">1 star</label>
                        </from>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    public function listView($List, $type, $filter)
    {

    ?>
        <div class="list-container">
            <div class="list-header">
                <p class="H4">Liste des <?php echo $type ?></p>
                <?php if ($type == 'recettes') {
                ?>
                    <div class="list-filter">
                        <div class="search">
                            <img src="/Utils/svg/search.svg" alt="">
                            <input type="search" placeholder="Rechercher sur votre recette">
                            <button id="filter-btn">filtrer <img src="../../Utils/svg/filter.svg" alt=""></button>
                        </div>
                        <form action="<?php echo $type ?>" class="filter-container">
                            <div class="filter">
                                <div class="filter-item">
                                    <p class="H6">Difficulté</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="facile" name="difficulte" value="facile">
                                        <label for="facile">Facile</label><br>
                                        <input type="checkbox" id="moyen" name="difficulte" value="moyen">
                                        <label for="moyen">Moyen</label><br>
                                        <input type="checkbox" id="difficile" name="difficulte" value="difficile">
                                        <label for="difficile">Difficile</label><br>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <p class="H6">Temps de préparation</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="moins-15" name="timePreparation" value="15">
                                        <label for="moins-15">Moins de 15 min</label><br>
                                        <input type="checkbox" id="15-30" name="timePreparation" value="30">
                                        <label for="15-30">Moins de 30 min</label><br>
                                        <input type="checkbox" id="30-45" name="timePreparation" value="345">
                                        <label for="30-45">Moins de 45 min</label><br>
                                        <input type="checkbox" id="45-60" name="timePreparation" value="60">
                                        <label for="45-60">Moins de 60 min</label><br>
                                        <input type="checkbox" id="plus-60" name="timePreparation" value="999">
                                        <label for="plus-60">tous</label><br>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <p class="H6">Temps de Repo</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="moins-15" name="timeRepo" value="15">
                                        <label for="moins-15">Moins de 15 min</label><br>
                                        <input type="checkbox" id="15-30" name="timeRepo" value="30">
                                        <label for="15-30">Moins de 30 min</label><br>
                                        <input type="checkbox" id="30-45" name="timeRepo" value="45">
                                        <label for="30-45">Moins de 45 min</label><br>
                                        <input type="checkbox" id="45-60" name="timeRepo" value="60">
                                        <label for="45-60">Moins de 60 min</label><br>
                                        <input type="checkbox" id="plus-60" name="timeRepo" value="999">
                                        <label for="plus-60">tous</label><br>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <p class="H6">Temps de cuisson</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="moins-15" name="timeCuisson" value="15">
                                        <label for="moins-15">Moins de 15 min</label><br>
                                        <input type="checkbox" id="15-30" name="timeCuisson" value="30">
                                        <label for="15-30">Moins de 30 min</label><br>
                                        <input type="checkbox" id="30-45" name="timeCuisson" value="45">
                                        <label for="30-45">Moins de 45 min</label><br>
                                        <input type="checkbox" id="45-60" name="timeCuisson" value="60">
                                        <label for="45-60">Moins de 60 min</label><br>
                                        <input type="checkbox" id="plus-60" name="timeCuisson" value="999">
                                        <label for="plus-60">tous</label><br>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <p class="H6">Type de plat</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="entree" name="typePlat" value="entree">
                                        <label for="entree">Entrée</label><br>
                                        <input type="checkbox" id="plat" name="typePlat" value="plat">
                                        <label for="plat">Plat</label><br>
                                        <input type="checkbox" id="dessert" name="typePlat" value="dessert">
                                        <label for="dessert">Dessert</label><br>
                                        <input type="checkbox" id="boisson" name="typePlat" value="boisson">
                                        <label for="boisson">boisson</label><br>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <p class="H6">Saison</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="printemps" name="saison" value="printemps">
                                        <label for="printemps">printemps</label><br>
                                        <input type="checkbox" id="été" name="saison" value="ete">
                                        <label for="été">été</label><br>
                                        <input type="checkbox" id="automne" name="saison" value="automne">
                                        <label for="automne">automne</label><br>
                                        <input type="checkbox" id="hiver" name="saison" value="hiver">
                                        <label for="hiver">hiver</label><br>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <p class="H6">Notation</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="1" name="note" value="1">
                                        <label for="1">1 star</label><br>
                                        <input type="checkbox" id="2" name="note" value="2">
                                        <label for="2">2 stars</label><br>
                                        <input type="checkbox" id="3" name="note" value="3">
                                        <label for="3">3 stars</label><br>
                                        <input type="checkbox" id="4" name="note" value="4">
                                        <label for="4">4 stars</label><br>
                                        <input type="checkbox" id="5" name="note" value="5">
                                        <label for="5">5 stars</label><br>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <p class="H6">calories</p>
                                    <div class="filter-item-content">
                                        <input type="checkbox" id="moins-200" name="calories" value="200">
                                        <label for="moins-200">Moins de 200</label><br>
                                        <input type="checkbox" id="200-400" name="calories" value="400">
                                        <label for="200-400">Moins de 400</label><br>
                                        <input type="checkbox" id="400-600" name="calories" value="600">
                                        <label for="400-600">Moins de 600</label><br>
                                        <input type="checkbox" id="600-800" name="calories" value="800">
                                        <label for="600-800">Moins de 800</label><br>
                                        <input type="checkbox" id="plus-800" name="calories" value="999000">
                                        <label for="plus-800">Tous</label><br>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="prm-btn" value="Appliquer">
                            </div>
                        </form>
                    </div>

                    <?php
                    $keys = array_keys($filter);
                    foreach ($keys as $key) {
                        if ($filter[$key] != "") {
                    ?>
                            <button class="secondary-btn"><?php echo $key . ':' . $filter[$key] ?></button>
                <?php
                        }
                    }
                } ?>

            </div>
            <div class="list-grid">
                <?php
                foreach ($List as $Card) {
                    $this->card($Card, $type);
                }
                ?>
            </div>
        </div>
    <?php
    }
    public function profile($profile)
    {
    ?>
        <div class="profile">
            <div class="profile-header">
                <img src="../../Utils/assets/pdp.png" alt="pdp">
                <div class="horizontale-container">
                    <div class="profile-info">
                        <p class="H4"><?php echo $profile['nom'] . " " . $profile['prenom'] ?></p>
                        <p class="H6"><?php echo $profile['email'] ?></p>
                        <p><span class="H6">Sexe: </span>&nbsp;<?php echo $profile['sexe'] ?></p>
                        <p><span class="H6">Date de naissance: </span>&nbsp;<?php echo $profile['dateNaissance'] ?></p>
                    </div>
                    <input type="button" value="editer">
                </div>
            </div>
            <div class="profile-body">
                <div class="verticale-container">
                    <div class="category-header">
                        <p class="H6">
                            Mes recettes
                        </p>
                        <input type="button" value="ajouter une recette" class="secondary-btn">
                    </div>
                    <div class="category-body">
                        <div class="list-view">
                            <?php
                            foreach ($profile['recettes'] as $Card) {
                                $this->card($Card, 'recettes');
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="verticale-container">
                    <div class="horizontale-container">
                        <p class="H6">
                            Les recettes favorisées
                        </p>
                    </div>
                    <div class="category-body">
                        <div class="list-view">
                            <?php
                            foreach ($profile['recettefav'] as $Card) {
                                $this->card($Card, 'recettes');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    public function auth()
    {
    ?>
        <div class="horizontale-container">
            <object data="/Utils/svg/Logo.svg" class="auth-logo"></object>
            <div class="form">
                <form method="post" action="loginHandler" class="active login">
                    <h3>Connecter-vous</h3>
                    <div class="verticale-container">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div class="verticale-container">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" placeholder="Mot de passe">
                    </div>
                    <input type="submit" value="Se connecter" class="prm-btn">
                    <p>vous n'avez pas de compte? <span id="login-switch">S'inscrire</span></p>
                </form>
                <form method="post" action="registerHandler" class="register">
                    <h3>S'inscrire</h3>
                    <div class="horizontale-container">
                        <div>
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" placeholder="votre nom">
                        </div>
                        <div>
                            <label for="prenom">prenom</label>
                            <input type="text" name="prenom" placeholder="votre prenom">
                        </div>
                    </div>
                    <div class="verticale-container">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div class="verticale-container">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" placeholder="Mot de passe">
                    </div>
                    <div class="verticale-container">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" placeholder="Mot de passe">
                    </div>
                    <div class="verticale-container">
                        <label for="pdp">photo de profile</label>
                        <input type="file" name="pdp" id="pdp" accept=".png,.jpg">
                    </div>
                    <div class="verticale-container">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>

                    <div class="verticale-container">
                        <label for="date">Date de naissance</label>
                        <input type="date" name="date" id="date">
                    </div>
                    <input type="submit" value="S'inscrire" class="prm-btn">
                    <p>vous avez deja un compte? <span id="register-switch">S'identifier</span></p>
                </form>
            </div>
        </div>
    <?php
    }
    public function contact()
    {
        //contact page that has social media links and a contact form
    ?>
        <div class="horizontale-container">
            <div class="contact-header">
                <object data="/Utils/svg/Logo.svg" class="auth-logo"></object>
            </div>
            <div class="contact-body">
                <h1>Contactez-nous</h1>
                    <form class="contact-form" action="contactHandler" method="post">
                        <div class="verticale-container">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="verticale-container">
                            <label class="H6" for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="8"></textarea>
                        </div>
                        <button type="submit" class="prm-btn">Envoyer</button>
                    </form>
            </div>
        </div>
    <?php

    }
}
    ?>