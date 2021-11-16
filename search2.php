<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="enquete.css" media="all" />
<title>検索画面</title>

<script type="text/javascript">
//指定ページ遷移
function goIndex(){
    location.href="index2.php";
}
</script>

</head>
<body>
    <table class="table-navi">
        <tr>
            <td><button class="navigation" type="button" onclick="goIndex()">登録画面</button></td>
            <td>/</td>
            <th style="font-size : 20px;">検索画面</th>
        </tr>
    </table>
    <hr/>
    <div class ="search">
    <h1 class="search-ttl">検索</h1>
        <form action="search2.php" method="get">
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
                    <td><input class="contact-submit" type="submit" name="search" value="検索" /></td>
                </tr>
        </form>
    </div>
    <?php
    if (isset($_GET['search'])) {
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
    }
    $url = parse_url(getenv('DATABASE_URL'));
    $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
    $pdo = new PDO($dsn, $url['user'], $url['pass']);

    // 検索条件を取得
    $get = $_GET;

    //IDおよびユーザー名の入力有無を確認
    if(!empty($get)){

        //SQL文を実行して、結果を$stmtに代入する。
        $stmt = $pdo->query(
            "SELECT *
            FROM public.enquete
            WHERE name LIKE  '%".$_GET["name"]."%'
            OR age='".$_GET["age"] ."'
            OR gender='".$_GET["gender"] ."'
            OR address LIKE  '%".$_GET["address"]."%'
            OR telephone LIKE  '%".$_GET["telephone"]."%'
            OR mail LIKE  '%".$_GET["mail"]."%'
            OR thoughts='".$_GET["thoughts"] ."'
            ");

            foreach ($stmt as $data) {
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
            // テーブルの閉じタグ
            echo '</table>';
    }

    ?>
</body>
</html>