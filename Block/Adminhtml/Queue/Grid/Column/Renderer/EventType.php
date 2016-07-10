<?php

/**
 * Adminhtml queue grid status column renderer block
 *
 * @category   Remarkety
 * @package    Remarkety_Mgconnector
 * @author     Piotr Pierzak <piotrek.pierzak@gmail.com>
 */
namespace Remarkety\Mgconnector\Block\Adminhtml\Queue\Grid\Column\Renderer; class EventType
    extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * Column renderer
     *
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        try {
			$payload = json_encode(unserialize($row->getData('payload')));
        } catch (\Exception $e) {
        	$payload = "?";
        }
		return '<span title="'.htmlentities($payload).'">'.$value.'</span>';
    }
}