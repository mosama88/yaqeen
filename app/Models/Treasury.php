<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\Treasury\TreasuryIsMaster;

class Treasury extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'treasuries';

    protected $fillable = [
        'name',
        'slug',
        'is_master',
        'last_payment_receipt',
        'last_collection_receipt',
        'created_by',
        'updated_by',
        'com_code'
    ];


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


    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }



    protected $casts = [
        'is_master' => TreasuryIsMaster::class,
    ];
}
