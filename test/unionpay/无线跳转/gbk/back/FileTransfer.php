<?php
header ( 'Content-type:text/html;charset=GBK' );
include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/httpClient.php';
include_once '../func/log.class.php';

/**
 * �ļ������ཻ��
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
		//ȡֵ:76
		'txnType'=> '76',//��������--M
		//01�������ļ�����
		'txnSubType'=> '01',//��������--M
		//Ĭ��:000000
		'bizType'=> '000000',//��Ʒ����--M
		'channelType'=> '07',//��������--M
		//0����ͨ�̻�ֱ������2��ƽ̨���̻�����
		'accessType'=> '0',//��������--M
		//��
		'merId'=> '898340183980105',//�̻�����--M
		//�̻�����Ϊƽ̨���̻�����ʱ��������
		'subMerId'=> '',//�����̻�����--C
		//�̻�����Ϊƽ̨���̻�����ʱ��������
		'subMerName'=> '',//�����̻�����--C
		//�̻�����Ϊƽ̨���̻�����ʱ��������
		'subMerAbbr'=> '',//�����̻����--C
		//��
		'settleDate'=> date('md'),//��������--M
		//��
		'txnTime'=> date('YmdHis'),//��������ʱ��--M
		//����ʵ��ҵ��������壬Ĭ��ֵΪ��00
		'fileType'=> '00',//�ļ�����--O
		//�̻��Զ��屣���򣬽���Ӧ��ʱ��ԭ������
		'reqReserved'=> '',//���󷽱�����--O
		//���װ���������������������á�{}��������������ԡ�&���������ӡ���ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ}��������������ơ�ȡֵ�����̻���ͬ������
		'reserved'=> '',//������--O

	);

// ǩ��
sign ( $params );

$log->LogInfo ( "��̨�����ַΪ>" . SDK_FILE_QUERY_URL );
// ������Ϣ����̨
$result = sendHttpRequest ( $params, SDK_FILE_QUERY_URL );
$log->LogInfo ( "��̨���ؽ��Ϊ>" . $result );

//���ؽ��չʾ
$result_arr = coverStringToArray ( $result );
// �����ļ�
deal_file ( $result_arr );

$html = create_html ( $result_arr, SDK_BACK_NOTIFY_URL );
echo $html;
?>
