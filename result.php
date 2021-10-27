<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>結果表示画面</title>
</head>
<body>
<p>氏名<?php echo htmlspecialchars(@$_POST['name'], ENT_QUOTES, 'UTF-8'); ?></p>
<p>年齢<?php echo (int)@$_POST['age']; ?> 歳</p>
<p>性別<?php echo htmlspecialchars(@$_POST['gender'], ENT_QUOTES, 'UTF-8');?></p>
<p>住所<?php echo htmlspecialchars(@$_POST['address'], ENT_QUOTES, 'UTF-8'); ?></p>
<p>電話番号<?php echo htmlspecialchars(@$_POST['telephone'], ENT_QUOTES, 'UTF-8'); ?></p>
<p>メールアドレス<?php echo htmlspecialchars(@$_POST['mail'], ENT_QUOTES, 'UTF-8'); ?></p>
<p>感想<?php echo htmlspecialchars(@$_POST['thoughts'], ENT_QUOTES, 'UTF-8');?></p>
</body>
</html>