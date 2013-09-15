<?php
/**
 * (C)2012-2013 twcms.cn TongWang Inc.
 * Author: wuzhaohuan <kongphp@gmail.com>
 */

defined('TWCMS_PATH') or exit;

class models extends model {
	private $data = array();		// 防止重复查询

	function __construct() {
		$this->table = 'models';	// 表名
		$this->pri = array('mid');	// 主键
		$this->maxid = 'mid';		// 自增字段
	}

	// 获取所有模型
	public function get_models() {
		if(isset($this->data['models'])) {
			return $this->data['models'];
		}

		return $this->data['models'] = $this->find_fetch();
	}

	// 获取所有模型的名称
	public function get_name() {
		if(isset($this->data['name'])) {
			return $this->data['name'];
		}

		$models_arr = $this->get_models();
		$arr = array();
		foreach ($models_arr as $v) {
			$arr[$v['mid']] = $v['name'];
		}
		return $this->data['name'] = $arr;
	}

	// 获取所有模型的表名
	public function get_tablename() {
		if(isset($this->data['tablename'])) {
			return $this->data['tablename'];
		}

		$models_arr = $this->get_models();
		$arr = array();
		foreach ($models_arr as $v) {
			$arr[$v['mid']] = $v['tablename'];
		}
		return $this->data['tablename'] = $arr;
	}
}