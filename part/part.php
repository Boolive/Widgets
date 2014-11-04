<?php
/**
 * part
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace boolive\widgets\part;

use boolive\basic\widget_autolist\widget_autolist;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class part extends widget_autolist
{
    function startRule()
    {
        return Rule::arrays([
            'REQUEST' => Rule::arrays([
                'object' => Rule::entity(['is','/vendor/boolive/basic/part'])->required(),
            ])
        ]);
    }

    function show($v, Request $request)
    {
        $part = $request['REQUEST']['object'];
        $v['title'] = $part->title->value();
//        $v['text'] = $page->text->value();
        return parent::show($v, $request);
    }
} 