<?php

class KategoriModel
{
    private $table = "kategori", $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $sql = <<<SQL
            SELECT * FROM $this->table;
        SQL;

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function find($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = "INSERT INTO $this->table VALUES ('', :nama)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE $this->table 
                  SET nama = :nama 
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function search()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM $this->table WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
