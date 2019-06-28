<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465, //587 atau 465
            '_smtp_auth' => TRUE,
            'smtp_user' => 'bgsprg@gmail.com', // change it to yours
            'smtp_pass' => 'gembl0n9302', // change it to yours
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',            
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'smtp.gmail.com';
        // $config['smtp_port'] = 465;
        // // $config['smtp_user'] = 'bgsprg@gmail.com'; // change it to yours;
        // // $config['smtp_password'] = 'gembl0n9302';
        // $config['mailpath'] = MAIL_PATH;
        // $config['charset'] = 'UTF-8';
        // $config['mailtype'] = "html";
        // $config['newline'] = "\r\n";
        // $config['wordwrap'] = TRUE;
        
        $CI->email->initialize($config);
        $CI->email->set_newline("\r\n");

        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465, //587 atau 465
            'smtp_user' => 'bgsprg@gmail.com', // change it to yours
            'smtp_pass' => 'gembl0n9302', // change it to yours
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
    }

    // $config = Array(
    //     'protocol' => 'smtp',
    //     'useragent' => 'Codeigniter',                        
    //     'smtp_host' => 'smtp.gmail.com',                        
    //     'smtp_port' => 465, //587 atau 465
    //     'smtp_user' => 'bgsprg@gmail.com', // change it to yours
    //     'smtp_pass' => 'gembl0n9302', // change it to yours
    //     'smtp_crypto' => 'ssl',
    //     'smtp_timeout' => '5',
    //     'mailtype' => 'text','html',
    //     'charset' => 'iso-8859-1','utf-8',
    //     'wordwrap' => TRUE
    // );

    // $this->load->library('email', $config);
                    // $this->email->initialize($config);
                    // $this->email->from('bgsprg@gmail.com.com');
                    // $this->email->to($data1['email']);
                    // $this->email->subject($data1['message']);
                    // $this->email->message($data1['reset_link']);
                    // $this->email->send();

}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        // pre($detail);
        // die;
        
        $CI = setProtocol();        
        
        $CI->email->from('bgsprg@gmail.com', 'Bagas Prayoga');
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
              
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

?>