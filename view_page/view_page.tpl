<div class="widget view_page">
<?php
    $list = $v['views']->arrays(\boolive\core\values\Rule::string());
    foreach ($list as $item){
        echo $item;
    }
?>
</div>