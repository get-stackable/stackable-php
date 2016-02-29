<?php

/**
 * Core Stackable API class
 */
class Stackable
{
    const API_VERSION = 'v1';
    const API_URL = 'http://api.stackable.space';

    private $token = null;

    function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get array of containers in stack
     */
    public function getContainers()
    {
        return $this->getData('containers');
    }

    /**
     * Get single container data
     * @param $containerId
     * @return array
     */
    public function getContainer($containerId)
    {
        return $this->getData('containers/' . $containerId);
    }

    /**
     * Get array of specified container items
     * @param $containerId
     * @return array
     */
    public function getContainerItems($containerId)
    {
        return $this->getData('containers/' . $containerId . '/items');
    }

    /**
     * Get all items from stack
     * @return array
     */
    public function getAllItems()
    {
        return $this->getData('items');
    }

    /**
     * Get single item data
     * @param $itemId
     * @return array
     */
    public function getItem($itemId)
    {
        return $this->getData('items/' . $itemId);
    }


    /**
     * Do curl to API to get requested data
     * @param $path
     * @return array
     */
    private function getData($path)
    {
        $url = self::API_URL . '/' . self::API_VERSION . '/' . $path . '?token=' . $this->token;

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

		return ($httpcode >= 200 && $httpcode < 300) ? json_decode($data) : false;
	}
}
