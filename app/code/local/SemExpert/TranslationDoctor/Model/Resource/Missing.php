<?php

class SemExpert_TranslationDoctor_Model_Resource_Missing extends Mage_Core_Model_Resource_Db_Abstract
{
    //put your code here
    protected function _construct() {
        $this->_init('translationdoctor/missing', 'missing_id');
    }
    
    protected function _initUniqueFields()
    {
        parent::_initUniqueFields();
        
        $this->_uniqueFields = array(
            array(
                'field' => array('locale', 'namespace', 'string'),
                'title' => 'Missing Translation'
            )
        );
        
        
    }
    
    public function register($code)
    {
        
        /* @var $translate SemExpert_TranslationDoctor_Model_Mage_Core_Translate */ 
        $translate = Mage::getSingleton('core/translate');
        
        list($namespace, $string) = explode(Mage_Core_Model_Translate::SCOPE_SEPARATOR, $code, 2);
        
        $adapter = $this->_getWriteAdapter();
        
        $query = "
            INSERT DELAYED IGNORE INTO `{$adapter->getTableName('translationdoctor_missing')}`
            SET 
                {$adapter->quoteInto('`locale` = ?', $translate->getLocale())},
                {$adapter->quoteInto('`namespace` = ?', $namespace)},
                {$adapter->quoteInto('`string` = ?', $string)}
        ";
        
        $adapter->query($query);
        
        return $this;
        
        try {
            $this
                ->setLocale($translate->getLocale())
                ->setNamespace($namespace)
                ->setString($string)
                ->save();
        } catch (Mage_Core_Exception $e) {
            if (strpos($e->getMessage(), 'already exists' === FALSE)) {
                throw $e;
            }
        }
        
        return $this;
        
    }

}

