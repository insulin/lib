<?php
/*
 * This file is part of the Insulin Lib.
 *
 * (c) Clemente Raposo, Filipe Guerra, João Morais
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT
 *   See LICENSE.txt shipped with this library.
 */

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
