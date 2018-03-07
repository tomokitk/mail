<!DOCTYPE html>
<html lang="ja">
<style>
      

      

</style>



<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>input form</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   
  <div class="dialog hidden">
    <div id="mask" class=""></div>
    <div id="modal" class="">
      <p>hello i am tomoki</p>
      <p>id<input name="index" class="id" type="text" disabled></p>
      <p>company<input name="index" class="company" type="text"></p>
      <p>department<input name="index" class="department" type="text" value=""></p>
      <p>positon<input name="index" class="position" type="text" value=""></p>
      <p>name<input name="index" class="name" type="text" value=""></p>
      <p>e_mail<input name="index" class="e_mail" type="text" value=""></p>
      <p>postcode<input name="index" class="postcode" type="text" value=""></p>
      <p>adress<input name="index" class="address" type="text" value=""></p>
      <p>TEL<input name="index" class="TEL" type="text" value=""></p>
      <p>TELdepartment<input name="index" class="TELdepartment" type="text" value=""></p>
      <p>TELdirect<input name="index" class="TELdirect" type="text" value=""></p>
      <p>FAX<input name="index" class="FAX" type="text" value=""></p>
      <p>phonenumber<input name="index" class="phonenumber" type="text" value=""></p>
      <p>URL<input name="index" class="URL" type="text" value=""></p>
      <p>trade_day<input name="index" class="trade_day" type="text" value=""></p>
      <p>eightfrinds_num<input name="index" class="eightfriends_num" type="text" value=""></p>
      <p>now_dating<input name="index" class="now_dating" type="text" value=""></p>
      <p>question<input name="index" class="question" type="text" value=""></p>
      <br>
      <buton class="dialog_close">CLOSE</button>
      <br>
      <buton class="dialog_submit">SUBMIT</button>
    </div>
  </div>
  <!-- END: dialog -->
  <div class="users">
 <a href="/users">メール配信停止</a> 
 {{ csrf_field() }}
  </div>
  
  <script type="text/javascript" src="js/test.js"></script>
  <h1>管理者画面</h1>
  <form method="post" action="{{url('/import')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <p>ファイルの選択</p>
    <input type="file" name="csv_file" id="inputFile" >
    <input type="submit" name="csv_file"  value="csv_import">
    <div class="col-sm-4" style="padding:20px 0; padding-left:0px;"></div>
  </form>

  <form method="post" action="{{url('/export')}}" >
    {{ csrf_field() }}
    <!-- <nameでコントローラーに渡す。> -->
    <input type="submit"  value="csv export">

    @if(isset($keyword))
      <input type="hidden" name="name" value="{{$keyword}}">
    @else
      <input type="hidden" name="name" value="" >
    @endif

    @if(isset($keyword2))
      <input type="hidden" name="company" value="{{$keyword2}}">
    @else
      <input type="hidden" name="company" value="" >
    @endif

    @if(isset($keyword3))
      <input type="hidden" name="department" value="{{$keyword3}}">
    @else
      <input type="hidden" name="department" value="" >
    @endif

    @if(isset($keyword4))
      <input type="hidden" name="position" value="{{$keyword4}}">
    @else
      <input type="hidden" name="position" value="" >
    @endif

    @if(isset($keyword5))
      <input type="hidden" name="e_mail" value="{{$keyword5}}">
    @else
      <input type="hidden" name="e_mail" value="" >
    @endif

    @if(isset($keyword6))
      <input type="hidden" name="postcode" value="{{$keyword6}}">
    @else
      <input type="hidden" name="postcode" value="" >
    @endif

    @if(isset($keyword7))
      <input type="hidden" name="address" value="{{$keyword7}}">
    @else
      <input type="hidden" name="address" value="" >
    @endif

    @if(isset($keyword8))
      <input type="hidden" name="TEL" value="{{$keyword8}}">
    @else
      <input type="hidden" name="TEL" value="" >
    @endif

    @if(isset($keyword9))
      <input type="hidden" name="TELdepartment" value="{{$keyword9}}">
    @else
      <input type="hidden" name="TELdepartment" value="" >
    @endif

    @if(isset($keyword10))
      <input type="hidden" name="TELdirect" value="{{$keyword10}}">
    @else
      <input type="hidden" name="TELdirect" value="" >
    @endif

    @if(isset($keyword11))
      <input type="hidden" name="FAX" value="{{$keyword11}}">
    @else
      <input type="hidden" name="FAX" value="" >
    @endif

    @if(isset($keyword12))
      <input type="hidden" name="phonenumber" value="{{$keyword12}}">
    @else
      <input type="hidden" name="phonenumber" value="" >
    @endif

    @if(isset($keyword13))
      <input type="hidden" name="URL"value="{{$keyword13}}">
    @else
      <input type="hidden" name="URL" value="" >
    @endif

    @if(isset($keyword14))
      <input type="hidden" name="trade_day" value="{{$keyword14}}">
    @else
      <input type="hidden" name="trade_day" value="" >
    @endif

    @if(isset($keyword15))
      <input type="hidden" name="eightfriends_num" value="{{$keyword15}}">
    @else
      <input type="hidden" name="eightfriends_num" value="" >
    @endif

    @if(isset($keyword16))
      <input type="hidden" name="now_dating" value="{{$keyword16}}">
    @else
      <input type="hidden" name="now_dating" value="" >
    @endif

    @if(isset($keyword17))
      <input type="hidden" name="question" value="{{$keyword17}}">
    @else
      <input type="hidden" name="question" value="" >
    @endif

    @if(isset($keyword18))
      <input type="hidden" name="id" value="{{$keyword18}}">
    @else
      <input type="hidden" name="id" value="" >
    @endif

    @if(isset($keyword19))
      <input type="hidden" name="deleted_at" value="{{$keyword19}}">
    @else
      <input type="hidden" name="deleted_at" value="" >
    @endif
    
    
  </form>


  <form class="form-inline" action="{{('/search')}}" >
    <div class="form-group">
      @if(isset($keyword))
        <input type="text" name="keyword" value="{{$keyword}}" placeholder="名前">
      @else
        <input type="text" name="keyword" value="" placeholder="名前">
      @endif

      @if(isset($keyword2))
        <input type="text" name="keyword2" value="{{$keyword2}}" placeholder="会社名">
      @else
        <input type="text" name="keyword2" value="" placeholder="会社名">
      @endif

      @if(isset($keyword3))
          <input type="text" name="keyword3" value="{{$keyword3}}" placeholder="部門">
      @else
        <input type="text" name="keyword3" value="" placeholder="部門">
      @endif
        
      @if(isset($keyword4))
        <input type="text" name="keyword4" value="{{$keyword4}}" placeholder="役職名">
      @else
        <input type="text" name="keyword4" value="" placeholder="役職名">
      @endif
        
      @if(isset($keyword5))
        <input type="text" name="keyword5" value="{{$keyword5}}" placeholder="メールアドレス">
      @else
        <input type="text" name="keyword5" value="" placeholder="メールアドレス">
      @endif
    </div>

    <div class="form-group">
      @if(isset($keyword6))
        <input type="text" name="keyword6" value="{{$keyword6}}" placeholder="郵便番号">
      @else
        <input type="text" name="keyword6" value="" placeholder="郵便番号">
      @endif
      
      @if(isset($keyword7))
        <input type="text" name="keyword7" value="{{$keyword7}}" placeholder="住所">
      @else
      <input type="text" name="keyword7" value="" placeholder="住所">
      @endif

      @if(isset($keyword8))
        <input type="text" name="keyword8" value="{{$keyword8}}" placeholder="TEL会社">
      @else
        <input type="text" name="keyword8" value="" placeholder="TEL会社">
      @endif

      @if(isset($keyword9))
        <input type="text" name="keyword9" value="{{$keyword9}}" placeholder="TEL部門">
      @else
        <input type="text" name="keyword9" value="" placeholder="TEL部門">
      @endif
      
      @if(isset($keyword10))
        <input type="text" name="keyword10" value="{{$keyword10}}" placeholder="TEL直通">
      @else
        <input type="text" name="keyword10" value="" placeholder="TEL直通">
      @endif
    </div>

    <div class="form-group">
      @if(isset($keyword11))
        <input type="text" name="keyword11" value="{{$keyword11}}" placeholder="FAX">
      @else
        <input type="text" name="keyword11" value="" placeholder="FAX">
      @endif

      @if(isset($keyword12))
        <input type="text" name="keyword12" value="{{$keyword12}}" placeholder="郵便番号">
      @else
        <input type="text" name="keyword12" value="" placeholder="携帯番号">
      @endif

      @if(isset($keyword13))
        <input type="text" name="keyword13" value="{{$keyword13}}" placeholder="URL">
      @else
        <input type="text" name="keyword13" value="" placeholder="URL">
      @endif

      @if(isset($keyword14))
        <input type="text" name="keyword14" value="{{$keyword14}}" placeholder="名刺交換日">
      @else
        <input type="text" name="keyword14" value="" placeholder="名刺交換日">
      @endif
      
      @if(isset($keyword15))
        <input type="text" name="keyword15" value="{{$keyword15}}" placeholder="Eightでつながっている人数">
      @else
        <input type="text" name="keyword15" value="" placeholder="Eightでつながっている人数">
      @endif
    </div>

    <div class="form-group">
      @if(isset($keyword16))
        <input type="text" name="keyword16" value="{{$keyword16}}" placeholder="再データ化中の名刺">
      @else
        <input type="text" name="keyword16" value="" placeholder="再データ化中の名刺">
      @endif

      @if(isset($keyword17))
        <input type="text" name="keyword17" value="{{$keyword17}}" placeholder="'?'を含んだデータ">
      @else
        <input type="text" name="keyword17" value="" placeholder="'?'を含んだデータ">
      @endif

      @if(isset($keyword18))
        <input type="text" name="keyword18" value="{{$keyword18}}" placeholder="id">
      @else
        <input type="text" name="keyword18" value="" placeholder="id">
      @endif

      @if(isset($keyword19))
        <input type="text" name="keyword19" value="{{$keyword19}}" placeholder="配信停止日">>
      @else
        <input type="text" name="keyword19" value="" placeholder="配信停止日">
      @endif
    </div>

    <input type="submit" value="検索" class="btn btn-info"> 

  </form>

  <form class="form-inline" action="{{'/refresh'}}">
    <input type="submit" value="初期化">
  </form>
  <!--  </div> -->

  <style>
    .table4 {
    border-collapse: collapse;
    width: 250px;
    }
    .table4 th, .table4 td {
    border: 1px solid gray;
    }
    .col-md-4{
    padding-right: 15px;
    padding-left: 15px;
    }
  </style>


  <table class="table" border=1>
    <tr>
      <th>ID</th>
      <th>会社名</th>
      <th>部署名</th>
      <th>役職名</th>
      <th>氏名</th>
      <th>E-MAIL</th>
      <th>郵便番号</th>
      <th>住所</th>
      <th>TEL会社</th>
      <th>TEL部門</th>
      <th>TEL直通</th>
      <th>FAX</th>
      <th>携帯番号</th>
      <th>URL</th>
      <th>名刺交換日</th>
      <th>Eightでつながっている人</th>
      <th>再データ化中の名刺</th>
      <th>'?'を含んだデータ</th>
      <th>配信禁止</th>
      <th>アクションキー</th>
      <th>アクションキー2</th>
    </tr>

    @foreach($imports as $import)
    <form method=post action="{{'/delete'}}">
      {{ csrf_field() }}
      @if(isset($import->deleted_at))
      <tr id = "coloring" class="row_{{$import->id}}">
      @else
      <tr id = "normal" class="row_{{$import->id}}">
      @endif
        <td class="id">{{$import->id}}</td>
        <td class="company">{{$import->company}}</td>
        <td class="department">{{$import->department}}</td>
        <td class="position">{{$import->position}}</td>
        <td class="name">{{$import->name}}</td>
        <td class="e_mail">{{$import->e_mail}}</td>
        <td class="postcode">{{$import->postcode}}</td>
        <td class="address">{{$import->address}}</td>
        <td class="TEL">{{$import->TEL}}</td>
        <td class="TELdepartment">{{$import->TELdepartment}}</td>
        <td class="TELdirect">{{$import->TELdirect}}</td>
        <td class="FAX">{{$import->FAX}}</td>
        <td class="phonenumber">{{$import->phonenumber}}</td>
        <td class="URL">{{$import->URL}}</td>
        <td class="trade_day">{{$import->trade_day}}</td>
        <td class="eightfriends_num">{{$import->eightfriends_num}}</td>
        <td class="now_dating">{{$import->now_dating}}</td>
        <td class="question">{{$import->question}}</td>
        <td class="deleted_at">{{$import->deleted_at}}</td>
        <td>
          <input name="id" type="hidden" value="{{$import->id}}">
          @if(!isset($import->deleted_at))
          <input name="edit" type="submit" value="delete">
          @else
          <input name="edit" type="submit" value="delete" disabled>
          @endif
        </td>
        <td>
          @if(!isset($import->deleted_at))
          <input name="index" class="index index_{{$import->id}}" type="button" value="index">
          @else
          <input name="index" class="index index_{{$import->id}}" type="button" value="index" disabled>
          @endif
        </td>
      </tr>
    </form>
    @endforeach
   
    {{$imports->appends(Request::except("page"))->links() }}
  </table>
</body>
<script type="text/javascript" src="js/test.js"></script>
</html>

