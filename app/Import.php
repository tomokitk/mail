<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
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
