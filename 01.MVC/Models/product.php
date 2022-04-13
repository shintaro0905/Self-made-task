<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Products extends Db
{
    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }

    public function findAll($page = 0): array
    {
        $sql = 'SELECT * FROM products';
        $sql .= ' LIMIT 3 OFFSET ' . (3 * $page);

        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function countAll(): Int
    {
        $sql = 'SELECT count(*) as count FROM products';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $count = $sth->fetchColumn();
        return $count;
    }
    public function public($prodpage): Int
    {
        $sql = 'SELECT count(*) as count FROM products' . $prodpage;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchColumn();
        return $result;
    }

    public function admin($role)
    {
        $sql = 'SELECT * FROM users WHERE role = ?';
        $sth = $this->dbh->prepare($sql);
        $sth->execute(array($role));
        $user = $sth->fetch();
        return $user;
    }

    public function upload($prod)
    {
        $sql = 'INSERT INTO products (product, category, creater, price, overview) VALUES (?, ?, ?, ?, ?)';
        $arr = [];
        $arr[] = $prod['product'];
        $arr[] = $prod['category'];
        $arr[] = $prod['creater'];
        $arr[] = $prod['price'];
        $arr[] = $prod['overview'];
        $sth = $this->dbh->prepare($sql);
        $sth->execute($arr);
        return $sth;
    }
    public function edit($update)
    {
        $sql = 'UPDATE products SET product = :product, category = :category, creater = :creater, price = :price, overview = :overview WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $update['id'], PDO::PARAM_INT);
        $sth->bindValue(':product', $update['product']);
        $sth->bindValue(':category', $update['category'], PDO::PARAM_STR);
        $sth->bindValue(':creater', $update['creater'], PDO::PARAM_STR);
        $sth->bindValue(':price', $update['price'], PDO::PARAM_STR);
        $sth->bindValue(':overview', $update['overview'], PDO::PARAM_STR);
        $sth->execute();
        return $sth;
    }
    public function get($id)
    {
        $sql = 'SELECT * FROM products Where id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM products WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return $sth;
    }
}
