<?php

class flxfilemanagerdisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $arrayArchivos = $this->IterateFiles();
        
        //Cargo el array con los archivos
        $this->context->smarty->assign(
            array(
                'arrayArchivos' => $arrayArchivos
            )
        );

        $this->setTemplate('display.tpl');

    }


    public function IterateFiles(){
        //itero por los archivos con scan_Dir
        $directorio1 = '/var/www/alfarodamientos/download/filemanager/carpeta1/';
        $ficheros1  = json_encode(scandir($directorio1));
        
        return $ficheros1;

        return array(
            'Nombre_Archivo' => $ficheros1
        );
    }
}