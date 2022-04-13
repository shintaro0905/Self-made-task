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
    public function get($id)
    {
        $sql = 'SELECT * FROM orders Where id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function upload($order)
    {
        $sql = 'INSERT INTO orders ( name, email, pay_method) VALUES (?, ?, ?)';
        $arr = [];
        $arr[] = $order['fullname'];
        $arr[] = $order['email'];
        $arr[] = $order['paymethod'];
        $sth = $this->dbh->prepare($sql);
        $sth->execute($arr);
        return $sth;
    }
}
