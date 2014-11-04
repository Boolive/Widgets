<div class="widget widget_autolist part">
    Раздел. "<?=$v['title']?>"
<?php
    $list = $v['views']->arrays(\boolive\core\values\Rule::string());
    foreach ($list as $item){
        echo $item;
    }
?>
</div>