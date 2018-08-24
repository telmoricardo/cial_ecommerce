<?php

class BrandDAO extends Conn {
    private $debug;
    private $Data;
    
    public function Cadastrar($Data) {
        try {
            $this->Data = $Data;
            $brandModel = new Brands();
            $brandModel::Create($Data);
            return $brandModel::getResult();
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
            $brandModel = new Brands();
            $brandModel::Update($Data, $cod_pk, $id);
            return $brandModel::getResult();
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
            $brandModel = new Brands();
            $brandModel::ReadByField($field, $value);
            return $brandModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function allBrands($inicio = null, $quantidade = null) {
        try {            
            $brandModel = new Brands();            
            $Query = "SELECT * FROM brands ORDER BY brand_id DESC LIMIT {$inicio}, {$quantidade}";
            $brandModel::FullRead($Query, array());
             return $brandModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function listBrands() {
        try {            
            $brandModel = new Brands();            
            $Query = "SELECT * FROM brands WHERE brand_status = 1 ORDER BY brand_id DESC";
            $brandModel::FullRead($Query, array());
             return $brandModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function countBrand() {
        try {
            $brandModel = new Brands();   
            $Query = "SELECT * FROM brands";            
            $brandModel::FullRead($Query, array());
            return $total = count($brandModel::getResult());
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
            $brandModel = new Brands();  
            $brandModel::Delele($cod_pk, $id);
            return $brandModel::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }  
}
