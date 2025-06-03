<?php
$baglan = new PDO("mysql:host=localhost;dbname=education;charset=utf8", "root");


class sepet
{


	protected $urunad;
	protected $fiyat;


	function urunler($v)
	{

		$urunleral = $v->prepare("select * from urunler");
		$urunleral->execute();

		while ($urunson = $urunleral->fetch(PDO::FETCH_ASSOC)) :


			echo '<div class="col-md-2 m-3" style="min-height:140px;">
	   
	   <img src="' . $urunson["resim"] . '" width="100" height="100" />
	   
	   <a href="site.php?islem=sepeteat&id=' . $urunson["id"] . '" class="btn btn-success">EKLE</a>
	   
	   </div>';

		endwhile;
	}


	function sepetsayi($b)
	{

		$urunal = $b->prepare("select * from anliksepet");
		$urunal->execute();
		return $urunal->rowCount();
	}


	function urunbak($b, $id)
	{

		$urunal = $b->prepare("select * from urunler where id=$id");
		$urunal->execute();
		return $urunson = $urunal->fetch(PDO::FETCH_ASSOC);
	}




	function urunlergetir($v)
	{

		if ($this->sepetsayi($v) != 0) :
			$toplamadet = 0;
			$toplamtutar = 0;



			$cek = $v->prepare("select * from anliksepet");
			$cek->execute();

			while ($al = $cek->fetch(PDO::FETCH_ASSOC)) :


				echo '
<tr>
    <td>' . $al["urunad"] . '</td>
    <td>' . $al["adet"] . '</td>
    <td>' . number_format($al["fiyat"], 2) . ' ₺</td>
    <td>' . number_format($al["fiyat"] * $al["adet"], 2) . ' ₺</td>
    <td>
        <form action="sepet.php?is=guncelle" method="post" class="d-flex flex-column align-items-start gap-2">
            <input type="number" name="adet" value="' . $al["adet"] . '" min="1" class="form-control form-control-sm w-75" />
            <input type="hidden" name="id" value="' . $al["id"] . '" />
            <button type="submit" name="buton" class="btn btn-warning btn-sm mt-1">Güncelle</button>
        </form>
    </td>
    <td>
        <a href="sepet.php?is=sil&id=' . $al["id"] . '" class="btn btn-danger btn-sm">Sil</a>
    </td>
</tr>';


				$toplamadet += $al["adet"];
				$toplamtutar += $al["fiyat"] * $al["adet"];


			endwhile;



			echo '
<tr class="bg-info text-white fw-bold text-center align-middle">
    <td>TOPLAM ÜRÜN ADETİ</td>
    <td class="text-warning"><kbd class="bg-dark p-1 rounded">' . $toplamadet . '</kbd></td>
    <td>TOPLAM FİYAT</td>
    <td class="text-warning"><kbd class="bg-dark p-1 rounded">' . number_format($toplamtutar, 2) . ' ₺</kbd></td>
    <td colspan="2">
        <a href="sepet.php?is=tamamla" class="btn btn-success w-100 fw-bold">SİPARİŞİ TAMAMLA</a>
    </td>
</tr>';





		else:

			echo '
	
	<tr>
	<td colspan="6">SEPETTE ÜRÜN YOK</td>
	
	</tr>
	
	';



		endif;
	}

	function sil($v)
	{

		if (@$_GET["id"] != "") :

			$id = $_GET["id"];

			$cek = $v->prepare("delete from anliksepet where id=$id");
			$cek->execute();


			echo '<div class="alert alert-danger text-center">
		
		Silindi
		</div>';
			header("refresh:2, url=sepet.php");


		endif;
	}

	function guncelle($v)
	{

		$gelenadet = $_POST["adet"];

		if (@$gelenadet != "") :

			$id = $_POST["id"];


			$cek = $v->prepare("update anliksepet set adet=$gelenadet where id=$id");
			$cek->execute();


			echo '<div class="alert alert-success text-center">
		
		ÜRÜN ADETİ GÜNCELLENDİ
		</div>';
			header("refresh:2, url=sepet.php");



		endif;
	}



	function sepetbosalt($v)
	{

		$cek = $v->prepare("delete from anliksepet");
		$cek->execute();



		echo '<div class="alert alert-success text-center">
		
		SEPET BOŞALTILDI
		</div>';
		header("refresh:2, url=site.php");
	}

	function siptamamla($v)
	{


		$cek = $v->prepare("select *  from anliksepet");
		$cek->execute();

		while ($veriler = $cek->fetch(PDO::FETCH_ASSOC)) :


			$urunad = $veriler["urunad"];
			$uyeid = $veriler["uyeid"];
			$fiyat = $veriler["fiyat"];
			$adet = $veriler["adet"];


			$ekle = $v->prepare("insert into siparis (uyeid,urunad,fiyat,adet) VALUES (?,?,?,?)");
			$ekle->bindParam(1, $uyeid, PDO::PARAM_INT);
			$ekle->bindParam(2, $urunad, PDO::PARAM_STR);
			$ekle->bindParam(3, $fiyat, PDO::PARAM_INT);
			$ekle->bindParam(4, $adet, PDO::PARAM_STR);
			$ekle->execute();



		endwhile;


		echo '<div class="alert alert-success text-center">
		
		SİPARİŞ TAMAMLANDI
		</div>';
		header("refresh:2, url=site.php");

		$cek = $v->prepare("delete from anliksepet");
		$cek->execute();
	}
}
