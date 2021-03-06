<?php

namespace Remarkety\Mgconnector\Block\Adminhtml\Install\Complete;

use \Magento\Backend\Block\Widget\Form\Generic;
use \Remarkety\Mgconnector\Model\Install as InstallModel;

class Form extends Generic
{

    public function __construct(\Magento\Backend\Block\Template\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\Data\FormFactory $formFactory,
                                \Magento\Customer\Model\Session $session
    ){
        $this->session = $session;
        parent::__construct($context, $registry, $formFactory);
    }

    protected function _prepareForm()
    {

        $form = $this->_formFactory->create(
        [
            'data' => [
                'id'    => 'edit_form',
                'action' => $this->getUrl('/*/complete'),
                'method' => 'post'
            ]
        ]
        );
        $form->setUseContainer(true);

        $fieldset = $form->addFieldset(
            'general',
            array(
                'legend' => __('Installation Complete')
            )
        );

        $fieldset->addField('mode', 'hidden', array(
            'name' => 'data[mode]',
            'value' => 'complete',
        ));

            $fieldset->addField('instruction', 'note', array(
            'text' => '',
            'label' => false,
            'after_element_html' => '<p style="font-weight:bold;">' . __('Installation complete!') . '</p>'
        ));
        $response = $this->session->getRemarketyLastResponseStatus();
        $response = !empty($response) ? unserialize($response) : array();
        $fieldset->addField('response', 'note', array(
            'label' => false,
            'after_element_html' => !empty($response['info']) ? $response['info'] : __('There is no response to display')
        ));

        $fieldset->addField('button', 'note', array(
        'label' => false,
        'name' => 'button',
        'after_element_html' => '<button id="submit-form" type="button" class="save"><span><span>'
            . 'Done' . '</span></span></button>',
        ));
        $this->setForm($form);

        return parent::_prepareForm();
    }
}