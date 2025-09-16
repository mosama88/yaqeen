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
use App\Enums\Inventory\ItemTypeEnum;

class InvItemCard extends Model implements HasMedia

{
    use HasFactory, InteractsWithMedia, HasSlug;

    protected $table = 'inv_item_cards';

    protected $fillable = [
        'name',
        'item_code',
        'bar_code',
        'slug',
        'item_type',
        'inv_item_category_id',
        'parent_inv_item_card_id',
        'does_has_retail_unit',
        'retail_uom',
        'inv_unit_id',
        'retail_uom_qty_parent',
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
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function invItemCategory()
    {
        return $this->belongsTo(InvItemCategory::class, 'inv_item_category_id');
    }

    public function invUnit()
    {
        return $this->belongsTo(InvUnit::class, 'inv_unit_id');
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
        'item_type' => ItemTypeEnum::class,
    ];
}
