<?php

class SemExpert_TranslationDoctor_Model_Mage_Core_Translate extends Mage_Core_Model_Translate 
{
    protected function _getTranslatedString($text, $code)
    {
        $is_active = Mage::getStoreConfig('dev/translate_doctor/active');
        Varien_Profiler::start('SemExpert_TranslationDoctor::missing_translation');
        if ($is_active && !array_key_exists($code, $this->getData()) && !array_key_exists($text, $this->getData())) 
        {
            Mage::getModel('translationdoctor/missing')->register($code);
            //Mage::log('Missing translation {' . $text . ',' . $code . '}', Zend_Log::DEBUG, 'translations.log', FALSE);
            
        }
        
        Varien_Profiler::stop('SemExpert_TranslationDoctor::missing_translation');
        return parent::_getTranslatedString($text, $code);
        
    }
}

