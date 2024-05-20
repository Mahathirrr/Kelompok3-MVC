<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;
use PDO;
use PDOException;
class Animal
{
    public $dbh;
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function getTotalAnimal()
    {
        $query = $this->dbh->query("SELECT COUNT(*) FROM tblanimal");
        return $query->fetchColumn();
    }

    function getAdultVisitor()
    {
        $query = $this->dbh->query("select sum(NoAdult) as totaladult from tblticindian");
        return $query->fetchColumn();
    }

    function getChildVisitor()
    {
        $query = $this->dbh->query("select sum(NoChildren) as totalchild from tblticindian");
        return $query->fetchColumn();
    }


    function addAnimal()
    {
        if (isset($_POST['submit'])) {
            $aname = $_POST['aname'];
            $cnum = $_POST['cnum'];
            $fnum = $_POST['fnum'];
            $breed = $_POST['breed'];
            $desc = $_POST['desc'];
            $aimg = $_FILES["image"]["name"];
            $extension = substr($aimg, strlen($aimg) - 4, strlen($aimg));
            $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {
                $aimg = md5($aimg) . time() . $extension;
                move_uploaded_file($_FILES["image"]["tmp_name"], "admin/images/" . $aimg);

                try {
                    $pdo = Database::getInstance();
                    $stmt = $pdo->prepare("SELECT CageNumber, FeedNumber FROM tblanimal WHERE CageNumber = :cnum OR FeedNumber = :fnum");
                    $stmt->execute(['cnum' => $cnum, 'fnum' => $fnum]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($result) {
                        echo "<script>alert('This cage number or feed number is already alloted to other animal');</script>";
                    } else {
                        $query = $pdo->prepare("INSERT INTO tblanimal (AnimalName, CageNumber, FeedNumber, Breed, Description, AnimalImage) VALUES (:aname, :cnum, :fnum, :breed, :desc, :aimg)");
                        $query->bindParam(':aname', $aname);
                        $query->bindParam(':cnum', $cnum);
                        $query->bindParam(':fnum', $fnum);
                        $query->bindParam(':breed', $breed);
                        $query->bindParam(':desc', $desc);
                        $query->bindParam(':aimg', $aimg);

                        if ($query->execute()) {
                            echo '<script>alert("Animal detail has been added.")</script>';
                        } else {
                            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
                        }
                    }
                } catch (PDOException $e) {
                    echo '<script>alert("Database error: ' . $e->getMessage() . '")</script>';
                }
            }
        }
    }

    public  function getAllAnimals() {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM tblanimal ORDER BY ID DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
