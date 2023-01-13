<?php
require_once('../Views/adminComponent.php');
    class adminController{
        protected $adminComponent;
        public function __construct()
        {
            $this->adminComponent = new adminComponents();
        }
        public function authDisplay(){
            $this->adminComponent->authDisplay();
        }
        public function dashboard(){
            $this->adminComponent->navbar();
            $this->adminComponent->dashboard();
        }
        public function mentoring(){
            $this->adminComponent->navbar();
            $this->adminComponent->mentoring();
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


    }
?>