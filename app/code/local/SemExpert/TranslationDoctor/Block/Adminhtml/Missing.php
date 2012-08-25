<?php

class SemExpert_TranslationDoctor_Block_Adminhtml_Missing 
extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'translationdr';
        $this->_controller = 'adminhtml_missing';
        $this->_headerText = 'Missing Translations';
        
        parent::__construct();
        
        $this->_removeButton('add');
    }
    
}
