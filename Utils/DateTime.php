<?php

class Insulin_Utils_DateTime extends TimeDate
{

    /**
     * Global instance of Insulin_Utils_DateTime.
     * 
     * @var Insulin_Utils_DateTime
     */
    protected static $_instance;
    
    /**
     * Get Insulin_Utils_DateTime instance.
     * 
     * @return Insulin_Utils_DateTime
     */
    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Create a date object from any string
     *
     * Same formats accepted as for DateTime ctor
     *
     * @param string $date
     * @param User $user
     * @return SugarDateTime
     * @throws Insulin_Utils_DateTime_Exception
     */
    public function fromString($date, User $user = null)
    {
        try {
            return new SugarDateTime($date, $this->_getUserTZ($user));
        } catch (Exception $e) {
            require_once 'Insulin/Utils/DateTime/Exception.php';
            throw new Insulin_Utils_DateTime_Exception($date, $e);
        }
    }

    /**
     * Format DateTime object or a string as DB datetime.
     *
     * @param DateTime|string $date
     * @return string
     */
    public function asDb($date)
    {
        if (is_string($date)) {
            $date = $this->fromString($date);
            var_dump($date);
        }
        $date->setTimezone(self::$gmtTimezone);
        return $date->format($this->get_db_date_time_format());
    }
}
