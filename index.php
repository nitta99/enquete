<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート画面</title>
</head>
<body>
<form action="result.php" method="post" >
<p>氏名<input type="text" name="name" value=""></p>
<p>年齢<input type="text" name="age" value="">歳</p>
<p>性別<select name="gender"><option selected="selected">男性</option><option>女性</option></select></p>
<p>住所<input type="text" name="address" value=""></p>
<p>電話番号<input type="text" name="telephone" value=""></p>
<p>メールアドレス<input type="text" name="mail" value=""></p>
<p>感想<input type="radio" name="thoughts" value="good">良い<input type="radio" name="thoughts" value="normal">普通<input type="radio" name="thoughts" value="bad">悪い</p>
<p><button type="submit">登録</button></p>
</form>
</body>
</html>