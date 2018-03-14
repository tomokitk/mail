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
        "position",
        "e_mail",
        "tel",
        "fax",
        "url",
        "trade_day",
    ];
    // public function authorize()
    // {
    //     return true;
    // }
    // public function rules()
    // {
    //     return [
    //         'e_mail' => 'required',
    //         'e_mail' => 'email',
    //         // //to do  以下の設定
    //         'postcode' =>'digits:7',
    //         'TEL' =>'size:13',
    //         'TELdepartment' =>'size:12',
    //         'TELdirect' =>'size:12',
    //         'FAX' =>'size:12',
    //         'phonenumber' =>'size:13',
    //         'URL' => 'url',
    //         'trade_day' => 'date',
    //         'eightfrinds_num' => 'number',
    //     ];
    // }



}

