<?php
require_once(ROOT_PATH . '/Models/contacts.php');


class ContactsController
{
    private $request;
    private $Contacts;


    public function __construct()
    {
    //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        $this->Contacts = new Contacts();
    }


    public function index()
    {
        if (isset($this->request['get']['page'])) {
        }

        $contacts = $this->Contacts->findAll();
        $params = [
        'contacts' => $contacts,
        ];
         return $params;
    }

    public function view()
    {
        if (empty($this->request['get']['id'])) {
            echo "指定のパラメータが不正です。このページを表示できません。";
            exit;
        }

        $contacts = $this->contacts->findById($this->request['get']['id']);
        $params = [
          'contacts' => $contacts
        ];
        return $params;
    }

    public function delete()
    {
        if (empty($this->request['get']['id'])) {
            echo '指定のパラメータが不正です。このページを表示できません。';
            exit;
        }
        $delete = $this->Contacts->delete($this->request['get']['id']);
        $params[] = $delete;
        return $params;
    }

    public function upload($contacts)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Contacts->upload($contacts);
        return $result;
    }


    public function get($id)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Contacts->get($id);
        return $result;
    }


    public function update($update)
    {
        if (isset($this->request['get']['id'])) {
        }
        $result = $this->Contacts->edit($update);
        return $result;
    }

    public function getEdit($id)
    {
        if (isset($this->request['get']['page'])) {
        }
        $result = $this->Contacts->get($id);
        return $result;
    }
}
