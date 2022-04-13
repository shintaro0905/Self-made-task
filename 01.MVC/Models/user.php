<?php
require_once(ROOT_PATH . '/Models/Db.php');

class User extends Db
{
    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }
  /**
   * ユーザーを登録する
   * @param array $userData
   * @return bool $result
   */

    public function getUserBy($email)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $sth = $this->dbh->prepare($sql);
        $sth->execute(array($email));
        $user = $sth->fetch();
        return $user;
    }
    public function findAll()
    {
        $sql = 'SELECT * FROM users';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
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


    public function upload($users)
    {
    //ユーザ登録
        $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';
        $arr = [];
        $arr[] = $users['fullname'];
        $arr[] = $users['email'];
        $arr[] = password_hash($users['password'], PASSWORD_DEFAULT);
        $sth = $this->dbh->prepare($sql);
        $sth->execute($arr);
    }
    public function changePasswords($email, $password)
    {
        $sql = 'UPDATE users SET password = ? WHERE email = ?';
        $arr = [];
        $arr[] = password_hash($password, PASSWORD_DEFAULT);
        $arr[] = $email;
        $sth = $this->dbh->prepare($sql);
        $sth->execute($arr);
        return $sth;
    }
}
