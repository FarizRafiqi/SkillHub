<?php

class PembayaranModel
{
    private $table = "pembayaran", $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $sql = <<<SQL
            SELECT tanggal, nominal 
            FROM $this->table
        SQL;

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function find($id)
    {
        $sql = <<<SQL
            SELECT tanggal, nominal 
            FROM $this->table 
            WHERE id=:id
        SQL;

        $this->db->query($sql);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = <<<SQL
            INSERT INTO $this->table VALUES (
                :tanggal, :nominal
            )
        SQL;

        $this->db->query($query);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('nominal', $data['nominal']);

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
        $query = <<<SQL
            UPDATE $this->table SET
                tanggal = :tanggal,
                nominal = :nominal
            WHERE id = :id
        SQL;

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('nominal', $data['nominal']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function search($keyword)
    {
        $query = <<<SQL
            SELECT tanggal, nominal 
            FROM $this->table
            WHERE tanggal LIKE :keyword OR nominal LIKE :keyword
        SQL;

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function findByEmail($data)
    {
        $sql = <<<SQL
            SELECT tanggal, nominal 
            FROM $this->table 
            WHERE email = :email
        SQL;

        $this->db->query($sql);
        $this->db->bind('email', $data['email']);
        return $this->db->single();
    }
}

