<?php

class Stackable {
	const API_VERSION = 'v1';
	const API_URL = 'http://api.stackable.space';

	private $token = null;

	function __construct($token) 
	{
       $this->token = $token;
   	}

	public function getContainers() 
	{
		return $this->getData('containers');
	}

	public function getContainer($containerId) 
	{
		return $this->getData('containers/' . $containerId);
	}

	public function getContainerItems($containerId) 
	{
		return $this->getData('containers/' . $containerId. '/items');
	}

	public function getAllItems() 
	{
		return $this->getData('items');
	}

	public function getItem($itemId) 
	{
		return $this->getData('items/' . $itemId);
	}

	private function getData($path) 
	{
		$url = self::API_URL . '/' self::API_VERSION . '/' . $path . '?token=' . $this->token;
		//do curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($httpcode>=200 && $httpcode<300) ? $data : false;
	}
}
