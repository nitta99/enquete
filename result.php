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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>結果表示画面</title>
</head>
<body>
    <div class ="contact">
        <h1 class="contact-ttl">登録内容</h1>
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
                    <?php echo (int)@$_POST['age'];?>歳
                </td>
            </tr>
            <tr>
                <th class="contact-item">性別</th>
                <td class="contact-body">
                    <?php
                    if($_POST['gender'] === "man"){
                        $GENDER = "男性";
                    }else if($_POST['gender'] === "woman"){
                        $GENDER = "女性";
                    }
                    echo htmlspecialchars(@$_POST['gender'], ENT_QUOTES, 'UTF-8');
                    ?>
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
                    <?php
                    if($_POST['thoughts'] === "good"){
                        $THOUGHTS = "良い";
                    }else if($_POST['thoughts'] === "normal"){
                        $THOUGHTS = "普通";
                    }else if($_POST['thoughts'] === "bad"){
                        $THOUGHTS = "悪い";
                    }
                    echo htmlspecialchars(@$_POST['thoughts'], ENT_QUOTES, 'UTF-8');
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>