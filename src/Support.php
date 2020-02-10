<?php
namespace support;

use chorus\InvalidConfigException;

/**
 * Support
 * 支持
 * -------
 * @author Verdient。
 */
abstract class Support extends \http\component\Component
{
	/**
	 * @var String $appKey
	 * App标识
	 * -------------------
	 * @author Verdient。
	 */
	public $appKey = null;

	/**
	 * @var String $appSecret
	 * App秘钥
	 * ----------------------
	 * @author Verdient。
	 */
	public $appSecret = null;

	/**
	 * init()
	 * 初始化
	 * ------
	 * @inheritdoc
	 * -----------
	 * @author Verdient。
	 */
	public function init(){
		parent::init();
		foreach(['appKey', 'appSecret'] as $attribute){
			if(!$this->$attribute){
				throw new InvalidConfigException($attribute . ' must be set');
			}
		}
	}

	/**
	 * requestClass()
	 * 请求类
	 * --------------
	 * @inheritdoc
	 * -----------
	 * @return String
	 * @author Verdient。
	 */
	public static function requestClass(){
		return Request::class;
	}

	/**
	 * prepareRequest(String $method[, $requestMethod = 'POST'])
	 * 准备请求
	 * ---------------------------------------------------------
	 * @param String $method 方法
	 * @param String $requestMethod 请求方法
	 * ------------------------------------
	 * @inheritdoc
	 * -----------
	 * @return Request
	 * @author Verdient。
	 */
	public function prepareRequest($method, $requestMethod = 'POST'){
		$request = parent::prepareRequest($method, $requestMethod);
		$request->appKey = $this->appKey;
		$request->appSecret = $this->appSecret;
		return $request;
	}
}