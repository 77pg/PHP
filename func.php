<?php
require_once('Playground.php');
require_once('Playground2.php');
(new Playground('森林谷'))
->buildRollerCoaster(function($name){
    echo "<h2>{$name}遊樂園 建立了雲霄飛車<br></h2>";
})
->buildFerrisWheel(function($name){
    echo "<h4>{$name}遊樂園 建立了摩天輪<br></h4>";
});
(new Playground('乾燥沙漠'))
->buildFerrisWheel(function($name){
    echo "<div style='color:goldenrod'><h4>{$name}遊樂園 建立了摩天輪<br></h4></div>";
});
(new Playground2('乾燥沙漠1'))
->plantTrees(200,function($name,$value){
    echo "<div style='color:darkgreen'><h4>{$name}遊樂園 種了{$value}棵樹<br></h4></div>";
});