<?php
namespace Modules\Event\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Event\Models\Event;
use Modules\Location\Models\Location;

class ListEvent extends BaseBlock
{


    public function getName()
    {
        return __('Event: List Items');
    }
    public function getOptions(): array
    {
        return [
            'settings' => [
            [
                'id'        => 'title',
                'type'      => 'input',
                'inputType' => 'text',
                'label'     => __('Title')
            ],
            [
                'id'        => 'desc',
                'type'      => 'input',
                'inputType' => 'text',
                'label'     => __('Desc')
            ],
            [
                'id'        => 'number',
                'type'      => 'input',
                'inputType' => 'number',
                'label'     => __('Number Item')
            ],
            [
                'id'            => 'style',
                'type'          => 'radios',
                'label'         => __('Style'),
                'values'        => [
                    [
                        'value'   => 'normal',
                        'name' => __("Normal")
                    ],
                    [
                        'value'   => 'carousel',
                        'name' => __("Slider Carousel")
                    ]
                ]
            ],
            [
                'id'      => 'location_id',
                'type'    => 'select2',
                'label'   => __('Filter by Location'),
                'select2' => [
                    'ajax'  => [
                        'url'      => route('location.admin.getForSelect2'),
                        'dataType' => 'json'
                    ],
                    'width' => '100%',
                    'allowClear' => 'true',
                    'placeholder' => __('-- Select --')
                ],
                'pre_selected'=>route('location.admin.getForSelect2',['pre_selected'=>1])
            ],
            [
                'id'            => 'order',
                'type'          => 'radios',
                'label'         => __('Order'),
                'values'        => [
                    [
                        'value'   => 'id',
                        'name' => __("Date Create")
                    ],
                    [
                        'value'   => 'title',
                        'name' => __("Title")
                    ],
                ]
            ],
            [
                'id'            => 'order_by',
                'type'          => 'radios',
                'label'         => __('Order By'),
                'values'        => [
                    [
                        'value'   => 'asc',
                        'name' => __("ASC")
                    ],
                    [
                        'value'   => 'desc',
                        'name' => __("DESC")
                    ],
                ]
            ],
            [
                'type'=> "checkbox",
                'label'=>__("Only featured items?"),
                'id'=> "is_featured",
                'default'=>true
            ],
            [
                'id'           => 'custom_ids',
                'type'         => 'select2',
                'label'        => __('List by IDs'),
                'select2'      => [
                    'ajax'        => [
                        'url'      => route('event.admin.getForSelect2'),
                        'dataType' => 'json'
                    ],
                    'width'       => '100%',
                    'multiple'    => "true",
                    'placeholder' => __('-- Select --')
                ],
                'pre_selected' => route('event.admin.getForSelect2', [
                    'pre_selected' => 1
                ])
            ],
        ],
            'category'=>__("Service Event")
        ];
    }

    public function content($model = [])
    {
        $list = $this->query($model);
        $data = [
            'rows'       => $list,
            'style_list' => $model['style'],
            'title'      => $model['title'],
            'desc'       => $model['desc'],
        ];
        return view('Event::frontend.blocks.list-event.index', $data);
    }

    public function contentAPI($model = []){
        $rows = $this->query($model);
        $model['data']= $rows->map(function($row){
            return $row->dataForApi();
        });
        return $model;
    }

    public function query($model){
        $model_event = Event::select("bravo_events.*")->with(['location','translation','hasWishList']);
        if(empty($model['order'])) $model['order'] = "id";
        if(empty($model['order_by'])) $model['order_by'] = "desc";
        if(empty($model['number'])) $model['number'] = 5;
        if (!empty($model['location_id'])) {
            $location = Location::where('id', $model['location_id'])->where("status","publish")->first();
            if(!empty($location)){
                $model_event->join('bravo_locations', function ($join) use ($location) {
                    $join->on('bravo_locations.id', '=', 'bravo_events.location_id')
                        ->where('bravo_locations._lft', '>=', $location->_lft)
                        ->where('bravo_locations._rgt', '<=', $location->_rgt);
                });
            }
        }
        if(!empty($model['is_featured']))
        {
            $model_event->where('bravo_events.is_featured',1);
        }
        if (!empty($model['custom_ids'])) {
            $model_event->whereIn("bravo_events.id", $model['custom_ids']);
        }
        $model_event->orderBy("bravo_events.".$model['order'], $model['order_by']);
        $model_event->where("bravo_events.status", "publish");
        $model_event->with('location');
        $model_event->groupBy("bravo_events.id");
        return $model_event->limit($model['number'])->get();
    }
}
