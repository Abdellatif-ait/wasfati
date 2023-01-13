<?php
require_once __DIR__ . '/../Views/userComponent.php';
require_once __DIR__ . '/../Models/user.php';
require_once __DIR__ . '/../Models/diaporama.php';
require_once __DIR__ . '/../Models/recipe.php';
require_once __DIR__ . '/../Models/ingredient.php';
require_once __DIR__ . '/../Models/Category.php';
require_once __DIR__ . '/../Models/news.php';
require_once __DIR__ . '/../Models/newsPage.php';
require_once __DIR__ . '/../Models/user.php';
class userController
{
    protected $userComponents;
    public function __construct()
    {
        $this->userComponents = new userComponents();
    }
    public function authDisplay()
    {
        $this->userComponents->head("Auth page", "a page for auth");
        $this->userComponents->navbar();
        $this->userComponents->auth();
        $this->userComponents->footer();
    }
    public function profileDisplay()
    {
        session_start();
        $profile = $this->getProfile($_SESSION['user']['userID']);
        $this->userComponents->head("Profile Page", "a page for profile");
        $this->userComponents->navbar();
        $this->userComponents->profile($profile);
        $this->userComponents->footer();
    }
    public function indexDisplay()
    {
        $this->userComponents->head("Home page", "a page for home");
        $this->userComponents->navbar();
        $this->userComponents->swipper($this->getDiaporama());
        $this->userComponents->categories($this->getCategories());
        $this->userComponents->footer();
    }
    public function detailDisplay($params)
    {
        session_start();
        $id = $_SESSION['user']['userID'];
        if ($params[0] == "news") {
            $data = $this->getNewsById(intval($params[1]));
        } else if ($params[0] == "recettes") {
            $data = $this->getRecipeById(intval($params[1]), $id);
        }
        $this->userComponents->head($data['titre'], $data['description']);
        $this->userComponents->navbar();
        $this->userComponents->detailPage($data);
        $this->userComponents->footer();
    }
    public function listDisplay($params)
    {
        $params = explode('?', $params[0]);
        $filter['difficulte'] = $_GET['difficulte'];
        $filter['timePreparation'] = intval($_GET['timePreparation']);
        $filter['timeRepo'] = intval($_GET['timeRepo']);
        $filter['timeCuisson'] = intval($_GET['timeCuisson']);
        $filter['typePlat'] = $_GET['typePlat'];
        $filter['saison'] = $_GET['saison'];
        $filter['note'] = intval($_GET['note']);
        $filter['calories'] = intval($_GET['calories']);
        $filter['healthy'] = $_GET['healthy'];
        $filter['fete'] = $_GET['fete'];
        switch ($params[0]) {
            case 'news':
                $data = $this->getNewsPage();
                break;
            case 'recettes':
                $data = $this->getRecipes();
                break;
            case 'nutrition':
                $data = $this->getIngredients();
                break;
        }
        $data = $this->filterRecipes($data, $filter);
        $this->userComponents->head("list page", "a page for list");
        $this->userComponents->navbar();
        $this->userComponents->listView($data, $params[0], $filter);
        $this->userComponents->footer();
    }
    public function contactDisplay()
    {
        $this->userComponents->head("Contact page", "a page for contact");
        $this->userComponents->navbar();
        $this->userComponents->contact();
        $this->userComponents->footer();
    }

    public function loginHandler()
    {
        $email = strip_tags(trim($_POST['email']));
        $password = strip_tags(trim($_POST['password']));
        $userModel = new userModel();
        $user = $userModel->login($email, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: indexDisplay');
        } else {
            header('Location: authDisplay');
        }
    }
    public function logoutHandler()
    {
        session_start();
        session_destroy();
        header('Location: indexDisplay');
    }
    public function registerHandler()
    {
        $user['email'] = strip_tags(trim($_POST['email']));
        $user['password'] = strip_tags(trim($_POST['password']));
        $user['nom'] = strip_tags(trim($_POST['nom']));
        $user['prenom'] = strip_tags(trim($_POST['prenom']));
        $user['dateNaissance'] = strip_tags(trim($_POST['date']));
        $user['sexe'] = strip_tags(trim($_POST['sexe']));
        $user['pdp'] = strip_tags(trim($_POST['pdp']));
        $userModel = new userModel();
        $user = $userModel->register($user);
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: indexDisplay');
        } else {
            header('Location: authDisplay');
        }
    }
    // get recipes
    public function getRecipes()
    {
        $Model = new recipeModel();
        $recipes = $Model->getRecipesFiltered();
        return $recipes;
    }
    // get recipe by id
    public function getRecipeById($id, $userID)
    {
        $id = strip_tags(trim($id));
        $Model = new recipeModel();
        $recipe = $Model->getRecipe($id, $userID);
        return $recipe;
    }
    // get nurition
    public function getIngredients()
    {
        $Model = new ingredientModel();
        $ingredients = $Model->getIngredients();
        return $ingredients;
    }
    // get profile
    public function getProfile($id)
    {
        $id = strip_tags(trim($id));
        $Model = new userModel();
        $user = $Model->getUserById($id);
        return $user;
    }
    // get categories
    public function getCategories()
    {
        $Model = new categoryModel();
        $categories = $Model->getCategories();
        return $categories;
    }
    // get diaporama
    public function getDiaporama()
    {
        $Model = new diaporamaModel();
        $diaporama = $Model->getDiaporama();
        return $diaporama;
    }
    //get news by id
    public function getNewsById($id)
    {
        $id = strip_tags(trim($id));
        $Model = new newsModel();
        $news = $Model->getNewsById($id);
        return $news;
    }
    //get newsPage
    public function getNewsPage()
    {
        $Model = new newsPageModel();
        $news = $Model->getNewsPage();
        return $news;
    }
    //get params
    public function getParams()
    {
        $Model = new paramsModel();
        $params = $Model->getParams();
        return $params;
    }
    //get saison
    public function getSaison()
    {
        $Model = new saisonModel();
        $saisons = $Model->getSaisons();
        return $saisons;
    }
    //get fete
    public function getFete()
    {
        $Model = new recipeModel();
        $fetes = $Model->getFete();
        return $fetes;
    }
    //add recipe
    public function addRecipe()
    {
        $titre = strip_tags(trim($_POST['titre']));
        $description = strip_tags(trim($_POST['description']));
        $timePreparation = strip_tags(trim($_POST['timePreparation']));
        $timeRepo = strip_tags(trim($_POST['timeRepo']));
        $timeCuisson = strip_tags(trim($_POST['timeCuisson']));
        $imgPath = strip_tags(trim($_POST['imgPath']));
        $videoPath = strip_tags(trim($_POST['videoPath']));
        $categorieID = strip_tags(trim($_POST['categorieID']));
        $calories = strip_tags(trim($_POST['calories']));
        $difficulte = strip_tags(trim($_POST['difficulte']));
        $userID = strip_tags(trim($_POST['userID']));
        $Model = new recipeModel();
        $recipe = $Model->addRecipe($titre, $categorieID, $difficulte, $timePreparation, $timeRepo, $timeCuisson, $imgPath, $videoPath, $calories, $description, $userID);
        if ($recipe) {
            return $recipe;
        } else {
            header('Location: index.php');
        }
    }

    public function rateRecipe()
    {
        session_start();
        $id = strip_tags(trim($_POST['id']));
        $note = intval(strip_tags(trim($_POST['note'])));
        $userID = $_SESSION['user']['userID'];
        $Model = new recipeModel();
        $recipe = $Model->rateRecipe($id, $note, $userID);
        return $recipe;
    }

    public function filterRecipes($result, $filter)
    {
        // Filter by categorie

        if (isset($filter['typePlat'])) {
            foreach ($result as $key => $value) {
                if ($value['categorie'] != $filter['typePlat']) {
                    unset($result[$key]);
                }
            }
        }
        // Filter by saison
        if (isset($filter['saison'])) {
            foreach ($result as $key => $value) {
                $found = false;
                foreach ($value['saison'] as $saison) {
                    if ($saison['titre'] == $filter['saison']) {
                        $found = true;
                    }
                }
                if (!$found) {
                    unset($result[$key]);
                }
            }
        }
        // Filter by tempsPreparation
        if (isset($filter['tempsPreparation']) && $filter['tempsPreparation'] != 0) {
            foreach ($result as $key => $value) {
                if ($value['timePreparation'] > $filter['timePreparation']) {
                    unset($result[$key]);
                }
            }
        }
        // Filter by tempsRepo
        if (isset($filter['timeRepo']) && $filter['timeRepo'] != 0) {
            foreach ($result as $key => $value) {
                if ($value['tempsRepo'] > $filter['timeRepo']) {
                    unset($result[$key]);
                }
            }
        }
        // Filter by tempsCuisson
        if (isset($filter['timeCuisson']) && $filter['timeCuisson'] != 0) {
            foreach ($result as $key => $value) {
                if ($value['tempsCuisson'] > $filter['timeCuisson']) {
                    unset($result[$key]);
                }
            }
        }
        // Filter by difficulte
        if (isset($filter['difficulte'])) {
            foreach ($result as $key => $value) {
                if ($value['difficulte'] !== $filter['difficulte']) {
                    unset($result[$key]);
                }
            }
        }
        // Filter by calories

        if (isset($filter['calories']) && $filter['calories'] != 0) {
            foreach ($result as $key => $value) {
                if ($value['calories'] > $filter['calories']) {
                    unset($result[$key]);
                }
            }
        }
        // Filter by rate
        if (isset($filter['note']) && $filter['note'] != 0) {
            foreach ($result as $key => $value) {
                if ($value['rate'] < $filter['note']) {
                    unset($result[$key]);
                }
            }
        }
        // Filter Healthy
        if (isset($filter['healthy']) && $filter['healthy'] == 1) {
            foreach ($result as $key => $value) {
                if ($value['healthy'] == 0) {
                    unset($result[$key]);
                }
            }
        }

        //Filter Fete
        if (isset($filter['fete'])) {
            foreach ($result as $key => $value) {
                $found = false;
                if ($filter['fete'] == "all") {
                    if(count($value['fete'])>0){
                        $found=true;
                    }
                } else {
                    foreach ($value['fete'] as $fete) {
                        if ($fete['titre'] == $filter['fete']) {
                            $found = true;
                            break;
                        }
                    }
                }
                if (!$found) {
                    unset($result[$key]);
                }
            }
        }
        return $result;
    }
    public function getFeteRecipes()
    {
        $Model = new recipeModel();
        $recipes = $Model->getFeteRecipes();
        return $recipes;
    }
}
