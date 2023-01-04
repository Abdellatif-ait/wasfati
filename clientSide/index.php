<?php 
    require_once __DIR__.'/Views/Layout.php';
    $Card1=(Object) [
        'id'=>1,
        'url'=>'Utils/test.jfif',
        'title'=>'Recipe',
        'description'=>"description description description descriptiondescription description descript iondescriptio ndescription description description vaaaaaa descriptiondescription description v "
    ];
    $List=array($Card1,$Card1,$Card1,$Card1,$Card1,$Card1);
    $Category=(Object) [
        'id'=>1,
        'title'=>'Entrées',
        'List'=>$List
    ];
    $recipe=(Object) [
        'id'=>1,
        'title'=>'Recipe',
        'rate'=>4,
        'imgPath'=>'Utils/test.jfif',
        'videoPath'=>'Ik9HBdOKDWw',
        'ingredients'=>['test1','test2'],
        'steps'=>['test1','test2'],
        'timePreparation'=>30,
        'timeRepo'=>30,
        'timeCuisson'=>30,
        'difficulte'=>'facile',
        'calories'=>120,
        'description'=>"description description description descriptiondescription description descript iondescriptio ndescription description description vaaaaaa descriptiondescription description v "
    ];
    $news=(Object) [
        'id'=>1,
        'title'=>'Recipe',
        'imgPath'=>'Utils/test.jfif',
        'videoPath'=>'Ik9HBdOKDWw',

        'description'=>"description description description descriptiondescription description descript iondescriptio ndescription description description vaaaaaa descriptiondescription description v "
    ];
    $ListCategories=array($Category,$Category,$Category);
    $layout = new layout();
    $layout->head("hi this is a test","this is a test");
    $layout->navbar();
    //$layout->listView($List);
    $layout->detailPage($recipe);
    // $layout->swipper($List);
    // $layout->categories($ListCategories);
    $layout->footer();
?>
