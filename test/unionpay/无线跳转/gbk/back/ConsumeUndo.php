<?php
header ( 'Content-type:text/html;charset=GBK' );
 include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/httpClient.php';
include_once '../func/log.class.php';

/**
 *	���ѳ���
 */


/**
 *	���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���Ҫ�����ռ����ĵ���д���ô�������ο�
 */

// ��ʼ����־
$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
$log->LogInfo ( "===========�����̨����ʼ============" );

$params = array(
		'version' => '5.0.0',			//�汾��
		'encoding' => 'GBK',				//���뷽ʽ
		'certId' => getSignCertId (),	//֤��ID	
		'signMethod' => '01',		//ǩ������
		'txnType' => '31',					//��������	
		'txnSubType' => '00',				//��������
		'bizType' => '000000',			//ҵ������
		'channelType' => '07',				//��������
		'accessType' => '0',				//��������
		'channelType' => '07',					//��������
		'orderId' => date('YmdHis'),			//�̻�������
		'merId' => '898340183980105',			//�̻�����
		'accNo' => '9555542160000001',			//�˺�
		'txnTime' => date('YmdHis'),				//��������ʱ��

		//�̶���д
		'version'=> '5.0.0',//�汾��--M
		//Ĭ��ȡֵ��UTF-8
		'encoding'=> 'GBK',//���뷽ʽ--M
		//ͨ��MPI�����ȡ
		'certId'=> getSignCertId (),//֤��ID--M
		//01RSA02 MD5 (�ݲ�֧��)
		'signMethod'=> '01',//ǩ������--M
		//ȡֵ��31
		'txnType'=> '31',//��������--M
		//Ĭ��:00
		'txnSubType'=> '00',//��������--M
		'bizType'=> '000000',//��Ʒ����--M
		'channelType'=> '07',//��������--M
		//��̨�����̻����ʱʹ�ã������ͣ������̻���̨���׽��֪ͨ
		'backUrl'=> SDK_BACK_TRANS_URL,//��̨֪ͨ��ַ--M
		//0����ͨ�̻�ֱ������2��ƽ̨���̻�����
		'accessType'=> '0',//��������--M
		//��
		'merId'=> '898340183980105',//�̻�����--M
		//�̻�����Ϊƽ̨���̻�����ʱ��������
		'subMerId'=> '',//�����̻�����--C
		//�̻�����Ϊƽ̨���̻�����ʱ��������
		'subMerName'=> '',//�����̻�ȫ��--C
		//�̻�����Ϊƽ̨���̻�����ʱ��������
		'subMerAbbr'=> '',//�����̻����--C
		//���ѳ����Ķ����ţ����̻�����
		'orderId'=> date('YmdHis'),//�̻�������--M
		//ԭʼ���׵�queryId
		'origQryId'=> 'origQryId',//ԭʼ������ˮ��--M
		//��
		'txnTime'=> date('YmdHis'),//��������ʱ��--M
		//��ԭʼ���ѽ���һ��
		'txnAmt'=> '1',//���׽��--M
		//��
		'termId'=> '',//�ն˺�--O
		//�̻��Զ��屣���򣬽���Ӧ��ʱ��ԭ������
		'reqReserved'=> '',//���󷽱�����--O
		//��ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ} �ƶ�֧���ο�����
		'reserved'=> '',//������--O
		//��������Ϊ����֧��ʱʹ���÷���VPC������Ϣ����������÷�
		'vpcTransData'=> '',//VPC������Ϣ��--C
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
