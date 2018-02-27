<!DOCTYPE html>
<html lang="ja">
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <meta charset="UTF-8">

  <title>input form</title>


</head>
<body>
    <h1>管理者画面</h1>
 <form method="post" action="{{url('/import')}}" enctype="multipart/form-data"> 
    {{ csrf_field() }}
  <p>ファイルの選択</p>
    <input type="file" name="csv_file" id="inputFile" >
    <input type="submit" name="csv_file"  value="csv_import">     

 
<div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
</form>

 
<form method="post" action="{{url('/export')}}" >
    {{ csrf_field() }}
    <input type="submit"  value="csv export">

</form>
<form class="form-inline" action="{{'/search'}}" >
    <div class="form-group">
    @if(isset($keyword))
    <input type="text" name="keyword" value="{{$keyword}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword" value="" placeholder="名前">
    @endif

    @if(isset($keyword2))
      <input type="text" name="keyword2" value="{{$keyword2}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword2" value="" placeholder="会社名">
    @endif

    @if(isset($keyword3))
      <input type="text" name="keyword3" value="{{$keyword3}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword3" value="" placeholder="部門">
    @endif
    
    @if(isset($keyword4))
      <input type="text" name="keyword4" value="{{$keyword4}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword4" value="" placeholder="役職名">
    @endif
    
    @if(isset($keyword5))
      <input type="text" name="keyword5" value="{{$keyword5}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword5" value="" placeholder="メールアドレス">
    @endif
    </div>
    <div class="form-group">
    @if(isset($keyword6))
      <input type="text" name="keyword6" value="{{$keyword6}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword6" value="" placeholder="郵便番号">
    @endif
    
    @if(isset($keyword7))
      <input type="text" name="keyword7" value="{{$keyword7}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword7" value="" placeholder="住所">
    @endif

    @if(isset($keyword8))
      <input type="text" name="keyword8" value="{{$keyword8}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword8" value="" placeholder="TEL会社">
    @endif

    @if(isset($keyword9))
      <input type="text" name="keyword9" value="{{$keyword9}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword9" value="" placeholder="TEL部門">
    @endif
    
    @if(isset($keyword10))
      <input type="text" name="keyword10" value="{{$keyword10}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword10" value="" placeholder="TEL直通">
    @endif
    </div>
    <div class="form-group">
    @if(isset($keyword11))
      <input type="text" name="keyword11" value="{{$keyword11}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword11" value="" placeholder="FAX">
    @endif

    @if(isset($keyword12))
      <input type="text" name="keyword12" value="{{$keyword12}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword12" value="" placeholder="携帯番号">
    @endif

    @if(isset($keyword13))
      <input type="text" name="keyword13" value="{{$keyword13}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword13" value="" placeholder="URL">
    @endif

    @if(isset($keyword14))
      <input type="text" name="keyword14" value="{{$keyword14}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword14" value="" placeholder="名刺交換日">
    @endif
    
    @if(isset($keyword15))
      <input type="text" name="keyword15" value="{{$keyword15}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword15" value="" placeholder="Eightでつながっている人数">
    @endif
    </div>
    <div class="form-group">
    @if(isset($keyword16))
      <input type="text" name="keyword16" value="{{$keyword16}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword16" value="" placeholder="再データ化中の名刺">
    @endif

    @if(isset($keyword17))
      <input type="text" name="keyword17" value="{{$keyword17}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword17" value="" placeholder="'?'を含んだデータ">
    @endif

    @if(isset($keyword18))
      <input type="text" name="keyword18" value="{{$keyword18}}" placeholder="名前を入力してください">
    @else
    <input type="text" name="keyword18" value="" placeholder="id">
    @endif
    </div>
    <input type="submit" value="検索" class="btn btn-info">
   
</form>

<form class="form-inline" action="{{'/refresh'}}" >
<input type="submit" value="初期化">
</form>
</div>
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
<?php//$fileName ="名刺データ_寺尾.csv";$file = fopen($fileName,"r");
?>
 <table class="table" border=1> 
  <tr><th></th><th>ID</th><th>会社名</th><th>部署名</th><th>役職名</th><th>氏名</th><th>E-MAIL</th><th>郵便番号</th><th>住所</th><th>TEL会社</th><th>TEL部門</th><th>TEL直通</th><th>FAX</th><th>携帯番号</th><th>URL</th><th>名刺交換日</th><th>Eightでつながっている人</th><th>再データ化中の名刺</th><th>'?'を含んだデータ</th><th>アクションキー</th></tr>
  @foreach($imports as $import) 
  <tr> 
  <td></td><td>{{$import->id}}</td><td>{{$import->company}}</td><td>{{$import->department}}</td><td>{{$import->position}}</td><td>{{$import->name}}</td><td>{{$import->e_mail}}</td><td>{{$import->postcode}}</td><td>{{$import->adress}}</td><td>{{$import->TELcompany}}</td><td>{{$import->TELdepartment}}</td><td>{{$import->TELdirect}}</td><td>{{$import->FAX}}</td><td>{{$import->phonenumber}}</td><td>{{$import->URL}}</td><td>{{$import->trade_day}}</td><td>{{$import->eightfrinds_num}}</td><td>{{$import->now_dating}}</td><td>{{$import->question}}</td><td>delete/save</td>
  </tr>
  @endforeach
  <?php //ページ以外のgetからのリクエストをURLに引き継ぐ ?>
  {{$imports->appends(Request::except("page"))->links() }}
  
</table>

</body>
</html>