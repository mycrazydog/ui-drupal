<?php

class modify_contributors_handler_node_meta_contributors extends views_handler_field {

  function construct() {
    parent::construct();
      $this->additional_fields['nid'] = array('table' => 'node', 'field' => 'nid');
      $this->additional_fields['created'] = array('table' => 'node', 'field' => 'created');
  }

  function query(){
  	$this->ensure_my_table();
  	$this->add_additional_fields();
  }


  public function render($values) {
    $nid = $this->get_value($values, 'nid');
    $created = $this->get_value($values, 'created');
    return $nid.'==='.$created;
    //return $values['field_contributors']['und'][0]['nid'];
  }

}
