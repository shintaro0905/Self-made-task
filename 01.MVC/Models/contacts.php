<?php
require_once(ROOT_PATH . '/Models/Db.php');

class Contacts extends Db
{
    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM contacts';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function delete($id)
    {
        $sql = 'DELETE FROM contacts WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return $sth;
    }

    public function edit($update)
    {
        $sql = 'UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $update['id'], PDO::PARAM_INT);
        $sth->bindValue(':name', $update['name'], PDO::PARAM_STR);
        $sth->bindValue(':kana', $update['kana'], PDO::PARAM_STR);
        $sth->bindValue(':tel', $update['tel'], PDO::PARAM_INT);
        $sth->bindValue(':email', $update['email'], PDO::PARAM_STR);
        $sth->bindValue(':body', $update['body'], PDO::PARAM_STR);
        $sth->execute();
        return $sth;
    }


    public function upload($contacts)
    {
        $sql = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (?, ?, ?, ?, ?)';
        $arr = [];
        $arr[] = $contacts['fullname'];
        $arr[] = $contacts['katakana'];
        $arr[] = $contacts['phone'];
        $arr[] = $contacts['email'];
        $arr[] = $contacts['message'];
        $sth = $this->dbh->prepare($sql);
        $sth->execute($arr);
        return $sth;
    }

    public function get($id)
    {
        $sql = 'SELECT * FROM contacts Where id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
