<?php
require_once(ROOT_PATH . '/Models/user.php');

class UserController
{
    private $request;
    private $User; //Musicモデル

    public function __construct()
    {
    //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

    //モデルオブジェクトの生成
        $this->User = new User();
    }


    public function index()
    {
        if (isset($this->request['get']['page'])) {
        }
        $user = $this->User->findAll();
        $params = [
        'user' => $user,
        ];
        return $params;
    }

    public function view()
    {
        if (empty($this->request['get']['id'])) {
            echo "指定のパラメータが不正です。このページを表示できません。";
            exit;
        }

        $user = $this->User->findById($this->request['get']['id']);
        $params = [
          'user' => $user
        ];
        return $params;
    }



    public function upload($order)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->User->upload($order);
        return $result;
    }

    public function get($id)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->User->get($id);
        return $result;
    }
    public function changePassword($email, $password)
    {
        $result = false;
        $change = $this->User->changePasswords($email, $password);
        if ($change = false) {
            return $result;
        } else {
            $result = true;
            return $result;
        }
    }
}
