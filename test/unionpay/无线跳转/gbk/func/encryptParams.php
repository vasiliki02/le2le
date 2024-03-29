<?php
header ( 'Content-type:text/html;charset=GBK' );
include_once 'SDKConfig.php';
include_once 'secureUtil.php';
include_once 'log.class.php';

// 初始化日志
$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
/**
 * 对卡号 | cvn2 | 密码 | cvn2有效期进行处理
 *
 * @param array $params        	
 */
function encrypt_params(&$params) {
	global $log;
	$log->LogInfo ( '------{对卡号 | cvn2 | 密码 | cvn2有效期进行处理}开始-----' );
	// 卡号
	$pan = isset ( $params ['accNo'] ) ? $params ['accNo'] : '';
	if (! empty ( $pan )) {
		if (1 == SDK_PAN_ENC) {
			$cryptPan = encryptPan ( $pan );
			$params ['accNo'] = $cryptPan;
			$log->LogInfo ( "加密后卡号: {$cryptPan}" );
		}
	}
	
	// 证件类型
	$customerInfo01 = isset ( $params ['customerInfo01'] ) ? $params ['customerInfo01'] : '';
	// 证件号码
	$customerInfo02 = isset ( $params ['customerInfo02'] ) ? $params ['customerInfo02'] : '';
	// 姓名
	$customerInfo03 = isset ( $params ['customerInfo03'] ) ? $params ['customerInfo03'] : '';
	// 手机号
	$customerInfo04 = isset ( $params ['customerInfo04'] ) ? $params ['customerInfo04'] : '';
	// 短信验证码
	$customerInfo05 = isset ( $params ['customerInfo05'] ) ? $params ['customerInfo05'] : '';
	// 持卡人密码
	$customerInfo06 = isset ( $params ['customerInfo06'] ) ? $params ['customerInfo06'] : '';
	// cvn2
	$customerInfo07 = isset ( $params ['customerInfo07'] ) ? $params ['customerInfo07'] : '';
	// 有效期
	$customerInfo08 = isset ( $params ['customerInfo08'] ) ? $params ['customerInfo08'] : '';
	
	// 去除身份信息域
	for($i = 1; $i <= 8; $i ++) {
		if (isset ( $params ['customerInfo0' . $i] )) {
			unset ( $params ['customerInfo0' . $i] );
		}
	}
	
	// 如果子域都是空则退出
	if (empty ( $customerInfo01 ) && empty ( $customerInfo02 ) && empty ( $customerInfo03 ) && empty ( $customerInfo04 ) && empty ( $customerInfo05 ) && empty ( $customerInfo06 ) && empty ( $customerInfo07 ) && isset ( $customerInfo08 )) {
		$log->LogInfo ( "---------身份信息域子域全为空退出-------" );
		return (- 1);
	}
	
	// 持卡人身份信息 --证件类型|证件号码|姓名|手机号|短信验证码|持卡人密码|CVN2|有效期
	$customer_info = '{';
	$customer_info .= $customerInfo01 . '&';
	$customer_info .= $customerInfo02 . '&';
	$customer_info .= $customerInfo03 . '&';
	$customer_info .= $customerInfo04 . '&';
	$customer_info .= $customerInfo05 . '&';
	
	if (! empty ( $customerInfo06 )) {
		if (! empty ( $pan )) {
			$encrypt_pin = encryptPin ( $pan, $customerInfo06 );
			$customer_info .= $encrypt_pin . '&';
		} else {
			$customer_info .= $customerInfo06 . '&';
		}
	} else {
		$customer_info .= '&';
	}
	
	if (! empty ( $customerInfo07 )) {
		if (1 == SDK_CVN2_ENC) {
			$cvn2 = encryptCvn2 ( $customerInfo07 );
			$customer_info .= $cvn2 . '&';
		} else {
			$customer_info .= $customerInfo07 . '&';
		}
	} else {
		$customer_info .= '&';
	}
	
	if (! empty ( $customerInfo08 )) {
		if (1 == SDK_DATE_ENC) {
			$certDate = encryptDate ( $customerInfo08 );
			$customer_info .= $cvn2;
		} else {
			$customer_info .= $customerInfo08;
		}
	}
	
	$customer_info .= '}';
	
	$log->LogInfo ( 'customerInfo 域信息 :>' . $customer_info );
	
	$customerInfoBase64 = base64_encode ( $customer_info );
	$params ['customerInfo'] = $customerInfoBase64;
	$log->LogInfo ( 
			'---------{对卡号 & cvn2 & 密码 & cvn2有效期进行处理}结束--------' . $customerInfoBase64 );
}

function customerInfo()
{
	$pan = isset ( $params ['accNo'] ) ? $params ['accNo'] : '';
	$certifTp="01";
	$certifId="1301212386859081945";
	$customerNm="测试";
	$phoneNo="18613958987";
	$smsCode="123311";
	$pin="123213";
	$cvn2="400";
	$expired="1212";

	$customer_info = '{';
	$customer_info = $customer_info.'certifTp='.$certifTp. '&';
	$customer_info = $customer_info.'certifId='.$certifId. '&';
	$customer_info = $customer_info.'customerNm='.$customerNm. '&';
	$customer_info = $customer_info.'phoneNo='.$phoneNo. '&';
	$customer_info = $customer_info.'smsCode='.$smsCode. '&';

	$customer_info = $customer_info.'cvn2='.$cvn2. '&';


	if (! empty ( $pin )) {
		if (! empty ( $pan )) {
			$encrypt_pin = encryptPin ( $pan, $pin );
			$customer_info = $customer_info .'pin='. $encrypt_pin . '&';
		} else {
			$customer_info = $customer_info .'pin='. $pin . '&';
		}
	} else {
		$customer_info = $customer_info .'pin='. '&';
	}
	$customer_info = $customer_info.'expired='.$expired;

	$customer_info  = $customer_info .  '}';
	$customerInfoBase64 = base64_encode ( $customer_info );

	return $customerInfoBase64;


}
?>