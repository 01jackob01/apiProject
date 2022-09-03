<?php

class produkt
{
    /**
     * @var ConnectDb
     */
    private $connectDb;

    public function __construct()
    {
        include_once('ClassLoader.php');
        spl_autoload_register('custom_autoloader');
        $this->connectDb = new ConnectDb();
    }

    public function apiExecute(int $id = 0, $request)
    {
        //$response = '(404) Empty response';
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                $response = $this->getProductFromDatabase($id);
                break;
            case "PUT":
                $this->addNewProductToDatabase($request['description']);
                break;
        }

        return $response;
    }

    private function getProductFromDatabase(int $id)
    {
        if ($id > 0) {
            $sql = "SELECT * FROM test WHERE id = " . $id;
            $request = $this->connectDb->conn->query($sql)->fetchObject();
        } else {
            $sql = "SELECT * FROM test";
            $request = $this->connectDb->conn->query($sql)->fetchAll();
        }
        return $request;
    }

    private function addNewProductToDatabase(string $description)
    {
        $this->connectDb->conn->query("INSERT INTO test (opis) VALUES ('" . $description . "')");
    }
}