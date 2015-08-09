<?php
/**
 * View part
 * @aurhor Vladimir Shestakov
 * @version 1.0
 */
namespace boolive\widgets\view_part;

use boolive\basic\widget_autolist\widget_autolist;
use boolive\core\data\Data;
use boolive\core\request\Request;
use boolive\core\values\Rule;

class view_part extends widget_autolist
{
    function startRule()
    {
        return Rule::arrays([
            'REQUEST' => Rule::arrays([
                'object' => Rule::entity(['is','/vendor/boolive/basic/part'])->required(),
                'page'=> Rule::int()->default(1)->required() // номер страницы
            ])
        ]);
    }

    function show($v, Request $request)
    {
        $part = $request['REQUEST']['object'];
        $v['title'] = $part->title->value();
//        $v['text'] = $page->text->value();
        $v['list'] = $this->getList($request);
        $v['page_numbering'] = $this->page_numbering->linked()->start($request);
        return parent::show($v, $request);
    }

    function getList(Request $request, &$cond = [])
    {
        $count_per_page = $this->count_per_page->is_exists()? max(1, $this->count_per_page->value()) : 10;
        $cond['limit'] = [
            ($request['REQUEST']['page'] - 1) * $count_per_page,
            $count_per_page
        ];
        $result = parent::getList($request, $cond);

        if (count($result) < $count_per_page){
            $count = $request['REQUEST']['page'];
        }else{
            $count = ceil(Data::find(Data::unionCond([
                'calc' => 'count'
            ],$cond)) / $count_per_page);
        }
        $request->mix(['REQUEST' => ['page_count' => $count]]);
        return $result;
    }
} 