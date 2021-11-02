<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>結果表示画面</title>
</head>
<body>
<table>
    <tr>
        <td>氏名</td>
        <td><?php echo htmlspecialchars(@$_POST['name'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td>年齢</td>
        <td><?php echo (int)@$_POST['age']; ?>歳</td>
    </tr>
    <tr>
        <td>性別</td>
        <td><?php echo htmlspecialchars(@$_POST['gender'], ENT_QUOTES, 'UTF-8');?></td>
    </tr>
    <tr>
        <td>住所</td>
        <td><?php echo htmlspecialchars(@$_POST['address'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td>電話番号</td>
        <td><?php echo htmlspecialchars(@$_POST['telephone'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td>メールアドレス</td>
        <td><?php echo htmlspecialchars(@$_POST['mail'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td>感想</td>
        <td><?php echo htmlspecialchars(@$_POST['thoughts'], ENT_QUOTES, 'UTF-8');?></td>
    </tr>
</table>
<?php

// 書き込み対象のCSVファイルを開く
$fp = fopen("data.csv", "a");

$NAME = $_POST['name'];
$AGE = $_POST['age'];
$GENDER = $_POST['gender'];
$ADDRESS = $_POST['address'];
$TELEPHONE = $_POST['telephone'];
$MAIL = $_POST['mail'];
$THOUGHTS = $_POST['thoughts'];

//ストリームフィルタ指定
stream_filter_prepend($fp,'convert.iconv.utf-8/cp932');

// CSVファイルに書き込む
fwrite($fp,"$NAME,$AGE,$GENDER,$ADDRESS,$TELEPHONE,$MAIL,$THOUGHTS"."\n");

// 書き込み対象のファイルをクローズ
fclose($fp);
?>
</body>
</html>