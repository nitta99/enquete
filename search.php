<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>検索画面</title>
</head>
<body>
    <div class ="contact-search">
    <h1 class="contact-ttl">検索</h1>
        <form action="search.php" method="post">
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
                            <option hidden>選択してください</option>

                            <option>男性</option>
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
                <tr>
                    <td><input class="contact-submit" type="submit" />検索</td>
                </tr>
            </table>
            <table>
                <?php
                // テーブルタグを作成し、テーブルヘッダーで見出しを作る
                echo '<table border="1">
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
                    mb_convert_variables("UTF-8", "SJIS-win", $data);
                    if($data[0]===$_POST['name'] || $data[1]===$_POST['age'] || $data[2]===$_POST['gender'] || $data[3]===$_POST['address']
                    || $data[4]===$_POST['telephone'] || $data[5]===$_POST['mail'] || $data[6]===$_POST['thoughts']){
                    // テーブルセルに配列の値を格納
                    echo '<tr>';
                    for ($i=0;$i<count($data);$i++) {
                        echo "<td>" . $data[$i] . "</td>";
                    }
                    echo '</tr>';
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