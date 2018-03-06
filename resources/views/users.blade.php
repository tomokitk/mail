<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メール配信停止</title>
</head>
<body>  
    <h1>メール配信停止ページ</h1>
    <p>以下に登録アドレスを記入してください</p>
    <form method="get" action="/stopmail">
        <input name="e_mail" placeholder="メールアドレスを入力" type="text">
        <input name="stopmail" type="submit" value="配信停止">
    </form>
        @if(isset($error_message))
        <P>{{$error_message}}<p>
        @endif     
</body>
</html>
