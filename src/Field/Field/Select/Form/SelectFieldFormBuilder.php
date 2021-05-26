<?php

namespace srag\RequiredData\Field\Field\Select\Form;

use ilTextInputGUI;
use srag\CustomInputGUIs\InputGUIWrapperUIInputComponent\InputGUIWrapperUIInputComponent;
use srag\CustomInputGUIs\MultiLineNewInputGUI\MultiLineNewInputGUI;
use srag\CustomInputGUIs\TabsInputGUI\MultilangualTabsInputGUI;
use srag\CustomInputGUIs\TabsInputGUI\TabsInputGUI;
use srag\RequiredData\Field\Field\Select\SelectField;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\FieldsCtrl;
use srag\RequiredData\Field\Form\AbstractFieldFormBuilder;

/**
 * Class SelectFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Select\Form
 */
class SelectFieldFormBuilder extends AbstractFieldFormBuilder
{

    /**
     * @var SelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, SelectField $field)
    {
        parent::__construct($parent, $field);
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        $fields = parent::getFields();

        $fields += [
            "options" => (new InputGUIWrapperUIInputComponent(new MultiLineNewInputGUI(self::requiredData()->getPlugin()->translate("options", FieldsCtrl::LANG_MODULE))))->withRequired(true)
        ];
        $tabs = new TabsInputGUI(self::requiredData()->getPlugin()->translate("label", FieldsCtrl::LANG_MODULE), "label");
        $tabs->setRequired(true);
        MultilangualTabsInputGUI::generateLegacy($tabs, [
            new ilTextInputGUI(self::requiredData()->getPlugin()->translate("label", FieldsCtrl::LANG_MODULE), "label")
        ], true);
        $fields["options"]->getInput()->addInput($tabs);
        $input = new ilTextInputGUI(self::requiredData()->getPlugin()->translate("value", FieldsCtrl::LANG_MODULE), "value");
        $input->setRequired(true);
        $fields["options"]->getInput()->addInput($input);

        return $fields;
    }
}
