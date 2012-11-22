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

class Insulin_Logic_FetchedRow
{

    /**
     * This function should be used on logic hook before_save to allow the
     * reuse of fetched_row on after_save.
     * This should be your first logic hook function to be called.
     *
     * Define this on your logic_hooks.php file:
     * <code>
     * $hook_array['before_save'][] = array(
     *      0,
     *      'Insulin_Logic_FetchedRow::saveFetchedRow',
     *      'custom/library/Insulin/Logic/FetchedRow.php',
     *      'Insulin_Logic_FetchedRow',
     *      'saveFetchedRow'
     *  );
     * </code>
     * 
     * @param SugarBean $bean
     * @param string $event
     * @param string $arguments
     */
    public function saveFetchedRow($bean, $event, $arguments)
    {
        $bean->fetched_row_before = $bean->fetched_row;
    }

    /**
     * This fuction should be used on logic hook after_save to allow the use of
     * fetched_row property on SugarBean.
     * This will replaces fetched_row with fetched_row_before defined on
     * saveFetedRow function of this class.
     * Make sure this is the first hook to run on after_save, so you can use it
     * on the next hooks.
     *
     * Define this on your logic_hooks.php file:
     * <code>
     * $hook_array['after_save'][] = array(
     *      0,
     *      'Insulin_Logic_FetchedRow::replaceFetchedRow',
     *      'custom/library/Insulin/Logic/FetchedRow.php',
     *      'Insulin_Logic_FetchedRow',
     *      'replaceFetchedRow'
     *  );
     * </code>
     *
     * @param SugarBean $bean
     * @param string $event
     * @param string $arguments
     */
    public function replaceFetchedRow($bean, $event, $arguments)
    {
        $bean->fetched_row = $bean->fetched_row_before;
        unset($bean->fetched_row_before);
    }

}
