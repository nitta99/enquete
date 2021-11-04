<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>検索画面</title>
</head>
<body>
    <div class ="contact">
    <h1 class="contact-ttl">アンケート</h1>
        <form action="search.php" method="post" name='enquete'>
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
                    <td><button class="contact-submit" type="submit">検索</button></td>
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
                    // テーブルセルに配列の値を格納
                    echo '<tr>';
                    echo '<td>'.$data[0].'</td>';
                    echo '<td>'.$data[1].'</td>';
                    echo '<td>'.$data[2].'</td>';
                    echo '<td>'.$data[3].'</td>';
                    echo '<td>'.$data[4].'</td>';
                    echo '<td>'.$data[5].'</td>';
                    echo '<td>'.$data[6].'</td>';
                    echo '</tr>';
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