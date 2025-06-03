<!-- Anket Formu -->
<form action="anket.php?aksiyon=oyver" method="post">
    <p><?php echo $veri["soru"]; ?></p>
    <label><input type="radio" name="oy" value="sec1"> <?php echo $veri["sec1"]; ?></label><br>
    <label><input type="radio" name="oy" value="sec2"> <?php echo $veri["sec2"]; ?></label><br>
    <label><input type="radio" name="oy" value="sec3"> <?php echo $veri["sec3"]; ?></label><br>
    <label><input type="radio" name="oy" value="sec4"> <?php echo $veri["sec4"]; ?></label><br>
    <input type="hidden" name="anketid" value="<?php echo $veri["id"]; ?>">
    <button type="submit" name="oyver">OY VER</button>
</form>
