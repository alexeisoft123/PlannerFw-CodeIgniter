<?php 
/**
 * Forward index controller to Person
 *
 * @package    PlannerFw-CodeIgniter
 * @author     W3plan Technologies <http://w3plan.net>
 * @copyright  Copyright (c) 2015 - 2016
 * @license    MIT <https://opensource.org/licenses/MIT>
 */

require "person.php";

class Index extends Person {
    function __construct()
	{
        parent::__construct();
    }
}
