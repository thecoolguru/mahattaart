<?php

    if (!defined('BASEPATH')) exit('No direct script access allowed');
    /**
    * MSG91 Library file
    * Author: Anbuselvan Rocky (www.fb.me/anburocky3)
    * No Licence bullshit! Use it according to your logic!
    */
    class msg91 {

        public function __construct () {
            //echo "<pre>";
            $this->ci =& get_instance();
            //echo "</pre>";
            //echo "<pre>";
            $this->authKey = "182961AGzU89Qyn95a043144";
            //echo "</pre>";
            //echo "<pre>";
            $this->senderID = "mahatt";
            //echo "</pre>";
        }
        public function send($to, $message) {
            //Your message to send, Add URL encoding here.
            $message = urlencode($message);
            //Define route
            $route = 4;
            //Prepare you post parameters
            $postData = array(
            'authkey' => $this->authKey,
            'mobiles' => $to,
            'message' => $message,
            'sender' => $this->senderID,
            'route' => $route
            );
            //print_r($postData);die();
            //API URL
            $url="http://api.msg91.com/api/sendhttp.php";
            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
            ));

            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            //get response
            $output = curl_exec($ch);

            //Print error if any
            if(curl_errno($ch))    {
                echo 'error:' . curl_error($ch);
            }

            curl_close($ch);

            if ($output) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>
