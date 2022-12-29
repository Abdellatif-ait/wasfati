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
    $ListCategories=array($Category,$Category,$Category);
    $layout = new layout();
    $layout->head("hi this is a test","this is a test");
    $layout->navbar();
    $layout->swipper($List);
    $layout->categories($ListCategories);
    $layout->footer();
?>
