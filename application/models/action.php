<?php

/**
 * The User Model
 *
 * @author Faizan Ayubi
 */
class Action extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * @label first name
     */
    protected $_name;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 1000
     * 
     * @label rule
     */
    protected $_rule;


    
    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_log;

}
