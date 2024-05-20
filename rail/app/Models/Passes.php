<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;
use PDO;

class Passes
{
    private $dbh;
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    

    public function storePass()
    {
        if (isset($_POST['submit'])) {


            $fname = $_POST['fullname'];
            $cnum = $_POST['cnumber'];
            $email = $_POST['email'];
            $itype = $_POST['identitytype'];
            $icnum = $_POST['icnum'];
            $cat = $_POST['category'];
            $source = $_POST['source'];
            $des = $_POST['destination'];
            $tc = $_POST['trainclass'];
            $fdate = $_POST['fromdate'];
            $tdate = $_POST['todate'];
            $cost = $_POST['cost'];
            $passnum = mt_rand(100000000, 999999999);
            $propic = $_FILES["propic"]["name"];
            $wtype = $_POST['waytype'];
            $extension = substr($propic, strlen($propic) - 4, strlen($propic));
            $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {

                $propic = md5($propic) . time() . $extension;
                move_uploaded_file($_FILES["propic"]["tmp_name"], "admin/images/" . $propic);
                $sql = "insert into tblpass(PassNumber,FullName,ProfileImage,ContactNumber,Email,IdentityType,IdentityCardno,Category,Source,Destination,TrainClass,FromDate,ToDate,Cost,wayType)values(:passnum,:fname,:propic,:cnum,:email,:itype,:icnum,:cat,:source,:des,:tc,:fdate,:tdate,:cost,:wtype)";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':passnum', $passnum, PDO::PARAM_STR);
                $query->bindParam(':fname', $fname, PDO::PARAM_STR);
                $query->bindParam(':cnum', $cnum, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':itype', $itype, PDO::PARAM_STR);
                $query->bindParam(':icnum', $icnum, PDO::PARAM_STR);
                $query->bindParam(':cat', $cat, PDO::PARAM_STR);
                $query->bindParam(':source', $source, PDO::PARAM_STR);
                $query->bindParam(':des', $des, PDO::PARAM_STR);
                $query->bindParam(':tc', $tc, PDO::PARAM_STR);
                $query->bindParam(':fdate', $fdate, PDO::PARAM_STR);
                $query->bindParam(':tdate', $tdate, PDO::PARAM_STR);
                $query->bindParam(':cost', $cost, PDO::PARAM_STR);
                $query->bindParam(':propic', $propic, PDO::PARAM_STR);
                $query->bindParam(':wtype', $wtype, PDO::PARAM_STR);
                $query->execute();

                $LastInsertId = $this->dbh->lastInsertId();
                if ($LastInsertId > 0) {
                    // echo '<script>alert("Pass detail has been added.")</script>';
                    // echo "<script>window.location.href ='index.php?act=add_pass'</script>";
                } else {
                    // echo '<script>alert("Something Went Wrong. Please try again")</script>';
                }
            }
        }
    }

    public function getPass()
    {
        $sql = "SELECT * from tblpass";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    public function getPassByID()
    {
        $vid = $_GET['viewid'];
        $sql = "SELECT * from  tblpass where ID=$vid";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return [
            'results' => $results,
            'query' => $query
        ];
    }

    public function editPass()
    {
        if (isset($_POST['submit'])) {


            $fname = $_POST['fullname'];
            $cnum = $_POST['cnumber'];
            $email = $_POST['email'];
            $itype = $_POST['identitytype'];
            $icnum = $_POST['icnum'];
            $cat = $_POST['category'];
            $source = $_POST['source'];
            $des = $_POST['destination'];
            $tc = $_POST['trainclass'];
            $fdate = $_POST['fromdate'];
            $tdate = $_POST['todate'];
            $cost = $_POST['cost'];
            $eid = $_GET['viewid'];
            $wtype = $_POST['waytype'];
            $sql = "update tblpass set FullName=:fname,ContactNumber=:cnum,Email=:email,IdentityType=:itype,IdentityCardno=:icnum,Category=:cat,Source=:source,Destination=:des,TrainClass=:tc,FromDate=:fdate,ToDate=:tdate, Cost=:cost,wayType=:wtype where ID=:eid";
            $query = $this->dbh->prepare($sql);

            $query->bindParam(':fname', $fname, PDO::PARAM_STR);
            $query->bindParam(':cnum', $cnum, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':itype', $itype, PDO::PARAM_STR);
            $query->bindParam(':icnum', $icnum, PDO::PARAM_STR);
            $query->bindParam(':cat', $cat, PDO::PARAM_STR);
            $query->bindParam(':source', $source, PDO::PARAM_STR);
            $query->bindParam(':des', $des, PDO::PARAM_STR);
            $query->bindParam(':tc', $tc, PDO::PARAM_STR);
            $query->bindParam(':fdate', $fdate, PDO::PARAM_STR);
            $query->bindParam(':tdate', $tdate, PDO::PARAM_STR);
            $query->bindParam(':cost', $cost, PDO::PARAM_STR);
            $query->bindParam(':wtype', $wtype, PDO::PARAM_STR);
            $query->bindParam(':eid', $eid, PDO::PARAM_STR);
            $query->execute();


            echo '<script>alert("Pass Detail has been updated")</script>';
        }
    }


    public function updateImage()
    {
        if (isset($_POST['submit'])) {

            $eid = $_GET['viewid'];
            $propic = $_FILES["propic"]["name"];
            $extension = substr($propic, strlen($propic) - 4, strlen($propic));
            $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {

                $propic = md5($propic) . time() . $extension;
                move_uploaded_file($_FILES["propic"]["tmp_name"], "admin/images/" . $propic);

                $query = "update tblpass set ProfileImage=:propic where ID=:eid";
                $query = $this->dbh->prepare($query);
                $query->bindParam(':propic', $propic, PDO::PARAM_STR);
                $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                $query->execute();

                echo '<script>alert("Profile pic has been updated")</script>';
                header("location:index.php?act=changeimage&viewid=$eid");
            }
        }
    }

    function SearchPass($sdata)
    {

        $sql = "SELECT * from tblpass where PassNumber like '$sdata%'";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }
    public function getCountPass()
    {
        $sql = "SELECT ID from tblpass";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $query->rowCount();
    }
    public function toDayPass()
    {
        $sql = "SELECT ID from tblpass where date(PasscreationDate)=CURDATE()";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $query->rowCount();
    }

    public function yesPass()
    {
        $sql = "SELECT ID from tblpass where date(PasscreationDate)=CURDATE()-1";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $query->rowCount();
    }

    public function sevenPass()
    {
        $sql = "SELECT ID from tblpass where date(PasscreationDate)>=(DATE(NOW()) - INTERVAL 7 DAY)";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $query->rowCount();
    }


    function getPassDate()
    {
        $fdate = $_POST['fromdate'];
        $tdate = $_POST['todate'];
        $sql = "SELECT * from tblpass where date(PasscreationDate) between '$fdate' and '$tdate'";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }
}
