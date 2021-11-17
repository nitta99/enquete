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
                        <input type="text" name="email" class="search-text" value="">
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

    $url = parse_url(getenv('DATABASE_URL'));
    $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
    $pdo = new PDO($dsn, $url['user'], $url['pass']);

    $NAME = $_GET['name'];
    $AGE = $_GET['age'];
    $GENDER = $_GET['gender'];
    $ADDRESS = $_GET['address'];
    $TELEPHONE = $_GET['telephone'];
    $EMAIL = $_GET['email'];
    $THOUGHTS = $_GET['thoughts'];

    // 基本検索条件（全件検索）
    $query = "SELECT * FROM public.enquete WHERE 1 = 1";

    // 検索条件を取得
    $get = $_GET;

    if(!empty($get)){
    // 名前の条件が指定されたら
    if ($NAME) {
        $query .= sprintf(" AND name LIKE '%s' ", "%${NAME}%");
    }
    // 年齢　　〃
    if ($AGE) {
        $query .= " AND age='$AGE' ";
    }
    // 性別　　〃
    if ($GENDER) {
        $query .= " AND gender='$GENDER' ";
    }
    // 住所　　〃
    if ($ADDRESS) {
        $query .= sprintf(" AND address LIKE '%s' ", "%${ADDRESS}%");
    }
    // 電話番号　　〃
    if ($TELEPHONE) {
        $query .= sprintf(" AND telephone LIKE '%s' ", "%${TELEPHONE}%");
    }
    // メールアドレス　　〃
    if ($EMAIL) {
        $query .= sprintf(" AND email LIKE '%s' ", "%${EMAIL}%");
    }
    // 感想　　〃
    if ($THOUGHTS) {
        $query .= " AND thoughts='$THOUGHTS' ";
    }

    $stmt = $pdo->query($query);
    }
    ?>
    <table class="result">
        <?php if (isset($_GET['search'])): ?>
            <tr>
                <th>氏名</th>
                <th>年齢</th>
                <th>性別</th>
                <th>住所</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>感想</th>
            </tr>
            <?php foreach ($stmt as $data): ?>
                <tr>
                    <td><?php echo $data[0]?></td>
                    <td><?php echo $data[1]?></td>
                    <?php if($data[2] === "man"): ?>
                        <td><?php echo "男性"?></td>
                    <?PHP endif; ?>
                    <?php if($data[2] === "woman"): ?>
                        <td><?php echo "女性"?></td>
                    <?PHP endif; ?>
                    <td><?php echo $data[3]?></td>
                    <td><?php echo $data[4]?></td>
                    <td><?php echo $data[5]?></td>
                    <?php if($data[6] === "good"): ?>
                        <td><?php echo "良い"?></td>
                    <?PHP endif; ?>
                    <?php if($data[6] === "normal"): ?>
                        <td><?php echo "普通"?></td>
                    <?PHP endif; ?>
                    <?php if($data[6] === "bad"): ?>
                        <td><?php echo "悪い"?></td>
                    <?PHP endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>