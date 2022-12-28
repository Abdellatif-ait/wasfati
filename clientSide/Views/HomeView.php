<?php

class home {
    const TITLE= "Home Page";
    const DESCRIPTION= "Home Page";
    public function swipper(){
        ?>
            <div>
                <div>
                    <div>
                        <div>Title</div>
                        <div>description</div>
                        <div>
                            <button>Afficher la suite</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    public function category($Category){
        ?>
            <div>
                <div>
                    <div> <?php echo $Category->title ?> </div>
                </div>
            </div>
        <?php
    }
}
?>