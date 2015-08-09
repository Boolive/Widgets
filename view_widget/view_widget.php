<?php
/**
 * View widget in content
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace boolive\widgets\view_widget;

use boolive\basic\widget\widget;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class view_widget extends widget
{
    function startRule()
    {
        return Rule::arrays([
            'REQUEST' => Rule::arrays([
                'object' => Rule::entity(['is','/vendor/boolive/basic/widget'])->required(),
            ])
        ]);
    }

    function show($v, Request $request)
    {
        $v['result'] = $request['REQUEST']['object']->linked()->start($request);
        return parent::show($v, $request);
    }
}