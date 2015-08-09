<?php
/**
 * View text object
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace boolive\widgets\view_text;

use boolive\basic\widget\widget;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class view_text extends widget
{
    function startRule()
    {
        return Rule::arrays([
            'REQUEST' => Rule::arrays([
                'object' => Rule::entity(['is','/vendor/boolive/basic/page/text'])->required(),
            ])
        ]);
    }

    function show($v, Request $request)
    {
        $v['value'] = $request['REQUEST']['object']->value();
        return parent::show($v, $request);
    }
} 