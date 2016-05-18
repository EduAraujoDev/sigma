<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GCMP extends CI_Controller {

    public function teste() {
        $devices = array('fkLoMHxo8Io:APA91bH-kCWLZGgPha6Ui0_ktaQf5f-QO9JCduoJXnCtPdzspqS3zCmjokuc-Zqdj12ZwqJgmJFkCjvQ5b82AH2_kzLmqyQzwJPfclK1JD3r1N08tTTX50RkrTX65sZuM4r9BxG5G2fp');
        $message = "The message to send";
        $this->load->library('GCMPushMessage');
        $gcpm = new GCMPushMessage();
        $gcpm->setserverApiKey('AIzaSyBbo9uVQdKqGb8FJ5EHvfAP7iht9TwgUQ4');
        $gcpm->setDevices($devices);
        $response = $gcpm->send($message, array('title' => 'Test title'));
        var_dump($response);
        die;
    }

}
