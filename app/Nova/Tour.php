<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Tour extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tour';

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
        'id', 'name', 'description'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function fields (Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->rules('required', 'min:3', 'max:50'),
            Textarea::make('Description')->rules('max:500'),
            Number::make('price')->rules('integer', 'required', 'min:1')->sortable(),
            BelongsTo::make('Seller', 'seller', 'App\Nova\User')->sortable(),
            BelongsTo::make('Country')->sortable(),
            BelongsTo::make('Main image', 'MainImg', 'App\Nova\Media')->hideFromIndex(),
            BelongsTo::make('Category')->sortable()->hideFromIndex(),
            BelongsTo::make('Tour type', 'tourType', 'App\Nova\TourType')->sortable()->hideFromIndex(),
            Date::make('Start at')->sortable()->hideFromIndex()->format('DD.MM.YYYY' ),
            Date::make('Finish at')->sortable()->hideFromIndex()->format('DD.MM.YYYY' ),
            BelongsTo::make('Start location', 'startLocation', 'App\Nova\Location')->sortable()->hideFromIndex(),
            Boolean::make('For children')->hideFromIndex(),
            Boolean::make('recommended')->hideFromIndex(),
            Boolean::make('hot')->hideFromIndex(),
            Boolean::make('advertisement')->hideFromIndex(),
            BelongsTo::make('Nutrition')->hideFromIndex(),
            BelongsTo::make('hotel')->hideFromIndex(),
            BelongsToMany::make('Images', 'medias', 'App\Nova\Media'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function cards (Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function filters (Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses (Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function actions (Request $request)
    {
        return [];
    }
}
