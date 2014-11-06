<div class="widget widget_autolist part">
    <h1><?=$v['title']?></h1>
<?php
    $list = $v['views']->arrays(\boolive\core\values\Rule::string());
    foreach ($list as $item){
        echo $item;
    }
?>
</div>