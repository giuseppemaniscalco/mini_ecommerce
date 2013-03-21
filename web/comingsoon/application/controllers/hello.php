<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function index()
	{
		$this->load->library('parser');
        $this->load->library('email');
		$this->load->library('form_validation');
		
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        

        if ($this->form_validation->run()==FALSE){
            $this->load->helper(array('form', 'url', 'html'));
            $this->load->view('hello_page');
        }
        else{
            $this->load->helper(array('form', 'url', 'html', 'string'));            
            
            $datadb = array(
               'id' => 'NULL',
               'email' => $this->input->post('email')
            );

            $this->db->insert('pre_emails', $datadb);
            			
			$config['protocol'] = 'smtp';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;

            //$this->email->from($this->input->post('email'));
            $this->email->to($this->input->post('email'));
            $this->email->from('mail@purmeo.de');
            $this->email->subject('Purmeo ist bald online!');

            $nachricht = "Schön, dass Sie über Purmeo Bescheid wissen möchten!
            
            Purmeo ist schon bald online.

Sobald die gesamte Website online ist, können Sie den Purmeo Check machen und so Ihren individuellen Nährstoffbedarf feststellen. Außerdem stellen wir die Purmeo Box vor - Ihren individuellen Vitaminschutzschild. Dazu gibt es ein Kennenlern-Video und unser Health-Coach wird Ihnen rundum zur Verfügung stehen.


Wir wissen wie aufregend das alles klingt. Deswegen versprechen wir, dass
Sie sofort Bescheid bekommen, wenn Purmeo ganz für Sie da ist.


Ihr Purmeo Team";


            //$text = utf8_decode($nachricht);
            $text = html_entity_decode($nachricht);
            $mail_content = html_entity_decode($text);
            
            $this->email->message($mail_content);
            $this->email->send();            
           
            $this->load->view('signup_page');
        }
		
	}
	
}
