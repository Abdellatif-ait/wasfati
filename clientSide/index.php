<?php 
    require_once __DIR__.'/Views/Layout.php';
    $layout = new layout();
    $layout->head("hi this is a test","this is a test");
    $layout->navbar();
    $layout->swipper();
    $layout->card(1,'google','TEST',"description description description descriptiondescription description descript iondescriptio ndescription description description vaaaaaa descriptiondescription description v ");
    $layout->footer();
?>
