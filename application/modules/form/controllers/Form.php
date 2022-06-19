<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends HY_Controller{

	function __construct(){

		parent::__construct();

		$this->load->library('session');

		$this->load->library('upload');

        $this->load->model('settings/settings_model');

		$this->load->model('form/form_model');

		$this->load->model('form/form_setting_model');

	}

	public function list(){

		$data['forms'] = $this->form_model->all();

		foreach($data['forms'] as $key => $form){
			$data['forms'][$key]['created_at'] = dateFormat($form['created_at']);
			$data['forms'][$key]['created_at'] = dateFormat($form['updated_at']);
		}

		$this->content = 'form/list';

		$this->layout_admin($data);

	}

    public function listwoo(){

       $data['forms'] = $this->form_model->all();

        foreach($data['forms'] as $key => $form){
            $data['forms'][$key]['created_at'] = dateFormat($form['created_at']);
            $data['forms'][$key]['created_at'] = dateFormat($form['updated_at']);
        }

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($data['forms']));

    }

	public function settings($id){

		$data['form'] = $this->form_setting_model->findById($id);

		$data['message'] = $this->session->flashdata('message');

		$this->content = 'form/settings';

		$this->layout_admin($data);

	}

	public function create(){

		$form_data = $this->form_model->all();

		$form_shortcode_ids = [];

		foreach($form_data as $form){

			if($form['shortcode_form_id']){
				$form['shortcode_form_id'] += 1;
			}else{
				$form['shortcode_form_id'] = 1;
			}

			array_push($form_shortcode_ids, $form['shortcode_form_id']);

		}

		$data['form'] = $this->form_model->all();

		$data['shortcode_form_id'] = count($form_data) ?  max($form_shortcode_ids) : 1;

		$this->content = 'form/create';

		$this->layout_admin($data, ['footer' => false]);

	}

	public function save(){

		$components =  (array)$this->input->post('form_component');

		$data = [];

		foreach($components as $key => $component){
			$component = json_decode($component, true);

			$data[$key] = $component;

			$data[$key]['value'] = htmlentities($component['value']);
		}

		if($this->input->post('submit') !== null){

			$shortcode_form_id = $this->input->post('shortcode_form_id');
			$shortcode_form_key = $this->input->post('shortcode_form_key');

			$create = $this->form_model->create([
				'name' => $this->input->post('name'),
				'shortcode' =>  'form_' .$this->input->post('shortcode') . $shortcode_form_id . $shortcode_form_key,
				'shortcode_form_id' => $shortcode_form_id,
				'shortcode_form_key' => $shortcode_form_key,
				'label_hidden' => $this->input->post('label_hidden') ? 1 : 0,
				'placeholder_hidden' => $this->input->post('placeholder_hidden') ? 1 : 0,
				'data' => json_encode($data)
			]);

			if($create){

				$id = $this->form_model->latest()->id;

				$this->form_setting_model->create(['form_id' => $id]);

				$message = [
					'status' => 'success',
					'text' => 'Successfully added form.'
				];

				$this->session->set_flashdata('message', $message);

				return redirect('/form/edit/' . $id, 'refresh');

			}

			return redirect('/form/settings', 'refresh');

		}

	}

	public function edit($id){

		$data['form'] = $this->form_model->findById($id);

		$data['message'] = $this->session->flashdata('message');
		
		$fields = (array) json_decode($data['form']->data, true);

		$fields_array = [];

		foreach($fields as $key => $field){

			$fields_array[$key] = $field;

			$fields_array[$key]['object'] = json_encode($field, true);

			$fields_array[$key]['value'] = html_entity_decode($field['value']);

		}

		$data['fields'] = $fields_array;

		$this->content = 'form/edit';

		$this->layout_admin($data, ['footer' => false]);

	}

	public function update($id){

		$form = $this->form_model->findById($this->input->post('id'));

		$components = (array)$this->input->post('form_component');

		$data = [];

		foreach($components as $key => $component){
			$component = json_decode($component, true);
			$data[$key] = $component;

			$data[$key]['value'] = htmlentities($component['value']);
		}

		$this->form_model->update($this->input->post('id'), [
			'name' => $this->input->post('name'),
			'shortcode' =>  $this->input->post('shortcode'),
			'shortcode_form_id' => $this->input->post('shortcode_form_id'),
			'shortcode_form_key' => $this->input->post('shortcode_form_key'),
			'label_hidden' => $this->input->post('label_hidden') ? 1 : 0,
			'placeholder_hidden' => $this->input->post('placeholder_hidden') ? 1 : 0,
			'data' => json_encode($data)
		]);

		$message = [
			'status' => 'success',
			'text' => 'Successfully updated form.'
		];

		$this->session->set_flashdata('message', $message);

		redirect($_SERVER['HTTP_REFERER']);

	}

	public function updateOtherSettings($id){

		$form = $this->form_setting_model->findById($this->input->post('id'));

		if($this->input->post('submit') !== null){
			$updated = $this->form_setting_model->update($this->input->post('id'), [
				'email' => $this->input->post('email'),
				'cc' =>  $this->input->post('cc'),
				'subject' => $this->input->post('subject'),
				'status' => $this->input->post('status') ? 1 : 0,
				'button_text' => $this->input->post('button_text')
			]);

			$message = [
				'status' => 'success',
				'text' => 'Successfully updated settings.'
			];

			$this->session->set_flashdata('message', $message);

			redirect($_SERVER['HTTP_REFERER']);
		}

	}
	
	public function delete($id){

		$this->form_model->delete($id);

		return redirect('/form/list', 'refresh');

	}

	function send(){
        if($this->input->post('submit')){

            $request = $this->input->post();

            pre($request);

            $exclude = ['_token', 'form_id', 'submit'];

            $form_body = '';

            $checkboxArray = [];

            $checkboxCount = 0;

            $clientEmail = '';



            foreach($request as $key => $data){

                $split_data = explode('__', $key);

                if(strpos($split_data[0], 'checkbox')){

                    array_push($checkboxArray, $data);

                }

            }

            foreach($request as $key => $data){

                if(!in_array($key, $exclude)){
                    $split_data = explode('__', $key);

                    $isCheckbox = strpos($split_data[0], 'checkbox');

                    $label = str_replace('_', ' ', $split_data[1]);

                    $form_block = '';

                    if($isCheckbox){
                        $checkboxCount++;

                        if($checkboxCount === 1)
                            $form_block = $label . ': ' . join(', ', $checkboxArray) . '<br/>';

                    }else{
                        $form_block = $label . ': ' . $data . '<br/>';
                    }

                    $form_body .= $form_block;

                    if(strpos($key, 'email')){
                        $clientEmail = $this->input->post($key);
                    }
                }

            }
            
            $this->load->library('email');
            $this->load->model('contact/contact_model');
            $this->load->model('user_model');

            $contact = $this->contact_model->get();
            $settting = $this->settings_model->get();
            $user = $this->user_model->getEmailByUsername($this->session->userdata('username'));
            $form = $this->form_setting_model->findById($this->input->post('form_id'));

            $smtp_providers = $this->config->item('smtp_providers');
            $smtp = $smtp_providers[$this->config->item('smtp')];

            foreach($_FILES as $key => $data){

                if($data['name']){
                    $config = array(
                        'file_name' => time() . $_FILES[$key]['name'],
                        'upload_path' => './uploads/',
                        'allowed_types' => 'jpg|jpeg|gif|png',
                        'max_size' => 2048
                    );

                    $this->upload->initialize($config);

                    if($this->upload->do_upload($key)){
                        $this->email->attach(FCPATH . '/uploads/' . $this->upload->data('file_name'), 'attachment', explode('__', $key)[1] . '.' . explode('.', $data['name'])[1]);
                        unlink('uploads/' . $config['file_name']);
                    }
                }
               

            }
            
            $this->email->initialize($smtp);
            $this->email->set_newline("\r\n");
            $this->email->from($clientEmail, $settting->site_title);
            $this->email->to($form->email ?: $contact->email ?: $user->email);
            $this->email->cc($form->cc); 
            $this->email->subject($form->subject ?? $settting->site_title ?? base_url());
            $this->email->message($form_body); 

            if($this->email->send()){
                return redirect('form/thankYou');
            }

            return show_error($this->email->print_debugger());

        }

    }

}
 