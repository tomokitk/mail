<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\View\Middleware\ShareErrorsFromSession;
// use App\Http\Requests\FormIndexRequest;



class FormIndexRequest extends FormRequest
{

    // protected $errorBag = 'formError';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'e_mail' => 'required|email',
            // 'postcode' =>'digits:7',
            // 'TEL' =>'present|size:12',
            // 'TELdepartment' =>'present|size:12',
            // 'TELdirect' =>'present|size:12',
            // 'FAX' =>'present|size:12',
            // 'phonenumber' =>'present|size:13',
            // 'URL' => 'present|url',
            // 'trade_day' => 'present|date',
            // 'eightfrinds_num' => 'present|number',
        ];
    }
    // public function messages() 
    // {
    //     return [
    //         'e_mail.required' => "アドレスは必須です",
    

            
            
    
    

}
