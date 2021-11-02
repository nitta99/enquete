<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>検索画面</title>
</head>
<body>
<form action="search.php" method="post" name='enquete'>
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
        <td><select name="gender"><option>男性</option><option>女性</option></select></td>
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
		<td><button type="submit">検索</button></td>
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
    // data.csv（SJIS）を読み込む
$sjis_data = file_get_contents('data.csv');
// 一時ファイル作成
$fp = tmpfile();
// UTF-8に変換して一時ファイルに書き込み
fwrite($fp, mb_convert_encoding($sjis_data, 'UTF-8', 'SJIS-win'));
// ポインタを先頭に
fseek($fp, 0);

// while文でCSVファイルのデータを1つずつ繰り返し読み込む
while($data = fgetcsv($fp)){

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
</body>
</html>