<?php
$url = parse_url(getenv('postgres://ucfigvckstbiea:cab8e82f97856cbd7775f3bc2adb65aae4513b2b2169d511a6db24d48d460f36@ec2-52-21-153-207.compute-1.amazonaws.com:5432/d8p2kl1nnfbvpb'));
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['ec2-52-21-153-207.compute-1.amazonaws.com'], substr($url['d8p2kl1nnfbvpb'], 1));
$pdo = new PDO($dsn, $url['ucfigvckstbiea'], $url['cab8e82f97856cbd7775f3bc2adb65aae4513b2b2169d511a6db24d48d460f36']);

$NAME = $_POST['name'];
$AGE = $_POST['age'];
$GENDER = $_POST['gender'];
$ADDRESS = $_POST['address'];
$TELEPHONE = $_POST['telephone'];
$MAIL = $_POST['mail'];
$THOUGHTS = $_POST['thoughts'];

$sql = "INSERT INTO public.enquete (name, age, gender, address, telephone, mail, thoughts) VALUES (:name, :age, :gender, :address, :telephone, :mail, :thoughts)";
$stmt = $dbh->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
$params = array(':name' => $name, ':age' => $AGE, ':gender' => $GENDER, ':address' => $ADDRESS,  ':telephone' => $TELEPHONE,  ':mail' => $MAIL,  ':thoughts' => $THOUGHTS,); // 挿入する値を配列に格納する
$stmt->exec ($params);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>結果表示画面</title>

<script type="text/javascript">
//指定ページ遷移
function goIndex(){
    location.href="index2.php";
}
function goSearch(){
    location.href="search2.php";
}
</script>

</head>
<body>
    <table class="table-navi">
        <tr>
            <td><button class="navigation" type="button" onclick="goIndex()">登録画面</button></td>
            <td>/</td>
            <td><button class="navigation" type="button" onclick="goSearch()">検索画面</button></td>
        </tr>
    </table>
    <hr/>
    <div class ="contact">
        <h1 class="contact-ttl">登録内容</h1>
        <table class="contact-table">
            <tr>
                <th class="contact-item">名前</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$NAME, ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
            <tr>
                <th class="contact-item">年齢</th>
                <td class="contact-body">
                    <?php echo (int)@$AGE;?>歳
                </td>
            </tr>
            <tr>
                <th class="contact-item">性別</th>
                <td class="contact-body">
                    <?php
                    if($GENDER === "man"){
                        $GENDER = "男性";
                    }else if($GENDER === "woman"){
                        $GENDER = "女性";
                    }
                    echo htmlspecialchars(@$GENDER, ENT_QUOTES, 'UTF-8');
                    ?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">住所</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$ADDRESS, ENT_QUOTES, 'UTF-8'); ?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">電話番号</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$TELEPHONE, ENT_QUOTES, 'UTF-8'); ?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">メ―ルアドレス</th>
                <td class="contact-body">
                    <?php echo htmlspecialchars(@$MAIL, ENT_QUOTES, 'UTF-8'); ?>
            </td>
            </tr>
            <tr>
                <th class="contact-item">感想</th>
                <td class="contact-body">
                    <?php
                    if($THOUGHTS === "good"){
                        $THOUGHTS = "良い";
                    }else if($THOUGHTS === "normal"){
                        $THOUGHTS = "普通";
                    }else if($THOUGHTS === "bad"){
                        $THOUGHTS = "悪い";
                    }
                    echo htmlspecialchars(@$THOUGHTS, ENT_QUOTES, 'UTF-8');
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>