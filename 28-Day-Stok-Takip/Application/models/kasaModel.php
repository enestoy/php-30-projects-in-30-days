<?php
class kasaModel extends  model
{
    public function listview()
    {
        $query = $this->db->prepare('select * from kasa');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ad)
    {
        $query = $this->db->prepare("insert into kasa(ad)VALUES (?)");
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

    public function getData($id)
    {
        $query = $this->db->prepare("select * from kasa where id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateData($id,$ad)
    {
        $query = $this->db->prepare("update kasa set ad = ?  where id = ?");
        $update = $query->execute(array($ad,$id));
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
        $query = $this->db->prepare("delete from kasa where id = ?");
        $query->execute(array($id));
    }
}