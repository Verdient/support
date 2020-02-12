<?php
namespace Verdient\support;

/**
 * Exception
 * 异常上报
 * ---------
 * @author Verdient。
 */
class Exception extends Support
{
	/**
	 * @var Array $routes
	 * 路由集合
	 * ------------------
	 * @author Verdient。
	 */
	public $routes = [
		'reportPHP' => 'report/php',
	];

	/**
	 * reportByException(Exception $exception[, String $ip = null, Integer $occurredAt = null])
	 * 通过异常提交
	 * ----------------------------------------------------------------------------------------
	 * @param Exception $exception 异常对象
	 * @param String $ip = null IP地址
	 * @param Integer $occurredAt 发生时间
	 * -----------------------------------
	 * @return Response
	 * @author Verdient。
	 */
	public function reportByException(\Exception $exception, $ip = null, $occurredAt = null){
		return $this->reportPHP(
			get_class($exception),
			$exception->getMessage(),
			$exception->getFile(),
			$exception->getLine(),
			$ip,
			$occurredAt
		);
	}

	/**
	 * reportPHP(String $type, String $message[, String $file = null, Integer $line = null, String $ip = null, Integer $occurredAt = null])
	 * 上报PHP
	 * ------------------------------------------------------------------------------------------------------------------------------------
	 * @param String $type 异常类型
	 * @param String $message 异常信息
	 * @param String $file 异常文件
	 * @param Integer $line 异常行数
	 * @param String $ip IP地址
	 * @param Integer $occurredAt 准确发生时间
	 * -------------------------------------
	 * @author Verdient。
	 */
	public function reportPHP($type, $message, $file = null, $line = null, $ip = null, $occurredAt = null){
		return $this
			->prepareRequest('reportPHP')
			->addBody('type', $type)
			->addBody('message', $message)
			->addFilterBody('file', $file)
			->addFilterBody('line', $line)
			->addFilterBody('ip', $ip)
			->addFilterBody('occurred_at', $occurredAt)
			->send();
	}
}