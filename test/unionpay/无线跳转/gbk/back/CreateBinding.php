<?php
header ( 'Content-type:text/html;charset=GBK' );
include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/httpClient.php';
include_once '../func/log.class.php';

/**
 * ʵ����֤-�����󶨹�ϵ�ཻ��-��̨
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
		//01��RSA02�� MD5 (�ݲ�֧��)
		'signMethod'=> '01',//ǩ������--M
		//ȡֵ:72
		'txnType'=> '72',//��������--M
		//01��ʵ����֤
		'txnSubType'=> '00',//��������--M
		'bizType'=> '000000',//��Ʒ����--M
		'channelType'=> '07',//��������--M
		//ǰ̨��������д
		//'frontUrl'=> SDK_FRONT_TRANS_URL,//ǰ̨֪ͨ��ַ--C
		//��̨�����̻����ʱʹ�ã������ͣ������̻���̨���׽��֪ͨ
		'backUrl'=> SDK_BACK_TRANS_URL,//��̨֪ͨ��ַ--C
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
		'orderId'=> date('YmdHis'),//�̻�������--M
		//��
		'txnTime'=> date('YmdHis'),//��������ʱ��--M
		//��
		'accType'=> '',//�˺�����--O
		//����ǰ̨�ཻ�ף����ؿ��ź�4λ����̨�ཻ�ף�ԭ������
		'accNo'=> '',//�˺�--O
		//��
		'customerInfo'=> customerInfo(),//���п���֤��Ϣ�������Ϣ--O
		//�̻��Զ��屣���򣬽���Ӧ��ʱ��ԭ������
		'reqReserved'=> '',//���󷽱�����--O
		//��ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ} �ƶ�֧���ο�����ί�й�ϵ��Ϣ {bindInfo=XXXXX}  �����̻�����
		'reserved'=> '',//������--O
		//��ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ}�з��ռ���Ҫ����̻����� ���ռ��� {riskLevel=XX}
		'riskRateInfo'=> '',//������Ϣ��--O
		//��ʹ��������Կ�����������Ϣʱ�������ͼ���֤���CertID
		'encryptCertId'=> '',//����֤��ID--C
		//�ƶ�֧��ҵ����Ҫ����
		'userMac'=> '',//�ն���Ϣ��--O
		//��������ί�н���ʱ��д
		'bindId'=> '',//ί�й�ϵ��ʶ��--M
		//������д����ҵ������01������02������
		'relTxnType'=> '',//����ҵ���ʶ--C
		//��
		'payCardType'=> '',//֧��������--O
		//��
		'issInsCode'=> '',//������������--O
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
?>
