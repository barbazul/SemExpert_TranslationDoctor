<?php

class SemExpert_TranslationDoctor_Model_Resource_Missing_Collection extends  Mage_Core_Model_Resource_Db_Collection_Abstract 
{
    protected function _construct() {
        $this->_init('translationdoctor/missing');
    }
}

