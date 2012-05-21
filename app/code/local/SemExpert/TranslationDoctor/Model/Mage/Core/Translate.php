<?php

class SemExpert_TranslationDoctor_Model_Mage_Core_Translate extends Mage_Core_Model_Translate 
{
    protected function _getTranslatedString($text, $code)
    {
        
        if (!array_key_exists($code, $this->getData()) && !array_key_exists($text, $this->getData())) 
        {
            Mage::log('Missing translation {' . $text . ',' . $code . '}', Zend_Log::DEBUG, 'translations.log');
        }
        
        return parent::_getTranslatedString($text, $code);
        
    }
}

