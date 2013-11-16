<?php

class Datagrid
{
	private $error = array();
	private $model;
	private $data;
	private $config;
	private $html;
	private $id = 'table';
	private $colDefaults = array(
		'label' => 'Row Title',
		'type' => 'label',
	);
	
	public function __construct($config)
	{
		if(!is_array($config)) {
			$this->setError('Config not set');
		} else {
			$this->model = $config['model'];
			$this->columns = $this->setColDefaults($config['columns']);
		}
	}
	
	public function process()
	{
		if($this->data = $this->getData()) {
			$this->buildHead();
			$this->buildRow();
			$this->buildFoot();
			return $this->html;
		}
	}
	
	private function setError($msg)
	{
		$this->error[] = $msg;
	}
	
	private function getData()
	{
		$data = new $this->model;
		if(!$data) {
			$this->setError('Model not loaded');
			return false;
		}
		try {
			$q = $data->pdo->prepare('SELECT * FROM '.$data->table);
			$q->execute();
			$r = $q->fetchAll();
		} catch(Exeption $e) {
			$this->setError('Error retrieving data');
			return false;
		}
		return $r;
	}
	
	private function buildHead()
	{
		$this->html .= '<table id="'.$this->id.'"><tr>';
		foreach($this->columns as $col) {
			$this->html .= '<th>'.$col['label'].'</th>';
		}
		$this->html .= '</tr>';
	}
	
	private function buildRow()
	{
		foreach($this->data as $row) {
			$this->html .= '<tr>';
			foreach($this->columns as $key => $val) {
				$this->html .= '<td>'.$this->outputVal($row[$key], $val).'</td>';
			}
			$this->html .= '</tr>';
		}
	}
	
	private function buildFoot()
	{
		$this->html .= '</table>';
	}
	
	private function outputVal($value, $val)
	{
		switch($val['type']) {
			case 'date' :
				$return = date($val['format'], $value);
				break;
			case 'boolean' :
				$return = $value == 1 ? 'Yes' : 'No';
				break;
			default :
				$return = ucwords($value);
				break;
		}
		return $return;
	}
	
	private function setColDefaults($cols) {
		foreach($cols as $k => $v) {
			$cols[$k] = array_merge($this->colDefaults, $v);
		}
		return $cols;
	}
}

?>