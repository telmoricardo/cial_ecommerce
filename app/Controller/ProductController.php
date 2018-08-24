<?php

class ProductController {

    private $productDAO;
    private $Data;

    public function __construct() {
//        $this->productDAO = new ProductDAO();
        $this->productDAO = new ProductDAO2();
    }

    //Cadastrar Brands
    public function Cadastrar($Data) {
        $this->Data = $Data;
        if ($Data['product_name'] != '' && strlen($Data['product_name']) >= 2 &&
                $Data['product_id_category'] != '' && $Data['product_id_brand'] != '' &&
                $Data['product_status'] >= 1 && $Data['product_status'] <= 2 && $Data['product_price'] != ''):
            return $this->productDAO->Cadastrar($Data);
        else:
            return false;
        endif;
    }
    
    public function Atualizar($Data, $cod_pk, $id) {
        return $this->productDAO->Atualizar($Data, $cod_pk, $id);
    }

    public function listProduct() {
        return $this->productDAO->listProduct();
    }

    public function findProduct($field, $value) {
        return $this->productDAO->findProduct($field, $value);
    }

    

    public function allProduct($inicio = null, $quantidade = null) {
        return $this->productDAO->allProduct($inicio, $quantidade);
    }

    public function countProduct() {
        return $this->productDAO->countProduct();
    }


    public function Excluir($cod_pk, $id) {
        return $this->productDAO->Excluir($cod_pk, $id);
    }
    
    /****************************** SITE ******************************/
    public function featuredProduct() {
        return $this->productDAO->featuredProduct();
    }
    
    public function newProduct() {
        return $this->productDAO->newProduct();
    }

    

}
