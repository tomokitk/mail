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
  <p>Hello World!!</p>
  <form method="post" action={{url('/maillist')}}>
  {{ csrf_field() }}
  <h1>管理者画面</h1>
  <input type="submit" name="submit_value"     value="csv import">
  <form name="myform"><br/>
    <textarea name="output" cols="80" rows="10"></textarea>
    <input name="myfile" type="file" />
  </form>
  
  <script>
    //Form要素を取得する
    var form = document.forms.myform;
    console.log(form);
    //ファイルが読み込まれた時の処理
    form.myfile.addEventListener('change', function(e) {
      var result = e.target.files[0];
 
    //FileReaderのインスタンスを作成する
      var reader = new FileReader();
  
    //読み込んだファイルの中身を取得する
      reader.readAsText( result );
      //console.log(result);
  
    //ファイルの中身を取得後に処理を行う
      reader.addEventListener( 'load', function() {
    
        //ファイルの中身をtextarea内に表示する
        form.output.textContent = reader.result;    
      })
 
  
      
    })
  </script>
  <input type="submit" name="sub"     value="csv export">

<div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
<form class="form-inline" action="{{'/search'}}" >
    <div class="form-group">
      <input type="text" name="keyword" value="入力" placeholder="名前を入力してください">
    </div>
    <input type="submit" value="検索" class="btn btn-info">
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
 <table class="table" border=1>

  
  <tr><th></th><th>ID</th><th>会社名</th><th>部署名</th><th>役職名</th><th>氏名</th><th>E-MAIL</th><th>郵便番号</th><th>住所</th><th>TEL会社</th><th>TEL部門</th><th>TEL直通</th><th>FAX</th><th>携帯番号</th><th>URL</th><th>名刺交換日</th><th>Eightでつながっている人</th><th>再データ化中の名刺</th><th>'?'を含んだデータ</th><th>アクションキー</th></tr>
  @foreach($imports as $import) 
  <tr> 
  <td></td><td>{{$import->id}}</td><td>{{$import->company}}</td><td>{{$import->department}}</td><td>{{$import->position}}</td><td>{{$import->name}}</td><td>{{$import->e_mail}}</td><td>{{$import->postcode}}</td><td>{{$import->adress}}</td><td>{{$import->TELcompany}}</td><td>{{$import->TELdepartment}}</td><td>{{$import->TELdirect}}</td><td>{{$import->FAX}}</td><td>{{$import->phonenumber}}</td><td>{{$import->URL}}</td><td>{{$import->trade_day}}</td><td>{{$import->eightfrinds_num}}</td><td>{{$import->now_dating}}</td><td>{{$import->question}}</td><td>delete/save</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>