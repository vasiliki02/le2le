<?php
header ( 'Content-type:text/html;charset=GBK' );
include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/httpClient.php';
include_once '../func/log.class.php';


// ��ʼ����־
$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
$log->LogInfo ( "===========�����̨����ʼ============" );




$params=$_POST['flags'];

 foreach($params as $key=>$val){
 echo $val,'<br />';
}
$ar=$_POST['arr'];

foreach($ar as $key=>$val){
	echo $key,$val,'<br />';
}
// ����ֶ��Ƿ���Ҫ����
encrypt_params ( $ar );
//echo $params;
// ǩ��
sign ( $params );

$log->LogInfo ( "��̨�����ַΪ>" . SDK_BACK_TRANS_URL );
//������Ϣ����̨
$result = sendHttpRequest ( $params, SDK_BACK_TRANS_URL );
$log->LogInfo ( "��̨���ؽ��Ϊ>" . $result );

//���ؽ��չʾ
$result_arr = coverStringToArray ( $result );
$html = create_html ( $result_arr, SDK_BACK_NOTIFY_URL );
echo $html;
?>

