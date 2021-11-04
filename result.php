<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>結果表示画面</title>
</head>
<body>
    <div class ="contact">
        <h1 class="contact-ttl">アンケート</h1>
        <table class="contact-table">
            <tr>
                <th class="contact-item">名前</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$_POST['name'], ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr>
                <th class="contact-item">年齢</th>
                <td class="contact-body">
                    <?php echo (int)@$_POST['age']; ?>歳
                </td>
            </tr>
            <tr>
                <th class="contact-item">性別</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$_POST['gender'], ENT_QUOTES, 'UTF-8');?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">住所</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$_POST['address'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">電話番号</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$_POST['telephone'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">メ―ルアドレス</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$_POST['mail'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">感想</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$_POST['thoughts'], ENT_QUOTES, 'UTF-8');?>
                </td>
            </tr>
        </table>
<?php

// 書き込み対象のCSVファイルを開く
$fp = fopen("data.csv", "a");

$NAME = mb_convert_encoding($_POST['name'], "UTF-8");
$AGE = mb_convert_encoding($_POST['age'], "UTF-8");
$GENDER = mb_convert_encoding($_POST['gender'], "UTF-8");
$ADDRESS = mb_convert_encoding($_POST['address'], "UTF-8");
$TELEPHONE = mb_convert_encoding($_POST['telephone'], "UTF-8");
$MAIL = mb_convert_encoding($_POST['mail'], "UTF-8");
$THOUGHTS = mb_convert_encoding($_POST['thoughts'], "UTF-8");

// //ストリームフィルタ指定
// stream_filter_prepend($fp,'convert.iconv.utf-8/cp932');

// CSVファイルに書き込む
fwrite($fp,"$NAME,$AGE,$GENDER,$ADDRESS,$TELEPHONE,$MAIL,$THOUGHTS"."\n");

// 書き込み対象のファイルをクローズ
fclose($fp);
?>
    </div>
</body>
</html>