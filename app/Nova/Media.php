<?php

namespace App\Nova;


use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;

class Media extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Media';

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
        'id',
    ];

    public static function label()
    {
        return __('Фотографии');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Фотография');
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
            Image::make('Image', 'path')
                ->disk('public')
                ->path('images')
                ->thumbnail(function () {
                    return $this->path ? Storage::disk('public')->url("images/{$this->path}") : null;
                })
                ->preview(function () {
                    return $this->path ? Storage::disk('public')->url("images/{$this->path}") : null;
                })
//                ->store(function (Request $request, $model) {
//
//                    $path = $request->path->store('public/images');
//
//
//                    return [
//                       // 'path' => substr($path, 7)
                   //        'path' => basename($path)
//
                      //'path' => substr($path, 14)
//                    ];
//                })
////
                ->storeOriginalName('name')
                ->delete(function () {
                    Storage::disk('public')->delete("images/{$this->path}");
                })
                ->prunable()
               ->disableDownload(),

            BelongsToMany::make('Туры', 'tours', 'App\Nova\Tour'),
            HasMany::make('Основное изображение для туров:', 'mainImgTours', 'App\Nova\Tour'),
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
