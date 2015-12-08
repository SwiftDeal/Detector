<?php

/**
 * Description of file
 *
 * @author Faizan Ayubi
 */
class Trigger extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     */
    protected $_name;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 1000
     */
    protected $_rule;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_log;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_action;

}
