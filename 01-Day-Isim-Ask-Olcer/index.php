<?php
function lovePercentage($name1, $name2) {
    $allChars = str_split($name1 . $name2);
    $allChars = array_map('strtolower', $allChars);
    $alreadyChecked = [];
    $numbers = [];

    foreach ($allChars as $char) {
        if (!ctype_alpha($char)) continue;
        if (in_array($char, $alreadyChecked)) continue;

        $count = substr_count(strtolower($name1), $char) + substr_count(strtolower($name2), $char);
        $numbers[] = $count;
        $alreadyChecked[] = $char;
    }

    while (count($numbers) > 2) {
        $newNumbers = [];
        for ($i = 0, $j = count($numbers) - 1; $i <= $j; $i++, $j--) {
            if ($i == $j) {
                $newNumbers[] = $numbers[$i];
            } else {
                $sum = $numbers[$i] + $numbers[$j];
                $newNumbers[] = $sum;
            }
        }
        $numbers = $newNumbers;
    }

    return ($numbers[0] * 10) + $numbers[1];
}

$result = "";
$showForm = true;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['calculate'])) {
    $name1 = $_POST["name1"] ?? '';
    $name2 = $_POST["name2"] ?? '';

    if (!empty($name1) && !empty($name2)) {
        $percentage = lovePercentage($name1, $name2);
        $result = "<h2>💖 $name1 ve $name2 arasındaki aşk yüzdesi: %$percentage 💖</h2>";
        $showForm = false;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset'])) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Aşk Ölçer</title>
    <style>
        body { font-family: Arial; background: #fce4ec; text-align: center; padding: 40px; }
        form, .result { background: white; padding: 20px; border-radius: 12px; display: inline-block; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        input { padding: 10px; margin: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background-color: #e91e63; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #c2185b; }
    </style>
</head>
<body>

<h1>💘 Aşk Ölçer 💘</h1>

<?php if ($showForm): ?>
    <form method="POST">
        <input type="text" name="name1" placeholder="Senin adın" required>
        <input type="text" name="name2" placeholder="Aşık olduğun kişinin adı" required><br>
        <button type="submit" name="calculate">Aşk Ölçer</button>
    </form>
<?php else: ?>
    <div class="result">
        <?= $result ?>
        <form method="POST">
            <button type="submit" name="reset">Yeniden Başla</button>
        </form>
    </div>
<?php endif; ?>

</body>
</html>
