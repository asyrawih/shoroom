<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Customer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Customer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'city'
    ];


    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();

        if ($user->is_admin or $user->is_counter) {
            return $query;
        }
        return $query->where('user_id', $user->id);
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

            BelongsTo::make('Sales', 'sales', User::class)
                ->searchable(),

            Text::make('SOLD TO PARTY')
                ->onlyOnForms()
                ->rules('required', 'string', 'unique:customers,sold_to_party,{{resourceId}}'),

            Text::make('SOLD TO PARTY', function () {
                return $this->format_stp;
            }),

            Text::make('SHIP TO ID', function () {
                return $this->format_sti;
            }),

            Text::make('SHIP TO ID')
                ->onlyOnForms()
                ->rules('required', 'string', 'unique:customers,ship_to_id,{{resourceId}}'),

            Text::make('NAME')
                ->rules('required', 'string'),

            Text::make('Phone Number')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Kota', 'city')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Virtual Account')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Ktp', 'ktp')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Alamat', 'address')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Info Scc', 'info_scc')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Npwp', 'npwp')
                ->hideFromIndex()
                ->rules('required', 'string'),

            HasMany::make('Units', 'units', Unit::class),
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

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return "$this->name ($this->format_sti)";
    }
}
