<?php
class ControllerPaymentPaylike extends Controller {
	public function index() {
		header('Access-Control-Allow-Origin: *');
		$this->load->language('payment/paylike');

		$data['button_confirm'] = $this->language->get('button_confirm');

		$this->load->model('checkout/order');

		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		$data['paylike_public_key'] = $this->config->get('paylike_key');

		$data['name'] = $order_info['payment_firstname']." ".$order_info['payment_lastname'];
		$data['amount'] = round($this->currency->format($order_info['total'], $order_info['currency_code'], 1.00000, false)).'00';
		$data['currency_code'] = $this->session->data['currency'];

		if( version_compare(VERSION, '2.2.0.0', '>=') ) {
			return $this->load->view('payment/paylike', $data);
		} else {
			return $this->load->view('default/template/payment/paylike.tpl', $data);
		}
		
	}

	public function update() {
		
		if(isset($_POST['trans_ref']) && $_POST['trans_ref'] != ''){
			$message = "";
			$this->load->model('checkout/order');
			$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
			$message .= $_POST['trans_ref'];
			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('config_order_status_id'), $message);

			$amount = round($this->currency->format($order_info['total'], $order_info['currency_code'], 1.00000, false));
			$pat_order_query = $this->db->query("SELECT order_id from " . DB_PREFIX . "paylike_admin where order_id = '" . $order_info['order_id'] . "'");
			if (!$pat_order_query->num_rows) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "paylike_admin SET `order_id` = '" . $order_info['order_id'] . "', trans_id = '" .$_POST['trans_ref'] . "', amount = " .$amount . "");
			} else {
				$this->db->query("UPDATE " . DB_PREFIX . "paylike_admin SET trans_id = '" . $_POST['trans_ref'] . "', amount = '" . $amount . "' WHERE `order_id` = '" . $order_info['order_id'] . "'");
			}

			$json['success'] = "Order updated";
			$json['redirect'] = $this->url->link('checkout/success', '', true);
		} else {
			$json['error'] = "No transaction referece found";
		}
		

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}