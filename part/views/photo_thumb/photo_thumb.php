<?php
/**
 * photo_thumb
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace boolive\widgets\part\views\photo_thumb;

use boolive\basic\widget\widget;
use boolive\core\data\Entity;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class photo_thumb extends widget
{
    function startRule()
    {
        return Rule::arrays([
            'REQUEST' => Rule::arrays([
                'object' => Rule::entity(['is','/vendor/boolive/basic/image'])->required(),
                'test' => Rule::transform('scale',200,200)
            ])
        ]);
    }

    function show($v, Request $request)
    {
        /** @var Entity $image */
        $image = $request['REQUEST']['object'];
//        $v['title'] = $page->title->value();
        $v['src'] = $image->file();
        //
//        $v['url'] = Request::url($page->uri());
        return parent::show($v, $request);
    }
}