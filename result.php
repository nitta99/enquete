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
$fp = fopen("data.csv", "w");

$NAME = mb_convert_encoding($_POST['name'], "UTF-8");
$AGE = mb_convert_encoding($_POST['age'], "UTF-8");
$GENDER = mb_convert_encoding($_POST['gender'], "UTF-8");
$ADDRESS = mb_convert_encoding($_POST['address'], "UTF-8");
$TELEPHONE = mb_convert_encoding($_POST['telephone'], "UTF-8");
$MAIL = mb_convert_encoding($_POST['mail'], "UTF-8");
$THOUGHTS = mb_convert_encoding($_POST['thoughts'], "UTF-8");

// CSVファイルに書き込む
fwrite($fp,"$NAME,$AGE,$GENDER,$ADDRESS,$TELEPHONE,$MAIL,$THOUGHTS"."\n");

// 書き込み対象のファイルをクローズ
fclose($fp);
?>
</body>
</html>