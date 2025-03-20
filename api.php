<?php
header("Content-type: application/json");
require_once "ProductController.php";

$method = $_SERVER["REQUEST_METHOD"];
$controller = new ProductController();



switch ($method) {
    case "GET":
        if (isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            $product = $controller->getProductById($id);
            if ($product) {
                echo json_encode($product);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Product n'existe pas"]);
            }
        } else {
            $products = $controller->getAllProducts();
            echo json_encode($products);
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['reference'], $data['description'], $data['priceTaxIncl'], $data['priceTaxExcl'], $data['idLang'], $data['quantity'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Tous les champs sont requis : reference, description, priceTaxIncl, priceTaxExcl, idLang, quantity']);
            exit;
        }
       $product =  $controller->createProduct($data);
        http_response_code(201);
        echo json_encode($product);
        break;
    case 'PUT':
        if (!isset($_GET["id"])) {
            http_response_code(400);
            echo json_encode(['message' => 'Tous les champs sont requis : id']);
            exit;
        }
        $id = intval($_GET["id"]);
        $data = json_decode(file_get_contents("php://input"), true);
        $productUpdate = $controller->updateProduct($id, $data);
        if($productUpdate) {
            http_response_code(201);
            echo json_encode(["message" => "Produit modifier"]);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'La modificationa echouer']);
        }
        break;
    case "DELETE":
        if (!isset($_GET["id"])) {
            http_response_code(400);
            echo json_encode(['message' => 'Tous les champs sont requis : id']);
            exit;
        }
        $id = intval($_GET["id"]);
        $delete = $controller->deleteProduct($id);
        if($delete) {
            http_response_code(204);
            echo json_encode(["message" => "Produit supprimer"]);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'La suppression echouer']);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method non permise']);
        break;


}



