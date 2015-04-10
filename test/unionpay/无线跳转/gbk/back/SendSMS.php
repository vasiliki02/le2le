<?php
header ( 'Content-type:text/html;charset=GBK' );
include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/httpClient.php';
include_once '../func/log.class.php';

/**
 * ���Ͷ�����֤���ཻ��
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
		//ȡֵ:77
		'txnType'=> '77',//��������--M
		//�������ַ��Ͷ��ŵ����ͣ�00������ͨ����02�������Ѷ���04����Ԥ��Ȩ
		'txnSubType'=> '00',//��������--M
		'bizType'=> '000000',//��Ʒ����--M
		//����ί�е�֧����������
		'bindId'=> '',//ί�й�ϵ��ʶ��--C
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
		'accType'=> '',//�˺�����--O
		//���ѡ�Ԥ��Ȩ���ף��յ������˲ɼ��˺�ʱ�������ȫ��������������Լ���������Ϳ��ź�4λ
		'accNo'=> '',//�˺�--C
		//����������ѽ��׶�����һ��
		'orderId'=> date('YmdHis'),//�̻�������--M
		//����������ѽ��׶�������ʱ��һ��
		'txnTime'=> date('YmdHis'),//��������ʱ��--M
		//Ĭ��156���ο����Σ���ѡ�������׽�����ͣ����ֱ����ͣ�Ĭ��156
		'currencyCode'=> '156',//���ױ���--C
		//����ģ�����漰����������
		'txnAmt'=> '',//���׽��--C
		//�̻��Զ��屣���򣬽���Ӧ��ʱ��ԭ������
		'reqReserved'=> '',//���󷽱�����--O
		//��ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ} �ƶ�֧���ο�����
		'reserved'=> '',//������--O
		//�з��ռ���Ҫ����̻����� ���ռ��� {riskLevel=XX}
		'riskRateInfo'=> '',//������Ϣ��--O
		//�������յ������������ֻ���ʱ�����ڴ���
		'customerInfo'=> customerInfo(),//���п���֤��Ϣ�������Ϣ--C
		//��ʹ��������Կ�����������Ϣʱ�������ͼ���֤���CertID
		'encryptCertId'=> '',//����֤��ID--C
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
