<?php

class PenggunaModel
{
    private $table = "pengguna", $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $sql = <<<SQL
            SELECT $this->table.*, peran.nama AS nama_peran 
            FROM $this->table, peran
            WHERE $this->table.id_peran = peran.id
        SQL;

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function find($id)
    {
        $sql = <<<SQL
            SELECT $this->table.*, peran.nama AS nama_peran 
            FROM $this->table, peran
            WHERE $this->table.id_peran = peran.id AND $this->table.id=:id
        SQL;

        $this->db->query($sql);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = <<<SQL
            INSERT INTO $this->table VALUES (
                '', :id_peran, :nama, :email, :password
            )
        SQL;

        $this->db->query($query);
        $this->db->bind('id_peran', $data['id_peran']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);

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
                id_peran = :id_peran,
                nama = :nama,
                email = :email
        SQL;

        // Bind password hanya jika ada kunci 'password' dalam $data
        if (isset($data['password'])) {
            $query .= ", password = :password";
        }

        $query .= " WHERE id = :id";

        $this->db->query($query);

        $this->db->bind('id_peran', $data['id_peran']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);

        // Bind password hanya jika ada kunci 'password' dalam $data
        if (isset($data['password'])) {
            $this->db->bind('password', $data['password']);
        }

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function search($keyword)
    {
        $query = <<<SQL
            SELECT p.*, peran.nama AS nama_peran 
            FROM $this->table AS p
            JOIN peran ON p.id_peran = peran.id
            WHERE p.nama LIKE :keyword
        SQL;

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function findByEmail($data)
    {
        $sql = <<<SQL
            SELECT * FROM $this->table
            WHERE email = :email
        SQL;

        $this->db->query($sql);
        $this->db->bind('email', $data['email']);
        return $this->db->single();
    }
}
