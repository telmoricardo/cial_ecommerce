<?php

class CategoryController {

    private $categoryDAO;
    private $Data;

    public function __construct() {
        $this->categoryDAO = new CategoryDAO();
    }

    //Cadastrar Category
    public function Cadastrar($Data) {
        $this->Data = $Data;
        if ($Data['category_name'] && strlen($Data['category_name']) >= 5 && 
                $Data['category_status'] >= 1 && $Data['category_status'] <= 2):
            return $this->categoryDAO->Cadastrar($Data);
        else:
            return false;
        endif;
    }

    //Atualizar Category
    public function Atualizar($Data, $cod_pk, $id) {
        $this->Data = $Data;
        if ($Data['category_name'] && strlen($Data['category_name']) >= 5 && 
                $Data['category_status'] >= 1 && $Data['category_status'] <= 2):
            return $this->categoryDAO->Atualizar($Data, $cod_pk, $id);
        else:
            return false;
        endif;
    }
    //excluir category
    public function Excluir($cod_pk, $id) {
        if($id > 0):
            return $this->categoryDAO->Excluir($cod_pk, $id);
        else:
            return false;
        endif;
    }

    public function parentList() {
        return $this->categoryDAO->parentList();
    }  
    
    //retorna qualquer campo da categoria com seu valor
    public function fieldCategory($field, $value){
        return $this->categoryDAO->fieldCategory($field, $value);
    }
    
    public function Pager($sql, $arrayParams = null, $fetchAll = TRUE){
        return $this->categoryDAO->Pager($sql, $arrayParams, $fetchAll);
    }

    public function returnCategory($arrayParams = null, $fetchAll = TRUE) {
        return $this->categoryDAO->returnCategory($arrayParams, $fetchAll);
    }
    
    //QUANTIDADE DE CATEGORIAS QUANDO CATEGORY_PARENT = ID
    public function returnQtdSubcategory($arrayParams = null, $fetchAll = TRUE) {
        return $this->categoryDAO->returnQtdSubcategory($arrayParams, $fetchAll);
    }
    
    //QUANTIDADE DE CATEGORIAS 
    public function RetornaQtdCategory()  {
        return $this->categoryDAO->RetornaQtdCategory();
    }
    

}
