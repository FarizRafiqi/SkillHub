<?php

class PemesananModel
{
    private $table = "pemesanan", $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $sql = <<<SQL
            SELECT $this->table.*, pengguna.nama AS nama_pengguna, kursus.nama AS nama_kursus 
            FROM $this->table, pengguna, kursus
            WHERE $this->table.id_pengguna = pengguna.id
            AND $this->table.id_kursus = kursus.id
        SQL;

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function find($id)
    {
        $sql = <<<SQL
            SELECT $this->table.*, pengguna.nama AS nama_pengguna, kursus.nama AS nama_kursus 
            FROM $this->table, pengguna, kursus
            WHERE $this->table.id_pengguna = pengguna.id
            AND $this->table.id_kursus = kursus.id
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
                '', :id_pengguna, :id_kursus, :total_harga, :tanggal_pesan
            )
        SQL;

        $this->db->query($query);
        $this->db->bind('id_pengguna', $data['id_pengguna']);
        $this->db->bind('id_kursus', $data['id_kursus']);
        $this->db->bind('total_harga', $data['total_harga']);
        $this->db->bind('tanggal_pesan', $data['tanggal_pesan']);

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
                id_pengguna = :id_pengguna,
                id_kursus = :id_kursus,
                total_harga = :total_harga,
                tanggal_pesan = :tanggal_pesan
            WHERE id = :id
        SQL;
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_pengguna', $data['id_pengguna']);
        $this->db->bind('id_kursus', $data['id_kursus']);
        $this->db->bind('total_harga', $data['total_harga']);
        $this->db->bind('tanggal_pesan', $data['tanggal_pesan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function search($keyword)
    {
        $query = <<<SQL
            SELECT $this->table.*, pengguna.nama AS nama_pengguna, kursus.nama AS nama_kursus 
            FROM $this->table, pengguna, kursus
            WHERE $this->table.id_pengguna = pengguna.id
            AND $this->table.id_kursus = kursus.id
            AND $this->table.id = :keyword
        SQL;

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}
