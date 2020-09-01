<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Unit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Unit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'sn_unit';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'sn_unit'
    ];


    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Customer', 'customer', Customer::class)
                ->showCreateRelationButton()
                ->searchable(),

            Text::make('Serial Unit', 'sn_unit')
                ->hideWhenUpdating()
                ->creationRules('required', 'string', 'unique:units,sn_unit,{{resourceID}}'),

            Text::make('Model Unit', 'model_unit')
                ->rules('required', 'string'),

            Text::make('Deskripisi', 'desc')
                ->rules('required', 'string'),

            Text::make('No Unit', 'no_unit')
                ->rules('required', 'string'),

            Text::make('Lokasi Unit', 'lokasi_unit')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Kota', 'kota')
                ->rules('required', 'string'),

            Text::make('HOO', 'hoo')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('SMU', 'smu')
                ->rules('required', 'string'),

            Text::make('Remark', 'remark')
                ->hideFromIndex()
                ->nullable(),
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
