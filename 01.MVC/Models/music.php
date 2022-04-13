<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Music extends Db
{
    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM users';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function edit($update)
    {
        $sql = 'UPDATE users SET email = :email, password = :password WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $update['id'], PDO::PARAM_INT);
        $sth->bindValue(':email', $update['email'], PDO::PARAM_STR);
        $sth->bindValue(':password', $update['password'], PDO::PARAM_STR);
        $sth->execute();
        return $sth;
    }
    public function get($id)
    {
        $sql = 'SELECT * FROM users Where id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
