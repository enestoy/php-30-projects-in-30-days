<?php


class siparisModel extends model
{

    public function create($musteri_id,$firma_adi,$kullanici_id,$tarih,$fiyat,$urun,$no)
    {
        $query = $this->db->prepare("insert into siparis(musteri_id,firma_adi,kullanici_id,tarih,fiyat,urunler,no) VALUES (?,?,?,?,?,?,?)");
        $insert = $query->execute(array($musteri_id,$firma_adi,$kullanici_id,$tarih,$fiyat,$urun,$no));
        if($insert)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function listview()
    {
        $query = $this->db->prepare('select * from siparis');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($id)
    {
        $query = $this->db->prepare("select * from siparis where id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id,$musteri_id,$firma_adi,$tarih,$fiyat,$urun,$no)
    {
        $query = $this->db->prepare("update siparis set musteri_id = ? , firma_adi = ? , tarih = ? , fiyat = ? , urunler = ? , no = ?  where id = ?");
        $update = $query->execute(array($musteri_id,$firma_adi,$tarih,$fiyat,$urun,$no,$id));
        return $update;
    }
    public function deleteData($id)
    {
        $query = $this->db->prepare("delete from siparis where id = ?");
        $query->execute(array($id));
    }




}