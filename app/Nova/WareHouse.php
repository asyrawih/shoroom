<?php

namespace App\Nova;

use App\WareHouse as AppWareHouse;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outhebox\NovaHiddenField\HiddenField;

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

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'customer' => ['ship_to_id'],
    ];

    /**
     * Query Specifik relatable
     * 
     */
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

            BelongsTo::make('Warehouse Men', 'warehouse', User::class),

            BelongsTo::make('Customer', 'customer', Customer::class)
                ->searchable(),

            Text::make('Sales', function () {
                return $this->customer->sales->name ?? '-';
            })->onlyOnIndex(),

            Text::make('SO')
                ->rules('required', 'numeric'),

            Text::make('OD')
                ->creationRules('required', 'numeric')
                ->rules('required', 'numeric'),

            Text::make('Customer Recv', 'cust_recv')
                ->hideWhenCreating()
                ->updateRules('required', 'string'),

            Select::make('Status', 'status')
                ->rules('required')
                ->displayUsingLabels($this)
                ->hideWhenCreating()
                ->default(function () {
                    return 'Taken';
                })
                ->options([
                    'Taken' => 'Taken'
                ]),

            Date::make('Date Gi', 'date_gi')
                ->hideWhenUpdating()
                ->hideFromIndex()
                ->rules(['required', 'date_format:Y-m-d']),

            HiddenField::make('Date Recv', 'date_recv')
                ->defaultValue($this->current_date)
                ->hideFromIndex()
                ->hideFromDetail()
                ->hideWhenCreating(),

            Date::make('Date', 'date_gi')
                ->onlyOnIndex(),

            Date::make('Date Recv', 'date_recv')
                ->onlyOnIndex(),
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

    public static function label()
    {
        return 'Warehouse';
    }
}
