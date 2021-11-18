<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>アンケート</title>

<script type="text/javascript">
//名前入力チェック
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
//文字数チェック
function wordCheck() {
    getName = document.enquete.name.value;
    getAge = document.enquete.age.value;
    getAddress = document.enquete.address.value;
    getTelephone = document.enquete.telephone.value;
    getMail = document.enquete.mail.value;
    if (getName.length > 255) {
        alert("名前の文字数が制限をこえています");
        return false; // 送信を中止
    }else if(getAge.length > 999){
        alert("年齢の文字数が制限をこえています");
        return false; // 送信を中止
    }else if(getAddress.length > 255){
        alert("住所の文字数が制限をこえています");
        return false; // 送信を中止
    }else if(getTelephone.length > 12){
        alert("電話番号の文字数が制限をこえています");
        return false; // 送信を中止
    }else if(getMail.length > 255){
        alert("メールアドレスの文字数が制限をこえています");
        return false; // 送信を中止
    }else{
		return true; // 送信を実行
	}
}
//年齢数値チェック
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
//電話番号入力数値チェック
function checkTelephone(){
	var flag = 0;
	// 設定開始（必須にする項目を設定してください）
	if(document.enquete.telephone.value == ""){ // 「電話番号」の入力をチェック
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
//メールアドレスチェック
function checkMail(){
    var flag = 0;
    // 設定開始（チェックする項目を設定してください）
    if(!document.enquete.mail.value.match(/^[a-zA-Z0-9!-/:-@¥[-`{-~]+$/)){
        flag = 1;
    }
    // 設定終了
    if(flag){
        window.alert('メールアドレスは半角英数字記号で入力してください'); // 半角英数字記号以外が入力された場合は警告ダイアログを表示
        return false; // 送信を中止
    }else{
       return true; // 送信を実行
    }
}
//感想入力チェック
function checkThoughts(){
	var flag = 0;
	// 設定開始（必須にする項目を設定してください）
	if(document.enquete.thoughts.value == ""){ // 「感想」の入力をチェック
		flag = 1;
	}
	// 設定終了
	if(flag){
		window.alert('感想を選択して下さい'); // 入力漏れがあれば警告ダイアログを表示
		return false; // 送信を中止
	}
	else{
		return true; // 送信を実行
	}
}
//指定ページ遷移
function goSearch(){
    location.href="search.php";
}
</script>

</head>
<body>
    <table class="table-navi">
        <tr>
            <th style="font-size : 20px;">登録画面</th>
            <td>/</td>
            <td><button class="navigation" type="button" onclick="goSearch()">検索画面</button></td>
        </tr>
    </table>
    <hr/>
    <div class ="contact">
    <h1 class="contact-ttl">アンケート</h1>
        <form action="result.php" method="post" name='enquete'
            onSubmit="return
            (checkName() && wordCheck() && checkNumber() && checkTelephone() && checkMail() && checkThoughts())">
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
                            <option selected="selected" value="man">男性</option>
                            <option value="woman">女性</option>
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
                    <label class="search-thoughts">
                        <input type="radio" name="thoughts" value="" checked="checked" style="display:none;"/>
                    </label>
                    </td>
                </tr>
                </table>
                <tr>
                    <td><input class="contact-submit" type="submit" value="登録" /></td>
                </tr>
        </form>
    </div>
</body>
</html>