<!doctype html>
<html lang="ja">
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/validationEngine.jquery.css">
    <script src="js/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <meta charset="UTF-8">
    <title>メール配信停止</title>
</head>
<body>  
    <h1>メール配信停止ページ</h1>
    <p>以下に登録アドレスを記入してください</p>
    <form id = "validationForm" method="get" action="/stopmail">
        <input name="e_mail" placeholder="メールアドレスを入力" type="text" data-validation-engine="validate[required, custom[email], maxSize[80]]">
        <input name="stopmail" type="submit" value="配信停止">
    </form>
        @if(isset($error_message))
        <P>{{$error_message}}<p>
        @endif     
</body>
<script src="js/email.js" type="text/javascript" charset="utf-8"></script>
</html>
