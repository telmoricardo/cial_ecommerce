<?php

class CategoryDAO extends Categories {

    private $debug;
    private $Data;
    private $total;

    public function Cadastrar($Data) {
        try {
            $this->Data = $Data;
            $category = new Categories();
            $category::Create($Data);
            return $category::getResult();
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
            $categories = new Categories();
            $categories::Update($Data, $cod_pk, $id);
            return $categories::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }   
    
    //excluir category
    public function Excluir($cod_pk, $id) {
        try {
            $categories = new Categories();
            $categories::Delele($cod_pk, $id);
            return $categories::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //Todas asc categorias quando category_parent for igual IS NULL
    public function parentList() {
        try {
            $categories = new Categories();
            $Query = "SELECT * FROM `categories` WHERE category_parent IS NULL";
            $categories::FullRead($Query);
            return $categories::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    //retorna qualquer campo da categoria com seu valor
    public function fieldCategory($field, $value){
        try {
            $categories = new Categories();
            $categories::ReadByField($field, $value);
            return $categories::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //Todas asc categorias quando category_parent for igual IS NULL COM LIMITE
    public function Pager($sql, $arrayParams = null, $fetchAll = TRUE) {
        try {
            $categories = new Categories();
            $categories::SQLGeneric($sql, $arrayParams, $fetchAll);
            return $categories::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retonando as subcategorias
    public function returnCategory($arrayParams = null, $fetchAll = TRUE) {
        try {
            $sql = "SELECT * FROM categories WHERE category_parent = ?";
            $categories = new Categories();
            $categories::SQLGeneric($sql, $arrayParams, $fetchAll);
            return $categories::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    //QUANTIDADE DE CATEGORIAS QUANDO CATEGORY_PARENT = ID
    public function returnQtdSubcategory($arrayParams = null, $fetchAll = TRUE) {
        try {
            $sql = "SELECT * FROM categories WHERE category_parent = ?";
            $categories = new Categories();
            $categories::SQLGeneric($sql, $arrayParams, $fetchAll);
            return $categories::getResult();
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //QUANTIDADE DE CATEGORIAS
    public function RetornaQtdCategory() {
        try {
            $categories = new Categories();
            $Query = "select * FROM categories WHERE category_parent IS NULL";
            $categories::FullRead($Query);
            $this->total = count($categories::getResult());
            if ($this->total != null):
                return $this->total;
            else:
                return null;
            endif;        
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    
    
}
