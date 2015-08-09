<?php
/**
 * page
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace boolive\widgets\view_page;

use boolive\basic\widget_autolist\widget_autolist;
use boolive\core\data\Data;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class view_page extends widget_autolist
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
        return parent::show($v, $request);
    }

    function getList(Request $request, &$cond = [])
    {
        $cond = Data::unionCond($cond, [
            'from' => $request['REQUEST']['object'],
            'select' => 'properties',
            'depth' => 1
        ]);
        return Data::find($cond);
    }
}