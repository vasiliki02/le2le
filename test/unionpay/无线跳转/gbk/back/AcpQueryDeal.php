<?php
header ( 'Content-type:text/html;charset=GBK' );
include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/httpClient.php';
include_once '../func/log.class.php';

/**
 *	6.8������״̬��ѯ����
 */

/**
 *	���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���Ҫ�����ռ����ĵ���д���ô�������ο�
 */


// ��ʼ����־
$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
$log->LogInfo ( "===========�����̨����ʼ============" );

$params = array(
		//�̶���д
		'version'=> '5.0.0',//�汾��--M
		//Ĭ��ȡֵ��UTF-8
		'encoding'=> 'GBK',//���뷽ʽ--M
		//ͨ��MPI�����ȡ
		'certId'=> getSignCertId (),//֤��ID--M
		//01RSA02 MD5 (�ݲ�֧��)
		'signMethod'=> '01',//ǩ������--M
		//�������� 00
		'txnType'=> '00',//��������--M
		//Ĭ��00
		'txnSubType'=> '00',//��������--M
		//Ĭ��:000000
		'bizType'=> '000000',//��Ʒ����--M
		//0����ͨ�̻�ֱ������2��ƽ̨���̻�����
		'accessType'=> '0',//��������--M
		//��
		'merId'=> '898340183980105',//�̻�����--M
		//����ѯ���׵Ľ���ʱ��
		'txnTime'=> date('YmdHis'),//��������ʱ��--M
		//����ѯ���׵Ķ�����
		'orderId'=> date('YmdHis'),//�̻�������--M
		//����ѯ���׵���ˮ��
		'queryId'=> '',//���ײ�ѯ��ˮ��--C
		//��ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ} ���� origTxnType N2ԭ������������ѯʱ����
		'reserved'=> '',//������--O
	);

// ����ֶ��Ƿ���Ҫ����
encrypt_params ( $params );

// ǩ��
sign ( $params );

$log->LogInfo ( "��̨�����ַΪ>" . SDK_BACK_TRANS_URL );
// ������Ϣ����̨
$result = sendHttpRequest ( $params, SDK_BACK_TRANS_URL );
$log->LogInfo ( "��̨���ؽ��Ϊ>" . $result );

//���ؽ��չʾ
$result_arr = coverStringToArray ( $result );
$html = create_html ( $result_arr, SDK_BACK_NOTIFY_URL );
echo $html;
