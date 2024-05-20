<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;
use PDO;

class Contact
{
    private $dbh;
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function simpanData($nim, $nama)
    {
        $rs = $this->dbh->prepare("INSERT INTO mahasiswa (nim,nama) VALUES (?,?)");
        $rs->execute([$nim, $nama]);
    }

    function about()
    {
        $sql = "SELECT * from tblpage where PageType='aboutus'";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $result =  $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $result,
            'query' => $query
        ];
    }

    function contactUs()
    {

        $sql = "SELECT * from tblpage where PageType='contactus'";
        $query =  $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    function contactUsStore()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "insert into tblcontact(Name,Email,Message)values(:name,:email,:message)";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->execute();

        $LastInsertId = $this->dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo "<script>alert('Your message was sent successfully!.');</script>";
            echo "<script>window.location.href ='index.php?act=contact'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
    
    
}
