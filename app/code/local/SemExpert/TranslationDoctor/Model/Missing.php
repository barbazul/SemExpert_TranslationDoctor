<?php

class SemExpert_TranslationDoctor_Model_Missing extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('translationdoctor/missing');
    }
    
    public function register($code)
    {
        return $this->_getResource()->register($code);
        

    }
}

