<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;

class SearchController extends Controller
{
    public function search(Request $request){

        #キーワード受け取り
        $keyword = $request->input('keyword');
        $keyword2 = $request->input('keyword2');
        $keyword3 = $request->input('keyword3');
        $keyword4 = $request->input('keyword4');
        $keyword5 = $request->input('keyword5');
        $keyword6 = $request->input('keyword6');
        $keyword7 = $request->input('keyword7');
        $keyword8 = $request->input('keyword8');
        $keyword9 = $request->input('keyword9');
        $keyword10 = $request->input('keyword10');
        $keyword11 = $request->input('keyword11');
        $keyword12 = $request->input('keyword12');
        $keyword13 = $request->input('keyword13');
        $keyword14 = $request->input('keyword14');
        $keyword15 = $request->input('keyword15');
        $keyword16 = $request->input('keyword16');
        $keyword17 = $request->input('keyword17');
        $keyword18 = $request->input('keyword18');
        
        
        #クエリ生成
        $query = Maillist::query();

        #もしキーワードがあったら
        if(!empty($keyword)){
        $query->where('name','like','%'.$keyword.'%');
        }
        if(!empty($keyword2)){
        $query->where('company','like','%'.$keyword2.'%');
        }
        
        if(!empty($keyword3)){
        $query->where('department','like','%'.$keyword3.'%');
        }
        
        if(!empty($keyword4)){
        $query->where('positon','like','%'.$keyword4.'%');
        }

        if(!empty($keyword5)){
        $query->where('e_mail','like','%'.$keyword5.'%');
        }

        if(!empty($keyword6)){
        $query->where('postcode','like','%'.$keyword6.'%');
        }
        
        if(!empty($keyword7)){
        $query->where('adress','like','%'.$keyword7.'%');
        }

        if(!empty($keyword8)){
        $query->where('TELconpany','like','%'.$keyword8.'%');
        }

        if(!empty($keyword9)){
        $query->where('TELdepartment','like','%'.$keyword9.'%');
        }

        if(!empty($keyword10)){
        $query->where('TELdirect','like','%'.$keyword10.'%');
        }

        if(!empty($keyword11)){
        $query->where('FAX','like','%'.$keyword11.'%');
        }

        if(!empty($keyword12)){
        $query->where('phonenumber','like','%'.$keyword12.'%');
        }

        if(!empty($keyword13)){
        $query->where('URL','like','%'.$keyword13.'%');
        }

        if(!empty($keyword14)){
        $query->where('trade_day','like','%'.$keyword14.'%');
        }
        
        if(!empty($keyword15)){
        $query->where('eightfrinds_num','like','%'.$keyword15.'%');
        }

        if(!empty($keyword16)){
        $query->where('now_dating','like','%'.$keyword16.'%');
        }

        if(!empty($keyword17)){
        $query->where('question','like','%'.$keyword17.'%');
        }

        if(!empty($keyword18)){
        $query->where('id','like','%'.$keyword18.'%');
        }

        $mail = $query->get();

        //dd($mail);
        return view('maillist')->with('imports',$mail)
                               ->with('keyword',$keyword)
                               ->with('keyword2',$keyword2)
                               ->with('keyword3',$keyword3)
                               ->with('keyword4',$keyword4)
                               ->with('keyword5',$keyword5)
                               ->with('keyword6',$keyword6)
                               ->with('keyword7',$keyword7)
                               ->with('keyword8',$keyword8)
                               ->with('keyword9',$keyword9)
                               ->with('keyword10',$keyword10)
                               ->with('keyword11',$keyword11)
                               ->with('keyword12',$keyword12)
                               ->with('keyword13',$keyword13)
                               ->with('keyword14',$keyword14)
                               ->with('keyword15',$keyword15)
                               ->with('keyword16',$keyword16)
                               ->with('keyword17',$keyword17)
                               ->with('keyword18',$keyword18);


}


}

