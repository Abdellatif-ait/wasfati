<?php
    class adminController{
        public function authDisplay(){
            require_once('Views/adminComponent.php');
            $view=new adminComponents();
            $view->authDisplay();
        }
        public function dashboard(){
            require_once('Views/adminComponent.php');
            $view=new adminComponents();
            $view->navbar();
            $view->dashboard();
        }
        public function mentoring(){
            require_once('Views/adminComponent.php');
            $view=new adminComponents();
            $view->navbar();
            $view->mentoring();
        }

    }
?>