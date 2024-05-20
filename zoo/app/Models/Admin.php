<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;
use PDO;
class Admin
{
    public $dbh;
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function query($query)
    {
        return $this->dbh->query($query);
    }

    function getTotalAnimal()
    {
        $query = $this->dbh->query("SELECT COUNT(*) FROM tblanimal");
        return $query->fetchColumn();
    }

    function getAbout()
    {
        $stmt = $this->dbh->prepare("SELECT * FROM tblpage WHERE PageType = :pageType");
        $stmt->execute(['pageType' => 'aboutus']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTicketTypes() {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM tbltickettype");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addTicket($data) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO tblticindian (visitorName, TicketID, NoAdult, NoChildren, AdultUnitprice, ChildUnitprice) VALUES (:visitorName, :ticketID, :noAdult, :noChildren, :adultUnitPrice, :childUnitPrice)");
        return $stmt->execute($data);
    }

    public static function getAllTickets() {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM tblticindian ORDER BY ID DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteTicket($id) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("DELETE FROM tblticindian WHERE ID = :id");
        return $stmt->execute(['id' => $id]);
    }
}
