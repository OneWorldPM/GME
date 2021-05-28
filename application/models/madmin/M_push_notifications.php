<?php

class M_push_notifications extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_push_notifications() {
        $this->db->select('*');
        $this->db->from('push_notification_admin');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return '';
        }
    }

    function add_push_notifications($post) {
        if(isset($post['chk_presenter']) && isset($post['chk_attendee'])){
            $receiver="both";
        }
        if(isset($post['chk_presenter']) && !isset($post['chk_attendee'])){
          $receiver="presenter";
      }
      if(!isset($post['chk_presenter']) && isset($post['chk_attendee'])){
          $receiver="attendee";
      }
      if(!isset($post['chk_presenter']) && !isset($post['chk_attendee'])){
          $receiver=null;
      }

        $visibility = $post['visibility'];
        $visibility = ($visibility == 'null')?null:$visibility;
        $session_redirect = ($post['session_redirect'] == 'null')?null : $post['session_redirect'];
        $data = array(
            'message' => $post['message'],
            'session_id' => $visibility,
            'notification_date' => date("Y-m-d h:i:s"),
            'receiver'=>$receiver,
            'redirect_name'=>($post['redirect_name'])?$post['redirect_name']:null,
            'session_redirect' => $session_redirect
        );
        $this->db->insert('push_notification_admin', $data);
        $pid = $this->db->insert_id();
        if ($pid) {
            return $pid;
        } else {
            return '';
        }
    }

}
