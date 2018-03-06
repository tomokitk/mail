<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Import extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // protected $guarded = ['id'];
    protected $fillable = [
        "company",
        "positon",
        "position",
        "e_mail",
        "tel",
        "fax",
        "url",
        "trade_day",
    ];
}
