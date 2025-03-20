<?php
require_once "Database.php";
class ProductController
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function getAllProducts(): array
    {
        $req = $this->pdo->query("SELECT p.*, l.langue AS langue FROM product p INNER JOIN language l ON p.idLang = l.id");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById(int $id)
    {
        $req = $this->pdo->prepare("SELECT p.*, l.langue AS langue FROM product p INNER JOIN language l ON p.idLang = l.id WHERE p.id = ?");
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);


    }

    public function createProduct($product): bool|string
    {
        $req = $this->pdo->prepare("INSERT INTO product (reference,description,priceTaxIncl,priceTaxExcl,quantity,idLang) VALUES (:reference,:description,:priceTaxIncl,:priceTaxExcl,:quantity,:idLang)");
        $req->execute([
            "reference"    => $product['reference'],
            "description"  => $product['description'],
            "priceTaxIncl" => $product['priceTaxIncl'],
            "priceTaxExcl" => $product['priceTaxExcl'],
            "idLang"       => $product['idLang'],
            "quantity"     => $product['quantity']
        ]);

        return $this->pdo->lastInsertId();

    }

    public function updateProduct(int $id,$data): bool
    {
        $data['id'] = $id;
        $req = $this->pdo->prepare("UPDATE product SET reference = :reference, description = :description, priceTaxIncl = :priceTaxIncl, priceTaxExcl = :priceTaxExcl, idLang = :idLang, quantity = :quantity WHERE id = :id");
        return $req->execute($data);
    }

    public function deleteProduct(int $id): bool
    {
        $req = $this->pdo->prepare("DELETE FROM product WHERE id = ?");
        return $req->execute([$id]);
    }

}