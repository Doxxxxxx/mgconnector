<?php

/**
 * Adminhtml configuration complete block
 *
 * @category   Remarkety
 * @package    Remarkety_Mgconnector
 * @author     Piotr Pierzak <piotrek.pierzak@gmail.com>
 */
namespace Remarkety\Mgconnector\Block\Adminhtml\Configuration; class Complete extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Prepare block
     */
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'complete_id';
        $this->_blockGroup = 'mgconnector';
        $this->_controller = 'adminhtml_configuration';
        $this->_mode = 'complete';

        $ver = Mage::getConfig()->getModuleConfig("Remarkety_Mgconnector")->version;
        $this->_headerText = $this->__('Install Complete (version: %s)', $ver);

        $this->_removeButton('back');
        $this->_removeButton('reset');
        $this->_addButton('save', array(
            'label'     => Mage::helper('adminhtml')->__('Done'),
            'onclick'   => 'editForm.submit();',
            'class'     => 'save',
        ), 1);
    }
}