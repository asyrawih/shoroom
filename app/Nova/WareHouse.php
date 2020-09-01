<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class WareHouse extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\WareHouse::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'so';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'so', 'date_gi'
    ];

    public static function relatableUsers(NovaRequest $request, $query)
    {
        return $query->where('is_warehose', true);
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Warehouse Men', 'warehouse', User::class),

            BelongsTo::make('Customer', 'customer', Customer::class)
                ->searchable(),

            Text::make('SO')
                ->rules('required', 'string'),

            Text::make('OD')
                ->rules('required', 'string'),

            Text::make('Customer Recv', 'cust_recv')
                ->rules('required'),

            Date::make('Date Gi' , 'date_gi')
                ->rules(['required', 'date_format:Y-m-d'])
                ->withMeta([
                    'value' => now()->format('Y-m-d'),
                ])
                ->onlyOnForms(),

            Date::make('Date GI' , function(){
                return $this->format_date;
            })
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
