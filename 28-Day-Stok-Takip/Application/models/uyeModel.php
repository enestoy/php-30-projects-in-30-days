<?php
class uyeModel extends  model
{
    public function control($email,$password)
    {
        $query = $this->db->prepare("select * from uyeler where email =? and password = ? ");
        $query->execute(array($email,$password));
        return $query->rowcount();
    }

    public function permission($id,$permission)
    {
        $data = $this->getData($id);
        if($data['permission']=="")
        {
            return true;
        }
        else {
            $permissions = explode(',', $data['permission']);
            if (in_array($permission, $permissions)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function listview()
    {
        $query = $this->db->prepare('select * from uyeler');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name,$email,$password,$permission)
    {
        $query = $this->db->prepare("insert into uyeler(name,email,password,permission)VALUES (?,?,?,?)");
        $insert = $query->execute(array($name,$email,$password,$permission));
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
        $query = $this->db->prepare("select * from uyeler where id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateData($id,$name,$email,$password,$permission)
    {
        $query = $this->db->prepare("update uyeler set name = ? , email = ? ,password = ? , permission = ?  where id = ?");
        $update = $query->execute(array($name,$email,$password,$permission,$id));
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
        $query = $this->db->prepare("delete from uyeler where id = ?");
        $query->execute(array($id));
    }
}