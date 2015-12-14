<?php
// 長さm の半角アルファベット文字列s と 正の整数n が入力された時、
// 文字列sの1番左の文字を1文字目として、n文字目のアルファベットを出力せよ。
// ただし、n が m よりも大きい値をとる場合は、"m以下 正の整数を入力してください"と出力せよ。
// [実行結果例]
// s = "hoge", n = 3
// g
// s = "hoge", n = 5
// 4以下の正の整数を入力してください


// バリデーションがうまくいってない。
$s = $_POST['s'];
$n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);
$N = $n-1;
$m = strlen($s);
$errors = array();

if (!preg_match('/[a-zA-Z]/',$s))
{
  echo '半角アルファベットで入力してください';
}
else
{
  if ($n <= $m)
  {
    $a = substr($s, $N, 1);
  }
  else
  {
    $errors = $m . '以下の正の整数を入力してください';
  }
}

var_dump($a);
?>

<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>文字列からN番目</title>
  </head>
  <body>
  <form action="" method="post">
  <p1>半角アルファベットの文字列を入力してください</p1><br>
  s: <input type="text" name="s"><br><br>
  <p1>数字を入力してください</p1><br>
  n: <input type="text" name="n">
  <input type="submit" value="送信"><br>

  <?php if($n <= $m) : ?>
    <?php echo "n番目の文字列は" . $a . "です。"; ?>
  <?php else : ?>
    <?php echo htmlspecialchars($errors, ENT_QUOTES, "utf-8"); ?>
  <?php endif; ?>
  </form>
  </body>
  </html>
