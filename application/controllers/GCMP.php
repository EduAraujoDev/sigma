<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GCMP extends CI_Controller {

    public function teste() {
        $devices = array('eI7OTRc6Ow4:APA91bHQBZziePEIA21z7Uvw9GMXYUR9eOrHB3-2Y5lm1KxP58qcuSfSaqJT1VQV3toIyJj_VpcCK2B3SiNqd2JKCZgOWlvj65ok93BzSLZkgTjyWjOrMEilHoZvY2u_7wy4PYVLnR_W');
        $message = "The message to send";
        $this->load->library('GCMPushMessage');
        $gcpm = new GCMPushMessage();
        $gcpm->setserverApiKey('AIzaSyD6vIY905fbC45y-dlSjmPdduOCt75cbYY');
        $gcpm->setDevices($devices);
        $response = $gcpm->send($message, array('title' => 'Test title'));
        var_dump($response);
        die;
    }

}
