<?php

class ProductDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    public function Cadastrar(Products $product) {
        try {
            $sql = "INSERT INTO products(product_thumb, product_name, product_url, product_ra, product_id_category, product_status, product_id_brand, product_description, 
                product_price, product_price_from, product_stock, product_featured, product_sale, product_bestseller, product_new, product_offer, product_rating) 
                    VALUES (:thumb, :name, :url, :ra, :category, :status, :brand, :description, :price, :price_from, :stock, :featured, :sale, :bestseller, :new, :offer, :rating)";
            $param = array(
                ":thumb" => $product->getProduct_thumb(),
                ":name" => $product->getProduct_name(),
                ":url" => $product->getProduct_url(),
                ":ra" => $product->getProduct_ra(),
                ":category" => $product->getProduct_id_category(),
                ":status" => $product->getProduct_status(),
                ":brand" => $product->getProduct_id_brand(),
                ":description" => $product->getProduct_description(),                
                ":price" => $product->getProduct_price(),
                ":price_from" => $product->getProduct_price_from(),
                ":stock" => $product->getProduct_stock(),
                ":featured" => $product->getProduct_featured(),
                ":sale" => $product->getProduct_sale(),
                ":bestseller" => $product->getProduct_bestseller(),
                ":new" => $product->getProduct_new(),
                ":offer" => $product->getProduct_offer(),
                ":rating" => $product->getProduct_rating()                             
                
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
