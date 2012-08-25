<?php

class SemExpert_TranslationDoctor_Block_Adminhtml_Missing_Grid
extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('translationdoctor/missing')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    
    protected function _prepareColumns()
    {
        
        $this->addColumn('namespace', array(
            'header'    => 'Module',
            'index'     => 'namespace',
            'width'     => 300,
        ));
        
        $this->addColumn('locale', array(
            'header'    => 'Locale',
            'index'     => 'locale',
            'width'     => 50,
        ));
        
        $this->addColumn('string', array(
            'header'    => 'String',
            'index'     => 'string',
        ));
        
        return parent::_prepareColumns();
    }
}
