<?php
require_once(ROOT_PATH . '/Models/product.php');
require_once(ROOT_PATH . '/Models/user.php');
require_once(ROOT_PATH . '/Models/contacts.php');

class ProductsController
{
     private $request;
      private $Products; //Musicモデル
      private $User; //Musicモデル
      private $Contacts; //Contactsモデル


    public function __construct()
    {
    //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

    //モデルオブジェクトの生成
        $this->Products = new Products();
        $this->User = new User();
        $this->Contacts = new Contacts();
    }

    public function authority($role)
    {
        if (isset($this->request['get']['id'])) {
        }
        $product = $this->Product->admin($role);
        $params = [
          'product' => $product,
        ];
        return $params;
    }


    public function index()
    {
    // if (isset($this->request['get']['page'])) {
    // }
        $page = 0;
        if (isset($this->request['get']['page'])) {
            $page = $this->request['get']['page'];
        }

        $product = $this->Products->findAll($page);
        $products_count = $this->Products->countAll();
        $params = [
        'product' => $product,
        'pages' => $products_count / 3
        ];
        return $params;
    }

    public function view()
    {
        if (empty($this->request['get']['id'])) {
            echo "指定のパラメータが不正です。このページを表示できません。";
            exit;
        }

        $products = $this->products->findById($this->request['get']['id']);
        $params = [
          'products' => $products
        ];
        return $params;
    }


    public function upload($prod)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Products->upload($prod);
        return $result;
    }
    public function get($id)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Products->get($id);
        return $result;
    }
    public function getEdit($id)
    {
        if (isset($this->request['get']['page'])) {
        }
        $result = $this->Products->get($id);
        return $result;
    }
    public function update($update)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Products->edit($update);
        return $result;
    }
    public function delete()
    {
        if (empty($this->request['get']['id'])) {
            echo '指定のパラメータが不正です。このページを表示できません。';
            exit;
        }
        $delete = $this->Products->delete($this->request['get']['id']);
        $params[] = $delete;
        return $params;
    }


    public function login($email, $password)
    {
        $result = false;
        if (isset($this->request['get']['id'])) {
        }
        $user = $this->User->getUserBy($email);
        if (!$user) {
            return $result;
        } else {
            if ($user['email'] == $email) {
                if (password_verify($password, $user['password'])) {
                    return $user;
                } else {
                    return $result;
                }
            } else {
                return $result;
            }
        }
    }
}
