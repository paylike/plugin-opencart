<?php
class ControllerPaymentPaylike extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('payment/paylike');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('paylike', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], true));
		}

		//Creating table if not exists already
		$sql = "
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "paylike_admin` (
			`order_id` int(11) NOT NULL default '0',
			`trans_id` varchar(255) NOT NULL,
			`amount` int(11) NOT NULL default '0',
			`action` varchar(32) NOT NULL default 'NO',
			PRIMARY KEY  (`order_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8";
		$this->db->query($sql);

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		
		$data['entry_key'] = $this->language->get('entry_key');
		$data['entry_app_key'] = $this->language->get('entry_app_key');
		
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$data['help_total'] = $this->language->get('help_total');
		$data['help_key'] = $this->language->get('help_key');
		$data['help_app_key'] = $this->language->get('help_app_key');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		
		if (isset($this->error['key'])) {
			$data['error_key'] = $this->error['key'];
		} else {
			$data['error_key'] = '';
		}

		if (isset($this->error['app_key'])) {
			$data['error_app_key'] = $this->error['app_key'];
		} else {
			$data['error_app_key'] = '';
		}


		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('payment/paylike', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('payment/paylike', 'token=' . $this->session->data['token'], true);
		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], true);

		

		if (isset($this->request->post['paylike_key'])) {
			$data['paylike_key'] = $this->request->post['paylike_key'];
		} else {
			$data['paylike_key'] = $this->config->get('paylike_key');
		}

		if (isset($this->request->post['paylike_app_key'])) {
			$data['paylike_app_key'] = $this->request->post['paylike_app_key'];
		} else {
			$data['paylike_app_key'] = $this->config->get('paylike_app_key');
		}

		if (isset($this->request->post['paylike_total'])) {
			$data['paylike_total'] = $this->request->post['paylike_total'];
		} else {
			$data['paylike_total'] = $this->config->get('paylike_total');
		}

		if (isset($this->request->post['paylike_order_status_id'])) {
			$data['paylike_order_status_id'] = $this->request->post['paylike_order_status_id'];
		} else {
			$data['paylike_order_status_id'] = $this->config->get('paylike_order_status_id');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['paylike_geo_zone_id'])) {
			$data['paylike_geo_zone_id'] = $this->request->post['paylike_geo_zone_id'];
		} else {
			$data['paylike_geo_zone_id'] = $this->config->get('paylike_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['paylike_status'])) {
			$data['paylike_status'] = $this->request->post['paylike_status'];
		} else {
			$data['paylike_status'] = $this->config->get('paylike_status');
		}

		if (isset($this->request->post['paylike_sort_order'])) {
			$data['paylike_sort_order'] = $this->request->post['paylike_sort_order'];
		} else {
			$data['paylike_sort_order'] = $this->config->get('paylike_sort_order');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		if( version_compare(VERSION, '2.2.0.0', '>=') ) {
			$this->response->setOutput($this->load->view('payment/paylike', $data));
		}else{
			$this->response->setOutput($this->load->view('payment/paylike.tpl', $data));
		}

	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'payment/paylike')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['paylike_key']) {
			$this->error['key'] = $this->language->get('error_key');
		}

		if (!$this->request->post['paylike_app_key']) {
			$this->error['app_key'] = $this->language->get('error_app_key');
		}

		return !$this->error;
	}


	//getting ajax request for capture, void, refund
	public function doaction(){

		if ( $this->request->post['trans_ref'] && $this->request->post['trans_ref']!="" && $this->request->post['p_action'] && $this->request->post['p_action'] != "" ) {
			header('Content-Type: application/json');
			$this->load->model('setting/setting');

			//echo $this->config->get('paylike_app_key');

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_POST, 1);
			
			if($this->request->post['p_amount'] && $this->request->post['p_amount'] > 0){
				$amount = round($this->request->post['p_amount']).'00';
			} else {
				$amount = 0;
			}

			$data = array('amount'=>$amount);
			//ocean debug
		//	$this->request->post['trans_ref'] = '56e9131169ea1db11a159f09';

			if( $this->request->post['p_action'] == "capture" && $amount > 0 ){

				curl_setopt($ch, CURLOPT_URL, "https://api.paylike.io/transactions/".$this->request->post['trans_ref']."/captures");
			

				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			}
			
			if( $this->request->post['p_action'] == "refund" && $amount > 0 ){
				curl_setopt($ch, CURLOPT_URL, "https://api.paylike.io/transactions/".$this->request->post['trans_ref']."/refunds");
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			}

			if( $this->request->post['p_action'] == "void" && $amount > 0 ){
				curl_setopt($ch, CURLOPT_URL, "https://api.paylike.io/transactions/".$this->request->post['trans_ref']."/voids");
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			}


			curl_setopt($ch, CURLOPT_USERPWD, ':'.$this->config->get('paylike_app_key'));
			//curl_setopt($ch, CURLOPT_USERPWD, '94d353d8-ffda-49fe-a7c4-a06b3e821f2a');

			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Cache-Control:no-cache"));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			//curl_setopt($ch, CURLOPT_HEADER, TRUE);
			
			$output = curl_exec($ch);
			curl_close($ch);
			if(!empty($output) && json_decode($output)){
				echo $output;
			}else{
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_POST, 1);
				
				if($this->request->post['p_amount'] && $this->request->post['p_amount'] > 0){
					$amount = round($this->request->post['p_amount']).'00';
				} else {
					$amount = 0;
				}

				$data = array('amount'=>$amount);
				//ocean debug
			//	$this->request->post['trans_ref'] = '56e9131169ea1db11a159f09';

				if( $this->request->post['p_action'] == "capture" && $amount > 0 ){

					curl_setopt($ch, CURLOPT_URL, "https://api.paylike.io/transactions/".$this->request->post['trans_ref']."/captures");
				

					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				}
				
				if( $this->request->post['p_action'] == "refund" && $amount > 0 ){
					curl_setopt($ch, CURLOPT_URL, "https://api.paylike.io/transactions/".$this->request->post['trans_ref']."/refunds");
					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				}

				if( $this->request->post['p_action'] == "void" && $amount > 0 ){
					curl_setopt($ch, CURLOPT_URL, "https://api.paylike.io/transactions/".$this->request->post['trans_ref']."/voids");
					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
				}


				curl_setopt($ch, CURLOPT_USERPWD, ':'.$this->config->get('paylike_app_key'));
				//curl_setopt($ch, CURLOPT_USERPWD, '94d353d8-ffda-49fe-a7c4-a06b3e821f2a');

				curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Cache-Control:no-cache"));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, TRUE);
				
				$output = curl_exec($ch);
				curl_close($ch);
				$new_output['error'] = strtok($output, "\n");
				echo json_encode($new_output);
			}
			
		}

	}
}