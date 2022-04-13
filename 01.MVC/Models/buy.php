<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Order extends Db
{
    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM orders';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function upload($prod)
    {
        $sql = 'INSERT INTO orders (id, , category, creater, price, overview) VALUES (?, ?, ?, ?, ?, ?)';
        $arr = [];
        $arr[] = $prod['id'];
        $arr[] = $prod['product'];
        $arr[] = $prod['category'];
        $arr[] = $prod['creater'];
        $arr[] = $prod['price'];
        $arr[] = $prod['overview'];
        $sth = $this->dbh->prepare($sql);
        $sth->execute($arr);
        return $sth;
    }
}
