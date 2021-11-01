<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート</title>

<script type="text/javascript">

function checkName(){
	var flag = 0;
	// 設定開始（必須にする項目を設定してください）
	if(document.enquete.name.value == ""){ // 「お名前」の入力をチェック
		flag = 1;
	}
	// 設定終了
	if(flag){
		window.alert('氏名は必須です'); // 入力漏れがあれば警告ダイアログを表示
		return false; // 送信を中止
	}
	else{
		return true; // 送信を実行
	}
}

function checkNumber(){
    var flag = 0;
    // 設定開始（チェックする項目を設定してください）
    if(document.enquete.age.value.match(/[^0-9]+/)){
        flag = 1;
    }
    // 設定終了
    if(flag){
        window.alert('年齢は数字で入力してください'); // 数字以外が入力された場合は警告ダイアログを表示
        return false; // 送信を中止
    }else{
       return true; // 送信を実行
    }
}
</script>
</head>
<body>
<form action="result.php" method="post" name='enquete' onSubmit="return (checkName() && checkNumber())">
<table>
    <tr>
        <td>氏名</td>
        <td><input type="text" name="name" value=""></td>
    </tr>
    <tr>
        <td>年齢</td>
        <td><input type="text" name="age" value="">歳</td>
    </tr>
    <tr>
        <td>性別</td>
        <td><select name="gender"><option selected="selected">男性</option><option>女性</option></select></td>
    </tr>
    <tr>
        <td>住所</td>
        <td><input type="text" name="address" value=""></td>
    </tr>
    <tr>
        <td>電話番号</td>
        <td><input type="text" name="telephone" value=""></td>
    </tr>
    <tr>
        <td>メールアドレス</td>
        <td><input type="text" name="mail" value=""></td>
    </tr>
    <tr>
        <td>感想</td>
        <td><input type="radio" name="thoughts" value="good">良い<input type="radio" name="thoughts" value="normal">普通<input type="radio" name="thoughts" value="bad">悪い</td>
    </tr>
	<tr>
		<td><button type="submit">登録</button></td>
	</tr>
</table>
</form>
</body>
</html>