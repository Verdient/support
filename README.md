# 内部支撑系统SDK
仅限内部使用

## 配置参数
| 名称  |  含义 |
| ------------ | ------------ |
|  appKey |  APP标识 |
|  appSecret |  App秘钥 |


## 方法总览
<table>
	<tr>
		<th>类</th>
		<th>简述</th>
		<th>方法</th>
		<th>用途</th>
	</tr >
	<tr >
		<td rowspan="2">Exception</td>
		<td rowspan="2">异常管理相关</td>
		<td>reportByException</td>
		<td>通过PHP的异常对象上报异常</td>
	</tr>
	<tr>
		<td>reportPHP</td>
		<td>上报PHP的异常</td>
	</tr>
		<tr >
		<td rowspan="2">Notification</td>
		<td rowspan="2">提醒功能相关</td>
		<td>sendSMS</td>
		<td>发送短信</td>
	</tr>
	<tr>
		<td>sendEmail</td>
		<td>发送电子邮件</td>
	</tr>
</table>
