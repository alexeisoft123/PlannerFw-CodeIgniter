<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller of the project
 * 
 * @package    PlannerFw-CodeIgniter
 * @author     W3plan Technologies <http://w3plan.net>
 * @copyright  Copyright (c) 2015 - 2016
 * @license    MIT <https://opensource.org/licenses/MIT>
 */

class Person extends CI_Controller {

  // number of records per page
  private $limit = 10;
  
  function __construct()
  {
    parent::__construct();
    
    // load library
    $this->load->library(array('table','form_validation'));
    
    // load helper
    $this->load->helper(array('url', 'form', 'base'));
    
    // load model
    $this->load->model('Person_model','',TRUE);
  }
  
  function index($offset = 0)
  {
    // offset
    $uri_segment = 3;
    $offset = $this->uri->segment($uri_segment);
    
    // generate pagination
    $this->load->library('pagination');
    $config['base_url'] = site_url('person/index/');
     $config['total_rows'] = $this->Person_model->count_all();
     $config['per_page'] = $this->limit;
    $config['uri_segment'] = $uri_segment;
    $this->pagination->initialize($config);
    
    $pagination = $this->pagination->create_links();    
    // replace " with ' as JSON string can't include " inside     
    $pagination = str_replace('"', "'", $pagination);
    
    // load data
    $persons = $this->Person_model->get_paged_list($this->limit, $offset)->result();    
    $persons = json_encode($persons);
    
    // assigned template url
    $data['pftml'] = "/template/pfm/a/person-list.html.js";
    
    // assigned model variable 
    $data['pfmdl'] = sprintf(getDataA(), $pagination, $persons);
    
    $this->load->view('be-index', $data);
  }
  
  function add()
  {
    // set empty default form field values
    $this->_set_fields();
    // set validation properties
    $this->_set_rules();
    
    // set common properties
    $title = 'Add new person';
    $message = '';
    $action = site_url('person/addPerson');
    
    $link_back = anchor('person/index/','Back to list of persons',array('class'=>'back'));    
    // replace " with ' as JSON string can't include " inside     
    $link_back = str_replace('"', "'", $link_back);
    
    $id = $this->form_data->id;
    $name = $this->form_data->name;
    $gender = $this->form_data->gender;
    $dob = $this->form_data->dob;
    
    // assigned template url
    $data['pftml'] = "/template/pfm/a/person-edit.html.js";
    // assigned model variable 
    $data['pfmdl'] = sprintf(getDataC(), $title, $message, $action, $link_back, $id, $name, $gender, $dob);

    // load view
    $this->load->view('be-index', $data);
  }
  
  function addPerson()
  {
    // set common properties
    $title = 'Add new person';
    $action = site_url('person/addPerson');
    
    $link_back = anchor('person/index/','Back to list of persons',array('class'=>'back'));    
    // replace " with ' as JSON string can't include " inside     
    $link_back = str_replace('"', "'", $link_back);
    
    // set empty default form field values
    $this->_set_fields();
    // set validation properties
    $this->_set_rules();
    
    // run validation
    if ($this->form_validation->run() == FALSE)
    {
      $message = '';
    }
    else
    {
      // save data
      $person = array('name' => $this->input->post('name'),
              'gender' => $this->input->post('gender'),
              'dob' => date('Y-m-d', strtotime($this->input->post('dob'))));
      $id = $this->Person_model->save($person);
      
      // set user message
      $message = "<div class='success'>add new person success</div>";
    }
    
    $id = $this->form_data->id;
    $name = $this->form_data->name;
    $gender = $this->form_data->gender;
    $dob = $this->form_data->dob;
    
    // assigned template url
    $data['pftml'] = "/template/pfm/a/person-edit.html.js";
    // assigned model variable 
    $data['pfmdl'] = sprintf(getDataC(), $title, $message, $action, $link_back, $id, $name, $gender, $dob);
    
    // load view
    $this->load->view('be-index', $data);
  }
  
  function view($id)
  {
    // set common properties
    $title = 'Person Details';
    
    $link_back = anchor('person/index/','Back to list of persons',array('class'=>'back'));    
    // replace " with ' as JSON string can't include " inside     
    $link_back = str_replace('"', "'", $link_back);
    
    // get person details
    $person = $this->Person_model->get_by_id($id)->row();    
    $person = json_encode($person);
    
    // assigned template url
    $data['pftml'] = "/template/pfm/a/person-view.html.js";
    
    // assigned model variable 
    $data['pfmdl'] = sprintf(getDataB(), $title, $link_back, $person);
    
    // load view
    $this->load->view('be-index', $data);
  }
  
  function update($id)
  {
    // set validation properties
    $this->_set_rules();
    
    // prefill form values
    $person = $this->Person_model->get_by_id($id)->row();
    $this->form_data->id = $id;
    $this->form_data->name = $person->name;
    $this->form_data->gender = strtoupper($person->gender);
    $this->form_data->dob = date('d-m-Y',strtotime($person->dob));
    
    // set common properties
    $title = 'Update person';
    $message = '';
    $action = site_url('person/updatePerson');
    
    $link_back = anchor('person/index/','Back to list of persons',array('class'=>'back'));    
    // replace " with ' as JSON string can't include " inside     
    $link_back = str_replace('"', "'", $link_back);
    
    $id = $this->form_data->id;
    $name = $this->form_data->name;
    $gender = $this->form_data->gender;
    $dob = $this->form_data->dob;
    
    // assigned template url
    $data['pftml'] = "/template/pfm/a/person-edit.html.js";
    // assigned model variable 
    $data['pfmdl'] = sprintf(getDataC(), $title, $message, $action, $link_back, $id, $name, $gender, $dob);
    
    // load view
    $this->load->view('be-index', $data);
  }
  
  function updatePerson()
  {
    // set common properties
    $title = 'Update person';
    $action = site_url('person/updatePerson');
    
    $link_back = anchor('person/index/','Back to list of persons',array('class'=>'back'));
    // replace " with ' as JSON string can't include " inside     
    $link_back = str_replace('"', "'", $link_back);
    
    // set empty default form field values
    $this->_set_fields();
    // set validation properties
    $this->_set_rules();
    
    // run validation
    if ($this->form_validation->run() == FALSE)
    {
      $message = '';
    }
    else
    {
      // save data
      $id = $this->input->post('id');
      $person = array('name' => $this->input->post('name'),
              'gender' => $this->input->post('gender'),
              'dob' => date('Y-m-d', strtotime($this->input->post('dob'))));
      $this->Person_model->update($id,$person);
      
      // set user message
      $message = "<div class='success'>update person success</div>";
    }
    
    $id = $this->form_data->id;
    $name = $this->form_data->name;
    $gender = $this->form_data->gender;
    $dob = $this->form_data->dob;
    
    // assigned template url
    $data['pftml'] = "/template/pfm/a/person-edit.html.js";
    // assigned model variable 
    $data['pfmdl'] = sprintf(getDataC(), $title, $message, $action, $link_back, $id, $name, $gender, $dob);
    
    // load view
    $this->load->view('be-index', $data);
  }
  
  function delete($id)
  {
    // delete person
    $this->Person_model->delete($id);
    
    // redirect to person list page
    redirect('person/index/','refresh');
  }
  
  // set empty default form field values
  function _set_fields()
  {
    $this->form_data->id = '';
    $this->form_data->name = '';
    $this->form_data->gender = '';
    $this->form_data->dob = '';
  }
  
  // validation rules
  function _set_rules()
  {
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
    $this->form_validation->set_rules('dob', 'DoB', 'trim|required|callback_valid_date');
    
    $this->form_validation->set_message('required', '* required');
    $this->form_validation->set_message('isset', '* required');
    $this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
  }
  
  // date_validation callback
  function valid_date($str)
  {
    //match the format of the date
    if (preg_match ("/^([0-9]{2})-([0-9]{2})-([0-9]{4})$/", $str, $parts))
    {
      //check weather the date is valid of not
      if(checkdate($parts[2],$parts[1],$parts[3]))
        return true;
      else
        return false;
    }
    else
      return false;
  }
}
?>
