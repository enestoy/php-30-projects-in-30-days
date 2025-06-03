<?php
$stmt = $db->prepare("SELECT * FROM oylama WHERE anketid = ?");
$stmt->bind_param("i", $anketId);
$stmt->execute();
$oylar = $stmt->get_result()->fetch_assoc();

$toplam = $oylar["oy1"] + $oylar["oy2"] + $oylar["oy3"] + $oylar["oy4"];

function oran($oy, $toplam) {
    return $toplam > 0 ? round(($oy / $toplam) * 100, 2) : 0;
}
?>

<p><strong><?php echo $veri["soru"]; ?></strong></p>
<ul>
    <li><?php echo $veri["sec1"]; ?>: <?php echo oran($oylar["oy1"], $toplam); ?>%</li>
    <li><?php echo $veri["sec2"]; ?>: <?php echo oran($oylar["oy2"], $toplam); ?>%</li>
    <li><?php echo $veri["sec3"]; ?>: <?php echo oran($oylar["oy3"], $toplam); ?>%</li>
    <li><?php echo $veri["sec4"]; ?>: <?php echo oran($oylar["oy4"], $toplam); ?>%</li>
</ul>
<p>Toplam Oy: <?php echo $toplam; ?></p>

