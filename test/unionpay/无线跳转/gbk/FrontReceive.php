<?php 
header ( 'Content-type:text/html;charset=gbk' );
include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/log.class.php';

$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
$log->LogInfo ( "============����ǰ̨����ʼ===============" );

$params=array($_POST['flags']);

encrypt_params($params);
// ǩ��
sign ( $params );


// ǰ̨�����ַ
$front_uri = SDK_FRONT_TRANS_URL;
$log->LogInfo ( "ǰ̨�����ַΪ>" . $front_uri );
// ���� �Զ��ύ�ı�
$html_form = create_html ( $params, $front_uri );

$log->LogInfo ( "-------ǰ̨�����Զ��ύ��>--begin----" );
$log->LogInfo ( $html_form );
$log->LogInfo ( "-------ǰ̨�����Զ��ύ��>--end-------" );
$log->LogInfo ( "============����ǰ̨���� ����===========" );
echo $html_form;

?>