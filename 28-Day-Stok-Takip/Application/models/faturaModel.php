<?php
class faturaModel extends model
{
    public function listview()
    {
        $query = $this->db->prepare('select * from faturalar');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($musteriid,$fatura_no,$tutar,$aciklama,$tip)
    {
        $query = $this->db->prepare("insert into faturalar(musteriid,fatura_no,tutar,aciklama,tip)VALUES (?,?,?,?,?)");
        $insert = $query->execute(array($musteriid,$fatura_no,$tutar,$aciklama,$tip));
        if($insert)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getData($id)
    {
        $query = $this->db->prepare("select * from faturalar where id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id,$musteriid,$fatura_no,$tutar,$aciklama,$tip)
    {
        $query = $this->db->prepare("update faturalar set musteriid = ?,fatura_no = ?,tutar = ?,aciklama = ?,tip = ?  where id = ?");
        $update = $query->execute(array($musteriid,$fatura_no,$tutar,$aciklama,$tip,$id));
        if($update)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getDelete($id)
    {
        $query = $this->db->prepare("delete from faturalar where id = ?");
        $query->execute(array($id));
    }
}