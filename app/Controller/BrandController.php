<?php

class BrandController {

    private $brandDAO;
    private $Data;

    public function __construct() {
        $this->brandDAO = new BrandDAO();
    }

    //Cadastrar Brands
    public function Cadastrar($Data) {
        $this->Data = $Data;
        if ($Data['brand_name'] && strlen($Data['brand_name']) >= 2 &&
                $Data['brand_status'] >= 1 && $Data['brand_status'] <= 2):
            return $this->brandDAO->Cadastrar($Data);
        else:
            return false;
        endif;
    }

    public function Atualizar($Data, $cod_pk, $id) {
        $this->Data = $Data;
        if ($Data['brand_name'] && strlen($Data['brand_name']) >= 2 &&
                $Data['brand_status'] >= 1 && $Data['brand_status'] <= 2):
            return $this->brandDAO->Atualizar($Data, $cod_pk, $id);
        else:
            return false;
        endif;
    }

    public function findProduct($field, $value) {
        return $this->brandDAO->findProduct($field, $value);
    }

    public function allBrands($inicio = null, $quantidade = null) {
        return $this->brandDAO->allBrands($inicio, $quantidade);
    }
    
    public function listBrands() {
        return $this->brandDAO->listBrands();
    }

    public function countBrand() {
        return $this->brandDAO->countBrand();
    }

    public function Excluir($cod_pk, $id) {
        return $this->brandDAO->Excluir($cod_pk, $id);
    }

}
