<?php

namespace App\Nova;

use App\Nova\Actions\MarkAsAdvertisement;
use App\Nova\Filters\Advertisement;
use App\Nova\Filters\HotTours;
use App\Nova\Filters\Recommended;
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

    public function subtitle ()
    {
        return $this->country->name;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'description'
    ];

    public static function label()
    {
        return __('Туры');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Тур');
    }

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
            Text::make('Name')->rules('required', 'min:3', 'max:50')->rules('required'),
            Textarea::make('Description')->rules('max:500'),
            Number::make('price')->rules('integer', 'required', 'min:1')->sortable(),
            BelongsTo::make('Seller', 'seller', 'App\Nova\User')->sortable()->rules('required'),
            BelongsTo::make('Country')->sortable()->rules('required'),
            BelongsTo::make('Main image', 'MainImg', 'App\Nova\Media')->hideFromIndex(),
            BelongsTo::make('Category')->sortable()->hideFromIndex(),
            BelongsTo::make('Tour type', 'tourType', 'App\Nova\TourType')->sortable()->hideFromIndex()->rules('required'),
            Date::make('Start at')->sortable()->hideFromIndex()->format('DD.MM.YYYY' )->rules('after:tomorrow', 'required'),
            Date::make('Finish at')->sortable()->hideFromIndex()->format('DD.MM.YYYY' )->rules('after:start_at', 'required'),
            BelongsTo::make('Start location', 'startLocation', 'App\Nova\Location')->sortable()->hideFromIndex()
                ->rules('required'),
            Boolean::make('For children')->hideFromIndex(),
            Boolean::make('recommended')->hideFromIndex(),
            Boolean::make('hot')->hideFromIndex(),
            Boolean::make('advertisement')->hideFromIndex(),
            BelongsTo::make('Nutrition')->hideFromIndex()->rules('required'),
            BelongsTo::make('hotel')->hideFromIndex()->rules('required'),
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
        return [
            new HotTours,
            new Advertisement,
            new Recommended
        ];
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
        return [
            new MarkAsAdvertisement

        ];
    }
}
