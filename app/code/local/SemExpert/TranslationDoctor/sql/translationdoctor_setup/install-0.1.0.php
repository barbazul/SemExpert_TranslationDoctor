<?php

$installer = $this;

/**
 * Create table 'translationdoctor/missing'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('translationdoctor/missing'))
    ->addColumn('missing_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Missing Translation ID')
    ->addColumn('namespace', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        'default'   => 'Mage_Core',
        ), 'Module Namespace')
    ->addColumn('string', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        'default'   => 'Translate String',
        ), 'Translation String')
    ->addColumn('locale', Varien_Db_Ddl_Table::TYPE_TEXT, 20, array(
        'nullable'  => false,
        'default'   => 'en_US',
        ), 'Locale')
    ->addIndex($installer->getIdxName('translationdoctor/missing', array('locale', 'namespace', 'string'),
        Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        array('locale', 'namespace', 'string'), array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE))
    ->setComment('Missing Translations Table');
$installer->getConnection()->createTable($table);
