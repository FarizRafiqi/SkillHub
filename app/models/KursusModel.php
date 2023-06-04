<?php

class KursusModel
{
    private $table = "kursus", $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $sql = <<<SQL
            SELECT $this->table.*, kategori.nama AS nama_kategori, pengguna.nama AS nama_pengguna
            FROM $this->table, kategori, pengguna
            WHERE $this->table.id_kategori = kategori.id
            AND $this->table.id_pengguna = pengguna.id
        SQL;

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function find($id)
    {
        $sql = <<<SQL
            SELECT $this->table.*, kategori.nama AS nama_kategori, pengguna.nama AS nama_pengguna
            FROM $this->table, kategori, pengguna
            WHERE $this->table.id_kategori = kategori.id
            AND $this->table.id_pengguna = pengguna.id
            AND $this->table.id = :id
        SQL;

        $this->db->query($sql);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = <<<SQL
            INSERT INTO $this->table VALUES (
                '', :id_kategori, :id_pengguna, :nama, :total_jam_belajar, :harga, :rating, :deskripsi
            )
        SQL;

        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('id_pengguna', $data['id_pengguna']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('total_jam_belajar', $data['total_jam_belajar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('deskripsi', $data['deskripsi']);

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
            id_kategori = :id_kategori,
            id_pengguna = :id_pengguna,
            nama =:nama,
            total_jam_belajar = :total_jam_belajar,
            harga = :harga, 
            rating = :rating,
            deskripsi = :deskripsi
            WHERE  id= :id
        SQL;

        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('id_pengguna', $data['id_pengguna']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('total_jam_belajar', $data['total_jam_belajar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function search($keyword)
    {
        $query = <<<SQL
            SELECT k.*, kategori.nama AS nama_kategori, pengguna.nama AS nama_pengguna
            FROM $this->table AS k
            JOIN kategori ON k.id_kategori = kategori.id
            JOIN pengguna ON k.id_pengguna = pengguna.id
            WHERE k.nama LIKE :keyword
        SQL;

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
