<?php
class ModelPaymentPaylike extends Model {
	public function getMethod($address, $total) {
		$this->load->language('payment/paylike');

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('paylike_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

		if ($this->config->get('paylike_total') > 0 && $this->config->get('paylike_total') > $total) {
			$status = false;
		} elseif (!$this->config->get('paylike_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}

		$method_data = array();

		if ($status) {
			$method_data = array(
				'code'       => 'paylike',
				'title'      => $this->config->get('paylike_payment_method_title')/*$this->language->get('text_title')*/,
				'description'      => $this->config->get('paylike_payment_method_description'),
				'terms'      => '',
				'sort_order' => $this->config->get('paylike_sort_order'),
				'mode'		 => $this->config->get('paylike_mode')
			);
		}

		return $method_data;
	}
}