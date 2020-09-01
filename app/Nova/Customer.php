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
        'id', 'name', 'city', 'sold_to_party', 'ship_to_id'
    ];


    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();

        if ($user->is_admin or $user->is_counter or $user->is_warehose) {
            return $query;
        }
        return $query->where('user_id', $user->id);
    }

    public static function relatableUsers(NovaRequest $request, $query)
    {
        return $query->where('is_sales', true);
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
            Text::make('NAME')
                ->rules('required', 'string'),

            BelongsTo::make('Sales', 'sales', User::class)
                ->searchable(),


            Text::make('SHIP TO ID', 'ship_to_id', function () {
                return $this->format_sti;
            })
                ->onlyOnIndex(),

            Text::make('SOLD TO PARY', 'sold_to_party', function () {
                return $this->format_stp;
            })
                ->onlyOnIndex(),

            Text::make('SOLD TO PARTY')
                ->onlyOnForms()
                ->rules('required', 'string', 'unique:customers,sold_to_party,{{resourceId}}'),

            Text::make('SHIP TO ID')
                ->onlyOnForms()
                ->rules('required', 'string', 'unique:customers,ship_to_id,{{resourceId}}'),

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

            HasMany::make('Warehouse', 'warehouses', WareHouse::class),
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
