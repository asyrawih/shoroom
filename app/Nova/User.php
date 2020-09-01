<?php

namespace App\Nova;

use Illuminate\Http\Request;
use KABBOUCHI\NovaImpersonate\Impersonate;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\User::class;

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
        'id', 'name', 'email', 'sn_employee'
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();

        // Jika user sama dengan admin maka tampilkan semua list user nya
        if ($user->is_admin) {
            return $query;
        }
        // Ambil Data User Yang sama dengan user yang sedang login sekarang
        return $query->where('id', $user->id);
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

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Text::make('SN EMPLOYEE')
                ->hideFromIndex()
                ->updateRules('required', 'string', 'unique:users,sn_employee,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Text::make('Phone Number', 'phone_number')
                ->hideFromIndex()
                ->rules('required', 'string'),

            Text::make('Jabatan', 'jabatan')
                ->hideFromIndex()
                ->rules('required', 'string'),


            Boolean::make('Is Admin', 'is_admin')->canSee(function ($request) {
                return $request->user()->is_admin;
            }),

            Boolean::make('Is Sales', 'is_sales')->canSee(function ($request) {
                return $request->user()->is_admin;
            }),

            Boolean::make('Werhouse Men', 'is_warehose')->canSee(function ($request) {
                return $request->user()->is_admin;
            }),

            Boolean::make('Is Counter', 'is_counter')->canSee(function ($request) {
                return $request->user()->is_admin;
            }),

            HasMany::make('Customers', 'customers', Customer::class),

            Impersonate::make($this)->withMeta([
                'redirect_to' => '/admin/resources/users'
            ]),

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
        return "$this->name ($this->email)";
    }
}
