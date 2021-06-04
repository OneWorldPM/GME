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

    function get_push_notification_byId(){
        $post = $this->input->post();

        $this->db->select('*');
        $this->db->from('push_notification_admin');
        $this->db->where('push_notification_id', $post['Id']);
        $result = $this->db->get();

        if($result->num_rows() > 0){
            return json_encode($result->result());
        }else{
            return '';
        }

    }

    function update_push_notifications($id){
        $post = $this->input->post();
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
        $this->db->where('push_notification_id', $id);
        $this->db->update('push_notification_admin', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return '';
        }
    }
}
