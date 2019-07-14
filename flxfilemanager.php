<?php
if (!defined('_PS_VERSION_'))
    exit;

class FlxFileManager extends Module
{
    public function __construct()
    {
        $this->name = 'flxfilemanager';
        $this->tab = 'front_office_features';
        $this->version = '0.9.9';
        $this->author = 'Flexxus SA';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Administrador de archivos');
        $this->description = $this->l('> Ingrese su descripción aquí <');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('FLXFILEMANAGER_NAME'))
            $this->warning = $this->l('No name provided');
    }

    public function install()
    {
        if(Shop::isFeatureActive())
            Shop::setContext(Shop::CONTEXT_ALL);
        
        return parent::install() &&
            $this->registerHook('leftColumn') &&
            $this->registerHook('rightColumn') &&
            $this->registerHook('header') &&
            Configuration::updateValue('FLXFILEMANAGER', 'my little config');

            /* TODO */
            /* La instalación DEBE crear la carpeta de DESCARGAS, como así también, brindarle
                los permisos correspondientes editando/creando el HTACCESS */
    }

    public function uninstall()
    {
      if (!parent::uninstall() ||
        !Configuration::deleteByName('FLXFILEMANAGER_NAME')
      )
        return false;
     
      return true;
    }

    /* Añadimos los CSS sobre el header*/
    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path.'css/flxfilemanager.css', 'all');
    }

    public function hookDisplayLeftColumn($params)
    {
        $this->context->smarty->assign(
            array(
                'flxfilemanager' => Configuration::get('FLXFILEMANAGER'),
                'flxfilemanager_link' => $this->context->link->getModuleLink('flxfilemanager', 'display'),
                'my_module_message' => $this->l('This is a simple text message') // Do not forget to enclose your strings in the l() translation method
            )
        );
        
        return $this->display(__FILE__, 'view.tpl');
    }

    

}
