<?php 

namespace Source\Core; 

class Core 
{

    public function manageQuery($url)
    {
        $directory = "Source\\Controller\\";
        
        if (isset($url['pagina'])) {
            $correspodentController = $directory . ucfirst($url['pagina'] . 'Controller');
        } else {
            $correspodentController = $directory . "EstoqueController";
        }

        if (isset($url['method'])) {
            $acao = $url['method'];
        } else {
            $acao = 'core';
        } 

        if(!class_exists($correspodentController)) {
           $correspodentController = $directory . "InventoryController";
        } 

        if (isset($url['id']) && $url['id'] != null) {
            $id = $url['id'];
        } else {
            $id = null;
        }

     

        call_user_func_array(array(new $correspodentController, $acao), array($id));

    }


}