<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Helpers of the project
 * 
 * @package    PlannerFw-CodeIgniter
 * @author     W3plan Technologies <http://w3plan.net>
 * @copyright  Copyright (c) 2015 - 2016
 * @license    MIT <https://opensource.org/licenses/MIT>
 */

 /**
 * PlannerFw data model one 
 * 
 * @param   void 
 * @return  string 
 */
function getDataA() 
{
	return <<<DOC
        {
          "description": "Persons list of PlannerFw data model",
          "expiration": 0,
          "pfDataSet": {
            "pagination": "%s",    
            "set_empty": "&nbsp;",
            "persons": %s
          }
        }
DOC;
}

 /**
 * PlannerFw data model two 
 * 
 * @param   void 
 * @return  string 
 */
function getDataB() 
{
	return <<<DOC
        {
            "description": "Persons view of PlannerFw data model",
            "expiration": 0,
            "pfDataSet": {
                "title": "%s",
                "link_back": "%s",
                "person": %s
            }
        }
DOC;
}

 /**
 * PlannerFw data model three 
 * 
 * @param   void 
 * @return  string
 */
function getDataC() 
{
	return <<<DOC
        {
            "description": "Persons view of PlannerFw data model",
            "expiration": 0,
            "pfDataSet": {
              "title": "%s",
              "message": "%s",
              "action": "%s",
              "link_back": "%s",
              "id": "%s",
              "name": "%s",
              "gender": "%s",
              "dob": "%s"
              }
        }
DOC;
}

