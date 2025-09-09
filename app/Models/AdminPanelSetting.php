<?php

namespace App\Models;

use App\Enums\StatusActiveEnum;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminPanelSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug;


    protected $table = 'admin_panel_settings';

    protected $fillable = [
        'company_name',
        'slug',
        'phone',
        'email',
        'address',
        'general_alert',
        'active',
        'created_by',
        'updated_by',
        'com_code'
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('company_name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }



    protected $casts = [
        'active' => StatusActiveEnum::class,
    ];
}