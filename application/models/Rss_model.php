<?php
//Rss_model.php

class Rss_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }//end constructor
    
    public function get_rss($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('rss');
                return $query->result_array();
        }

        $query = $this->db->get_where('rss', array('slug' => $slug));
        return $query->row_array();
}//end get_rss()
    
    
    public function set_rss()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );

    return $this->db->insert('rss', $data);
}
    
    
    
}//end Rss_model