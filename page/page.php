<?php
/**
 * page
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace boolive\widgets\page;

use boolive\basic\widget\widget;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class page extends widget
{
    function startRule()
    {
        return Rule::arrays([
            'REQUEST' => Rule::arrays([
                'object' => Rule::entity(['is','/vendor/boolive/basic/page'])->required(),
            ])
        ]);
    }

    function show($v, Request $request)
    {
        $page = $request['REQUEST']['object'];
        $v['title'] = $page->title->value();
        $v['text'] = $page->text->value();
        return parent::show($v, $request);
    }
}