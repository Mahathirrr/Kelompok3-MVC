<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;
use PDO;

class Category
{
    private $dbh;
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }


    public function storeCategory()
    {
        if (isset($_POST['submit'])) {
            $catname = $_POST['catname'];
            $ret = "select CategoryName from tblcategory where CategoryName=:catname";
            $query = $this->dbh->prepare($ret);
            $query->bindParam(':catname', $catname, PDO::PARAM_STR);

            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() == 0) {
                $sql = "insert into tblcategory(CategoryName)values(:catname)";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':catname', $catname, PDO::PARAM_STR);

                $query->execute();

                $LastInsertId = $this->dbh->lastInsertId();
                if ($LastInsertId > 0) {
                    echo '<script>alert("Category has been added.")</script>';
                    echo "<script>window.location.href ='index.php?act=add_category'</script>";
                } else {
                    echo '<script>alert("Something Went Wrong. Please try again")</script>';
                }
            } else {

                echo "<script>alert('Category Name Already Exist. Please try again');</script>";
            }
        }
    }


    public function deleteCategory()
    {
        // Code for deleting product from cart
        if (isset($_GET['delid'])) {
            $rid = intval($_GET['delid']);
            $sql = "delete from tblcategory where ID=:rid";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':rid', $rid, PDO::PARAM_STR);
            $query->execute();
            echo "<script>alert('Data deleted');</script>";
            echo "<script>window.location.href = 'index.php?act=manage_category'</script>";
        }
    }

    public function getCategoty()
    {
        $sql = "SELECT * from tblcategory";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    public function editCategory()
    {
        if (isset($_POST['submit'])) {


            $catname = $_POST['catname'];

            $eid = $_GET['editid'];
            $ret = "select CategoryName from tblcategory where CategoryName=:catname";
            $query = $this->dbh->prepare($ret);
            $query->bindParam(':catname', $catname, PDO::PARAM_STR);

            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() == 0) {
                $sql = "update tblcategory set CategoryName=:catname where ID=:eid";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':catname', $catname, PDO::PARAM_STR);

                $query->bindParam(':eid', $eid, PDO::PARAM_STR);

                $query->execute();

                echo '<script>alert("Category name has been updated")</script>';
            } else {

                echo "<script>alert('Category Name Already Exist. Please try again');</script>";
            }
        }
    }

    public function getCategotyByID()
    {
        $eid = $_GET['editid'];
        $sql = "SELECT * from  tblcategory where ID=$eid";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return [
            'results' => $results,
            'query' => $query
        ];
    }

    public function getCountCategory()
    {
        $sql = "SELECT ID from tblcategory ";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return  $query->rowCount();
    }

    public function getCategory()
    {
        $sql2 = "SELECT * from   tblcategory";
        $query2 = $this->dbh->prepare($sql2);
        $query2->execute();
        return $query2->fetchAll(PDO::FETCH_OBJ);
    }
}
