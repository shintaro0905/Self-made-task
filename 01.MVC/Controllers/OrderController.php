<?php
require_once(ROOT_PATH . '/Models/order.php');

class OrderController
{
    private $request;
    private $Order; //Musicモデル

    public function __construct()
    {
    //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

    //モデルオブジェクトの生成
        $this->Order = new Order();
    }


    public function index()
    {
        if (isset($this->request['get']['page'])) {
        }
        $order = $this->Order->findAll();
        $params = [
        'order' => $order,
        ];
        return $params;
    }

    public function view()
    {
        if (empty($this->request['get']['id'])) {
            echo "指定のパラメータが不正です。このページを表示できません。";
            exit;
        }

        $order = $this->Order->findById($this->request['get']['id']);
        $params = [
          'oreder' => $order
        ];
        return $params;
    }



    public function upload($order)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Order->upload($order);
        return $result;
    }
    public function get($id)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Order->get($id);
        return $result;
    }
}
