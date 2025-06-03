<?php

class categoryModel extends model
{

    public function create($ad)
    {
        $query = $this->db->prepare("insert into kategori(ad) VALUES (?)");
        $insert = $query->execute(array($ad));
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
        $query = $this->db->prepare('select * from kategori');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($id)
    {
        $query = $this->db->prepare("select * from kategori where id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id,$ad)
    {
        $query = $this->db->prepare("update kategori set ad = ? where id = ?");
        $update = $query->execute(array($ad,$id));
        return $update;
    }
    public function deleteData($id)
    {
        $query = $this->db->prepare("delete from kategori where id = ?");
        $query->execute(array($id));
    }

    public function getExcelId($kategori)
    {
        $query = $this->db->prepare("select * from kategori where ad = ?");
        $query->execute(array($kategori));
        if($query->rowcount()!=0)
        {
            $x = $query->fetch(PDO::FETCH_ASSOC);
            return $x['id'];
        }
        else
        {
            $query = $this->db->prepare("insert into kategori(ad) VALUES (?)");
            $insert = $query->execute(array($kategori));
            return $this->db->lastInsertId();
        }
    }


}