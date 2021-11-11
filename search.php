<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>検索画面</title>

<script type="text/javascript">
//指定ページ遷移
function goIndex(){
    location.href="index.php";
}
function goSearch(){
    location.href="search.php";
}
</script>

</head>
<body>
    <table class="table-navi">
        <tr>
            <td><button class="navigation" type="button" onclick="goIndex()">登録画面</button></td>
            /
            <td><button class="navigation" type="button" onclick="goSearch()">検索画面</button></td>
        </tr>
    </table>
    <hr/>
    <div class ="search">
    <h1 class="search-ttl">検索</h1>
        <form action="search.php" method="get">
            <table class="search-table">
                <tr>
                    <th class="search-item">名前</th>
                    <td class="search-body">
                        <input type="text" name="name" class="search-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="search-item">年齢</th>
                    <td class="search-body">
                        <input type="text" name="age" class="search-age-text" value="">歳
                    </td>
                </tr>
                <tr>
                    <th class="search-item">性別</th>
                    <td class="search-body">
                        <select name="gender" class="search-select">
                            <option value="" hidden>選択してください</option>
                            <option value="man">男性</option>
                            <option value="woman">女性</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="search-item">住所</th>
                    <td class="search-body">
                        <input type="text" name="address" class="search-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="search-item">電話番号</th>
                    <td class="search-body">
                        <input type="text" name="telephone" class="search-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="search-item">メ―ルアドレス</th>
                    <td class="search-body">
                        <input type="text" name="mail" class="search-text" value="">
                    </td>
                </tr>
                <tr>
                    <th class="search-item">感想</th>
                    <td class="search-body">
                    <label class="search-thoughts">
                        <input type="radio" name="thoughts" value="good" />
                        <span class="search-thoughts-txt">良い</span>
                    </label>
                    <label class="search-thoughts">
                        <input type="radio" name="thoughts" value="normal" />
                        <span class="search-thoughts-txt">普通</span>
                    </label>
                    <label class="search-thoughts">
                        <input type="radio" name="thoughts" value="bad" />
                        <span class="search-thoughts-txt">悪い</span>
                    </label>
                    <label class="search-thoughts">
                        <input type="radio" name="thoughts" value="" checked="checked" style="display:none;"/>
                    </label>
                    </td>
                </tr>
            </table>
                <tr>
                    <td><input class="contact-submit" type="submit" value="検索" /></td>
                </tr>
        </form>
    </div>
    <?php
        // test.csvファイルを開いて、読み込みモードに設定する
        $fp = fopen('data.csv', 'r');

        // while文でCSVファイルのデータを1つずつ繰り返し読み込む
        while($data = fgetcsv($fp)){

            //UTF-8に変換
            mb_convert_variables("UTF-8", "SJIS-win", $data);

            $NAME = $_GET['name'];
            $AGE = $_GET['age'];
            $GENDER = $_GET['gender'];
            $ADDRESS = $_GET['address'];
            $TELEPHONE = $_GET['telephone'];
            $MAIL = $_GET['mail'];
            $THOUGHTS = $_GET['thoughts'];

            // 表示用フラグ
            $flag = True;

            // 検索条件を取得
            $get = $_GET;

            //検索条件がある場合
            if(!empty($get)){

                //名前が入力されている場合
                if(empty($NAME) === false){
                    //部分一致しない場合
                    if(strpos($data[0], $NAME) === false){
                        //表示用フラグをfalseに
                        $flag = false;
                    }
                }
                //年齢が入力されている場合
                if(empty($AGE) === false){
                    //完全一致しない場合
                    if($data[1] !== $AGE){
                        //表示用フラグをfalseに
                        $flag = false;
                    }
                }
                //性別が入力されている場合
                if(empty($GENDER) === false){
                    //完全一致しない場合
                    if($data[2] !== $GENDER){
                        //表示用フラグをfalseに
                        $flag = false;
                    }
                }
                //住所が入力されている場合
                if(empty($ADDRESS) === false){
                    //部分一致しない場合
                    if(strpos($data[3], $ADDRESS) === false){
                        //表示用フラグをfalseに
                        $flag = false;
                    }
                }
                //電話番号が入力されている場合
                if(empty($TELEPHONE) === false){
                    //部分一致しない場合
                    if(strpos($data[4], $TELEPHONE) === false){
                        //表示用フラグをfalseに
                        $flag = false;
                    }
                }
                //メールアドレスが入力されている場合
                if(empty($MAIL) === false){
                    //部分一致しない場合
                    if(strpos($data[5], $MAIL) === false){
                        //表示用フラグをfalseに
                        $flag = false;
                    }
                }
                //感想が入力されている場合
                if(empty($THOUGHTS) === false){
                    //完全一致しない場合
                    if($data[6] !== $THOUGHTS){
                        //表示用フラグをfalseに
                        $flag = false;
                    }
                }
                //表示用フラグがTrueの場合
                if($flag === True){
                    echo '<table class="result">
                    <tr>
                        <th>氏名</th>
                        <th>年齢</th>
                        <th>性別</th>
                        <th>住所</th>
                        <th>電話番号</th>
                        <th>メールアドレス</th>
                        <th>感想</th>
                    </tr>';
                    //データ表示
                    echo '<tr>';
                    echo "<td>" . $data[0] . "</td>";
                    echo "<td>" . $data[1] . "</td>";
                    if($data[2] === "man"){
                        echo "<td>" . "男性" . "</td>";
                    }else if($data[2] === "woman"){
                        echo "<td>" . "女性" . "</td>";
                    }
                    echo "<td>" . $data[3] . "</td>";
                    echo "<td>" . $data[4] . "</td>";
                    echo "<td>" . $data[5] . "</td>";
                    if($data[6] === "good"){
                        echo "<td>" . "良い" . "</td>";
                    }else if($data[6] === "normal"){
                        echo "<td>" . "普通" . "</td>";
                    }else if($data[6] === "bad"){
                        echo "<td>" . "悪い" . "</td>";
                    }
                    echo '</tr>';
                }
            }
        }

        // テーブルの閉じタグ
        echo '</table>';

        // 開いたファイルを閉じる
        fclose($fp);
    ?>
</body>
</html>