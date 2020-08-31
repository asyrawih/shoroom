<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Proses extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Proses::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'no_unit';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

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

            BelongsTo::make('Employee', 'employee', User::class),

            BelongsTo::make('Unit', 'unit', Unit::class),

            BelongsTo::make('Plant', 'plant', Plant::class),

            BelongsTo::make('Customer', 'customer', Customer::class),

            Text::make('No Unit', 'no_unit')
                ->rules('required', 'string'),

            Textarea::make('Lokasi Unit', 'lokasi_unit')
                ->rules('required', 'string'),

            Text::make('Kota', 'kota')
                ->rules('required', 'string'),

            Text::make('HOO', 'hoo')
                ->rules('required', 'string'),

            Text::make('SMU', 'smu')
                ->rules('required', 'string'),

            Textarea::make('remark')
                ->rules('string'),

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

    public static function singularLabel()
    {
        return 'Proses';
    }
}
