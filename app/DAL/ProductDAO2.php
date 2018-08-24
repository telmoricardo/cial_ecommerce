<?php

class ProductDAO2 extends Conn {

    private $debug;
    private $Data;
    

    public function Cadastrar($Data) {
        try {
            $this->Data = $Data;
            $productModel = new Products();
            $productModel::Create($Data);
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function Atualizar($Data, $cod_pk, $id) {
        try {
            $this->Data = $Data;
            $productModel = new Products();
            $productModel::Update($Data, $cod_pk, $id);
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function listProduct() {
        try {
            $productModel = new Products();
            $productModel::ReadAll();
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function findProduct($field, $value) {
        try {
            $productModel = new Products();
            $productModel::ReadByField($field, $value);
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    

    public function allProduct($inicio = null, $quantidade = null) {
        try {
            $productModel = new Products();
            $Query = "SELECT * FROM products LIMIT {$inicio}, {$quantidade}";
            $productModel::FullRead($Query, array());
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function countProduct() {
        try {
            $productModel = new Products();
            $Query = "SELECT * FROM products";            
            $productModel::FullRead($Query, array());
            return $total = count($productModel::getResult());
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function Excluir($cod_pk, $id) {
        try {
            $productModel = new Products();
            $productModel::Delele($cod_pk, $id);
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    /****************************** SITE ******************************/
    public function featuredProduct() {
        try {
            $productModel = new Products();
            $Fields = array('featured' => 1,'status' => 1);
            $Query = "SELECT * FROM products WHERE product_featured = :featured AND product_status = :status";
            $productModel::FullRead($Query, $Fields);
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    public function newProduct() {
        try {
            $productModel = new Products();
            $Fields = array('new' => 1,'status' => 1);
            $Query = "SELECT * FROM products WHERE product_new = :new AND product_status = :status";
            $productModel::FullRead($Query, $Fields);
            return $productModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
