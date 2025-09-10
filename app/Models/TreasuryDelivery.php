<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\StatusActiveEnum;

class TreasuryDelivery extends Model
{
    use HasFactory;

    protected $table = 'treasury_deliveries';

    protected $fillable = [
        'treasury_id',
        'treasuries_can_delivery',
        'active',
        'created_by',
        'updated_by',
        'com_code'
    ];



    public function treasury()
    {
        return $this->belongsTo(Treasury::class, 'treasury_id');
    }


      public function treasuriesCanDelivery()
    {
        return $this->belongsTo(Treasury::class, 'treasuries_can_delivery');
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