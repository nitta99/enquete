<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>検索画面</title>
</head>
<body>
    <div class ="contact">
    <h1 class="contact-ttl">検索</h1>
        <form action="search.php" method="get">
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
                            <option value="" hidden>選択してください</option>
                            <option value="man">男性</option>
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
                    <label class="contact-thoughts">
                        <input type="radio" name="thoughts" value="" checked="checked" style="display:none;"/>
                    </label>
                    </td>
                </tr>
                <tr>
                    <td><input class="contact-submit" type="submit" value="検索" /></td>
                </tr>
            </table>
            <table>
                <?php
                echo '<table>
                <tr>
                <th>氏名</th>
                <th>年齢</th>
                <th>性別</th>
                <th>住所</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>感想</th>
                </tr>';

                // test.csvファイルを開いて、読み込みモードに設定する
                $fp = fopen('data.csv', 'r');

                // while文でCSVファイルのデータを1つずつ繰り返し読み込む
                while($data = fgetcsv($fp)){

                    //UTF-8に変換
                    mb_convert_variables("UTF-8", "SJIS-win", $data);

                    //入力項目と登録項目が完全一致の場合一覧表示
                    if($data[0]===$_GET['name'] || $data[1]===$_GET['age'] || $data[2]===$_GET['gender'] || $data[3]===$_GET['address']
                        || $data[4]===$_GET['telephone'] || $data[5]===$_GET['mail'] || $data[6]===$_GET['thoughts']){

                        // テーブルセルに配列の値を格納
                        echo '<tr>';
                        for ($i=0;$i<count($data);$i++) {
                            echo "<td>" . $data[$i] . "</td>";
                        }
                        echo '</tr>';

                    } else if (isset($_GET["name"], $_GET["age"], $_GET["gender"],
                                $_GET["address"], $_GET["telephone"], $_GET["mail"], $_GET["thoughts"])) {

                        if(empty($_GET['name']) && empty($_GET['age']) && empty($_GET['gender']) && empty($_GET['address']) &&
                            empty($_GET['telephone']) && empty($_GET['mail']) && empty($_GET['thoughts'])){

                            echo '<tr>';
                            for ($i=0;$i<count($data);$i++) {
                            echo "<td>" . $data[$i] . "</td>";
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
            </table>
        </form>
    </div>
</body>
</html>