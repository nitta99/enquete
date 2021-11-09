<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
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

function checkTelephone(){
	var flag = 0;
	// 設定開始（必須にする項目を設定してください）
	if(document.enquete.telephone.value == ""){ // 「お名前」の入力をチェック
		flag = 1;
	} else if(document.enquete.telephone.value.match(/[^0-9]+/)){
        flag = 1;
    }
	// 設定終了
	if(flag){
		window.alert('電話番号は必須かつ数字で入力してください'); // 入力漏れがあれば警告ダイアログを表示
		return false; // 送信を中止
	}
	else{
		return true; // 送信を実行
	}
}

</script>
</head>
<body>
    <div class ="contact">
    <h1 class="contact-ttl">アンケート</h1>
        <form action="result.php" method="post" name='enquete' onSubmit="return (checkName() && checkNumber() && checkTelephone())">
            <table class="contact-table">
                <tr>
                    <th class="contact-item">名前</th>
                    <td class="contact-body">
                        <input type="text" name="name" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">年齢</th>
                    <td class="contact-body">
                        <input type="text" name="age" class="form-age-text" value="">歳
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">性別</th>
                    <td class="contact-body">
                        <select name="gender" class="form-select">
                            <option selected="selected">男性</option>
                            <option>女性</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">住所</th>
                    <td class="contact-body">
                        <input type="text" name="address" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">電話番号</th>
                    <td class="contact-body">
                        <input type="text" name="telephone" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">メ―ルアドレス</th>
                    <td class="contact-body">
                        <input type="text" name="mail" class="form-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">感想</th>
                    <td class="contact-body">
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="good" />
                        <span class="contact-thoughts-txt">良い</span>
                    </label>
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="normal" />
                        <span class="contact-thoughts-txt">普通</span>
                    </label>
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="bad" />
                        <span class="contact-thoughts-txt">悪い</span>
                    </label>
                    </td>
                </tr>
                <div class="contact-submit">
                <tr>
                    <td><input type="submit" value="登録" /></td>
                </tr>
                </div>
            </table>
        </form>
    </div>
</body>
</html>