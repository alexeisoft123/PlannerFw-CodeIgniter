PlannerFw
-----------

PlannerFw is an application layer or middleware between server output and result page on web browser with a 
collection of setting and rules. Main PlannerFw rules are:

(1). PlannerFw transmits JavaScript code through network instead of HTML page code, PlannerFw automatically 
     compile HTML and CSS code to JavaScript functions.
     
(2). Data and presentation separated rule: There is no response including data model and template contents 
     together, data model and template contents can not be output in one same response.
     
(3). Presentation rule: Both client and server can assign template or layout template to the result page.

(4). PlannerFw supports JSOM data model and XML data model, which could be retrieved through HTTP/HTTPS and 
     WebSocket/WebSocket Secure, and PlannerFw supports JWT (JSON Web Token) to access data models for 
     authentication and information exchange.


CodeIgniter
------------

CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and 
elegant toolkit to create full-featured web applications.


Project environment
--------------------

PHP, MySql, Apache, CodeIgniter 2 and up, PlannerFw Exec


Project installation
---------------------

Point virtual host to public_html folder in Apache setting;
Set empty string to values of $config['base_url'] and $config['index_page'] in application/config/config.php;
Set database connection properties in application/config/database.php;
Import ddl_dml.sql to MySql;

This project includes PlannerFw Exec already, if you want to create new templates or update existed templates for
this project, you have to download Community Edition from http://w3plan.net/, release it, copy pfdevelop folder 
to the folder of this project, then set value to siteRootPath in pfdevelop/preprocessor/pfwatch.json  


Documentation and help
-----------------------

PlannerFw documentation: http://w3plan.net/customer/plannerfw

General inquiries and feedback: contact@w3plan.net

Purchase and licensing inquiries: sales@w3plan.net

Send question tickets: http://w3plan.net/support/index

