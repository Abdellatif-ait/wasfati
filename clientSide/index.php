<?php 
    require_once __DIR__.'/Views/Layout.php';
    $layout = new layout();
    $layout->head("hi this is a test","this is a test");
    $layout->navbar();
    // $layout->card('google','TEST',"description");
    $layout->footer();

?>