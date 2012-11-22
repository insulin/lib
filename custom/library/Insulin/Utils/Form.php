<?php

class Insulin_Utils_Form
{

    /**
     * Builds HTML select options list to place inside the select tags.
     * 
     * @param array $optionslist Array with key and values to fill the options list
     * @return string
     */
    public static function getSelectOptionsFromArray(array $options)
    {
        global $app_strings;
        
        $html = '';
        foreach ($options as $key => $properties) {
            $selected = isset($properties['selected']) && $properties['selected'] ? ' selected="selected"' : '';
            $disabled = isset($properties['disabled']) && $properties['disabled'] ? ' disabled="disabled"' : '';
            $description = isset($properties['description']) ? $properties['description'] : $app_strings['LBL_NONE'];
            
            $html .= "\n" . '<option value="' . $key . '"' . $selected . $disabled . '>' . $description . '</option>';
        }
        
        return $html;
    }

}
