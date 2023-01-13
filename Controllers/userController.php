<?php
require_once __DIR__.'/../Views/userComponent.php';
require_once __DIR__.'/../Models/user.php';
require_once __DIR__.'/../Models/diaporama.php';
require_once __DIR__.'/../Models/recipe.php';
require_once __DIR__.'/../Models/ingredient.php';
require_once __DIR__.'/../Models/Category.php';
require_once __DIR__.'/../Models/news.php';
require_once __DIR__.'/../Models/newsPage.php';
require_once __DIR__.'/../Models/user.php';
    class userController {
        protected $userComponents;
        public function __construct() {
            $this->userComponents = new userComponents();
        }
        public function authDisplay() {
            $this->userComponents->head("Auth page","a page for auth");
            $this->userComponents->navbar();
            $this->userComponents->auth();
            $this->userComponents->footer();
        }
        public function profileDisplay() {
            session_start();
            $profile=$this->getProfile($_SESSION['user']['userID']);
            $this->userComponents->head("Profile Page","a page for profile");
            $this->userComponents->navbar();
            $this->userComponents->profile($profile);
            $this->userComponents->footer();
        }
        public function indexDisplay(){
            $this->userComponents->head("Home page","a page for home");
            $this->userComponents->navbar();
            $this->userComponents->swipper($this->getDiaporama());
            $this->userComponents->categories($this->getCategories());
            $this->userComponents->footer();
        }
        public function detailDisplay($params){
            session_start();
            $id=$_SESSION['user']['userID'];
            if($params[0]=="news"){
                $data=$this->getNewsById(intval($params[1]));	
            }
            else if($params[0]=="recettes"){
                $data=$this->getRecipeById(intval($params[1]),$id);
            }	
            $this->userComponents->head($data['titre'],$data['description']);
            $this->userComponents->navbar();
            $this->userComponents->detailPage($data);
            $this->userComponents->footer();
        }
        public function listDisplay($params){
            $params=explode('?',$params[0]);
            $filter['difficulte']=$_GET['difficulte'];
            $filter['timePreparation']=intval($_GET['timePreparation']);
            $filter['timeRepo']=intval($_GET['timeRepo']);
            $filter['timeCuisson']=intval($_GET['timeCuisson']);
            $filter['typePlat']=$_GET['typePlat'];
            $filter['saison']=$_GET['saison'];
            $filter['note']=intval($_GET['note']);
            $filter['calories']=intval($_GET['calories']);
            $filter['healthy']=$_GET['healthy'];
            switch ($params[0]) {
                case 'news':
                    $data=$this->getNewsPage();
                    break;
                case 'recettes':
                    $data=$this->getRecipes($filter);
                    break;
                case 'nutrition':
                    $data=$this->getIngredients($filter);
                    break;
            }
            $this->userComponents->head("list page","a page for list");
            $this->userComponents->navbar();
            $this->userComponents->listView($data,$params[0],$filter);
            $this->userComponents->footer();
        }
        public function contactDisplay(){
            $this->userComponents->head("Contact page","a page for contact");
            $this->userComponents->navbar();
            $this->userComponents->contact();
            $this->userComponents->footer();
        }

        public function loginHandler(){
            $email=strip_tags(trim($_POST['email']));
            $password=strip_tags(trim($_POST['password']));
            $userModel=new userModel();
            $user=$userModel->login($email,$password);
            if($user){
                session_start();
                $_SESSION['user']=$user;
                header('Location: indexDisplay');
            }else{
                header('Location: authDisplay');
            }
            
        }
        public function logoutHandler(){
            session_start();
            session_destroy();
            header('Location: indexDisplay');
        }
        public function registerHandler(){
            $user['email']=strip_tags(trim($_POST['email']));
            $user['password']=strip_tags(trim($_POST['password']));
            $user['nom']=strip_tags(trim($_POST['nom']));
            $user['prenom']=strip_tags(trim($_POST['prenom']));
            $user['dateNaissance']=strip_tags(trim($_POST['date']));
            $user['sexe']=strip_tags(trim($_POST['sexe']));
            $user['pdp']=strip_tags(trim($_POST['pdp']));
            $userModel=new userModel();
            $user=$userModel->register($user);
            if($user){
                session_start();
                $_SESSION['user']=$user;
                header('Location: indexDisplay');
            }else{
                header('Location: authDisplay');
            }
        }
        // get recipes
        public function getRecipes($filter){
            $Model=new recipeModel();
            $recipes=$Model->getRecipesFiltered($filter);
            return $recipes;
        }
        // get recipe by id
        public function getRecipeById($id,$userID){
            $id=strip_tags(trim($id));
            $Model=new recipeModel();
            $recipe=$Model->getRecipe($id,$userID);
            return $recipe;
        }
        // get nurition
        public function getIngredients($filter){
            $Model=new ingredientModel();
            $ingredients=$Model->getIngredients($filter);
            return $ingredients;
        }
        // get profile
        public function getProfile($id){
            $id=strip_tags(trim($id));
            $Model=new userModel();
            $user=$Model->getUserById($id);
            return $user;
        }
        // get categories
        public function getCategories(){
            $Model=new categoryModel();
            $categories=$Model->getCategories();
            return $categories;
        }
        // get diaporama
        public function getDiaporama(){
            $Model=new diaporamaModel();
            $diaporama=$Model->getDiaporama();
            return $diaporama;
        }
        //get news by id
        public function getNewsById($id){
            $id=strip_tags(trim($id));
            $Model=new newsModel();
            $news=$Model->getNewsById($id);
            return $news;
        }
        //get newsPage
        public function getNewsPage(){
            $Model=new newsPageModel();
            $news=$Model->getNewsPage();
            return $news;
        }
        //get params
        public function getParams(){
            $Model=new paramsModel();
            $params=$Model->getParams();
            return $params;
        }
        //get saison
        public function getSaison(){
            $Model=new saisonModel();
            $saisons=$Model->getSaisons();
            return $saisons;
        }
        //get fete
        public function getFete(){
            $Model=new recipeModel();
            $fetes=$Model->getFete();
            return $fetes;
        }
        //add recipe
        public function addRecipe(){
            $titre=strip_tags(trim($_POST['titre']));
            $description=strip_tags(trim($_POST['description']));
            $timePreparation=strip_tags(trim($_POST['timePreparation']));
            $timeRepo=strip_tags(trim($_POST['timeRepo']));
            $timeCuisson=strip_tags(trim($_POST['timeCuisson']));
            $imgPath=strip_tags(trim($_POST['imgPath']));
            $videoPath=strip_tags(trim($_POST['videoPath']));
            $categorieID=strip_tags(trim($_POST['categorieID']));
            $calories=strip_tags(trim($_POST['calories']));
            $difficulte=strip_tags(trim($_POST['difficulte']));
            $userID=strip_tags(trim($_POST['userID']));
            $Model=new recipeModel();
            $recipe=$Model->addRecipe($titre, $categorieID, $difficulte, $timePreparation, $timeRepo, $timeCuisson, $imgPath, $videoPath, $calories, $description, $userID);
            if($recipe){
                return $recipe;
            }else{
                header('Location: index.php');
            }
        }

        public function rateRecipe(){
            session_start();
            $id=strip_tags(trim($_POST['id']));
            $note=intval(strip_tags(trim($_POST['note'])));
            $userID=$_SESSION['user']['userID'];
            $Model=new recipeModel();
            $recipe=$Model->rateRecipe($id,$note,$userID);
            return $recipe;
        }


    }
