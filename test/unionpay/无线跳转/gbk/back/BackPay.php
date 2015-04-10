<?php
header ( 'Content-type:text/html;charset=UTF-8' );
include_once '../func/common.php';
include_once '../func/SDKConfig.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
include_once '../func/httpClient.php';
include_once '../func/log.class.php';

//$flag = empty($_GET['flag']) ? 0 : $_GET['flag'];


/**
 * ǰ̨���ѽ���
 */


/**
 *	���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���Ҫ�����ռ����ĵ���д���ô�������ο�
 */

// ��ʼ����־
#$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
#$log->LogInfo ( "===========�����̨����ʼ============" );

$params = array(
		//�̶���д
		'version'=> '5.0.0',//�汾��--M
		//Ĭ��ȡֵ��UTF-8
		'encoding'=> 'GBK',//���뷽ʽ--M
		//ͨ��MPI�����ȡ
		'certId'=> getSignCertId (),//֤��ID--M
		//01RSA02 MD5 (�ݲ�֧��)
		'signMethod'=> '01',//ǩ������--M
		//ȡֵ��01 
		'txnType'=> '01',//��������--M
		//01���������ѣ�ͨ����ַ�ķ�ʽ����ǰ̨���Ѻͺ�̨���ѣ�������ת֧����03�����ڸ���
		'txnSubType'=> '00',//��������--M
		// 
		'bizType'=> '000000',//��Ʒ����--M
		'channelType'=> '07',//��������--M
		//ǰ̨�����̻����ʱʹ�ã�ǰ̨�ཻ��������
		'frontUrl'=> SDK_FRONT_TRANS_URL,//ǰ̨֪ͨ��ַ--C
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
		//�̻�������
		'orderId'=> date('YmdHis'),//�̻�������--M
		//�̻����ͽ���ʱ��
		'txnTime'=> date('YmdHis'),//��������ʱ��--M
		//��̨�ཻ���ҿ������ͣ������յ����յ������ռ����п���Ϣʱ����01�����п�02������03��C��Ĭ��ȡֵ��01ȡֵ��03����ʾ��IC�ն˷����IC�����ף�IC��Ϊ��ͨ���п�����֧��ʱ��������дΪ��01��
		'accType'=> '',//�˺�����--C
		//1��  ��̨�����ѽ���ʱ����ȫ���Ż򿨺ź�4λ 2��  �����յ����յ������ռ����п���Ϣʱ���͡�  3��ǰ̨�ཻ�׿�ͨ�����ú󷵻أ����ſ�ѡ����
		'accNo'=> '',//�˺�--C
		//���׵�λΪ��
		'txnAmt'=> '1',//���׽��--M
		//Ĭ��Ϊ156���� �ο�����
		'currencyCode'=> '156',//���ױ���--M
		//1����̨�����ѽ���ʱ����2�������յ����յ������ռ����п���Ϣʱ����3����֤֧��2.0����̨����ʱ��ѡKey=value��ʽ��������д�ο�����Ԫ˵����
		'customerInfo'=> customerInfo(),//���п���֤��Ϣ�������Ϣ--C
		//PC1��ǰ̨�����ѽ���ʱ����2����֤֧��2.0����̨����ʱ��ѡ
		'orderTimeout'=> '',//�������ճ�ʱʱ�䣨������ʹ�ã�--O
		//��
		'termId'=> '',//�ն˺�--O
		//�̻��Զ��屣���򣬽���Ӧ��ʱ��ԭ������
		'reqReserved'=> '',//���󷽱�����--O
		//�������� ��� marketId  �ƶ�֧����������ʱ���ض��̻�����ͨ���������͸ö���֧���μӵĻ��
		'reserved'=> '',//������--O
		//��ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ}
		'riskRateInfo'=> '',//������Ϣ��--O
		//��ʹ��������Կ�����������Ϣʱ�������ͼ���֤���CertID��˵��һ�£�Ŀǰ�̻���������ҳ��ͳһ��
		'encryptCertId'=> '',//����֤��ID--C
		//ǰ̨���ѽ������̻����ʹ��ֶΣ�����֧��ʧ��ʱ��ҳ����ת���̻���URL������������Ϣ������ת��
		'frontFailUrl'=> '',//ʧ�ܽ���ǰ̨��ת��ַ--O
		//���ڸ���ף��̻���ѡ�������Ϣʱ�������� ������������Ԫ˵��
		'instalTransInfo'=> '',//���ڸ�����Ϣ��--C
		//C���˺�����Ϊ02-����ʱ����д��ǰ̨�ཻ��ʱ��дĬ�����д��룬֧��ֱ����ת�������̻��������п���ϵͳӦ�𷵻�
		'issInsCode'=> '',//������������--O
		//�ƶ�֧��ҵ����Ҫ����
		'userMac'=> '',//�ն���Ϣ��--O
		//ǰ̨���ף���IP������Ҫ����̻�����
		'customerIp'=> '',//�ֿ���IP--C
		//������ ������ʱ��д ����Ψһ��ʶ�󶨹�ϵ
		'bindId'=> '',//�󶨱�ʶ��--O
		//�����������̻����׿����ã��������룩
		'payCardType'=> '',//֧��������--C
		//�п����ױ����п�������Ϣ��
		'cardTransData'=> '',//�п�������Ϣ��--C
		//��������Ϊ����֧��ʱʹ��
		'vpcTransData'=> '',//VPC������Ϣ��--C
		//�ƶ�֧������
		'orderDesc'=> '',//��������--C
	);

$params_4_pin = array(
//�̶���д
		'version'=> '5.0.0',//�汾��--M
		//Ĭ��ȡֵ��UTF-8
		'encoding'=> 'GBK',//���뷽ʽ--M
		//ͨ��MPI�����ȡ
		'certId'=> getSignCertId (),//֤��ID--M
		//01RSA02 MD5 (�ݲ�֧��)
		'signMethod'=> '01',//ǩ������--M
		//ȡֵ��01 
		'txnType'=> '01',//��������--M
		//01���������ѣ�ͨ����ַ�ķ�ʽ����ǰ̨���Ѻͺ�̨���ѣ�������ת֧����03�����ڸ���
		'txnSubType'=> '00',//��������--M
		// 
		'bizType'=> '000000',//��Ʒ����--M
		'channelType'=> '07',//��������--M
		//ǰ̨�����̻����ʱʹ�ã�ǰ̨�ཻ��������
		'frontUrl'=> SDK_FRONT_TRANS_URL,//ǰ̨֪ͨ��ַ--C
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
		//�̻�������
		'orderId'=> date('YmdHis'),//�̻�������--M
		//�̻����ͽ���ʱ��
		'txnTime'=> date('YmdHis'),//��������ʱ��--M
		//��̨�ཻ���ҿ������ͣ������յ����յ������ռ����п���Ϣʱ����01�����п�02������03��C��Ĭ��ȡֵ��01ȡֵ��03����ʾ��IC�ն˷����IC�����ף�IC��Ϊ��ͨ���п�����֧��ʱ��������дΪ��01��
		'accType'=> '',//�˺�����--C
		//1��  ��̨�����ѽ���ʱ����ȫ���Ż򿨺ź�4λ 2��  �����յ����յ������ռ����п���Ϣʱ���͡�  3��ǰ̨�ཻ�׿�ͨ�����ú󷵻أ����ſ�ѡ����
		'accNo'=> '',//�˺�--C
		//���׵�λΪ��
		'txnAmt'=> '1',//���׽��--M
		//Ĭ��Ϊ156���� �ο�����
		'currencyCode'=> '156',//���ױ���--M
		//1����̨�����ѽ���ʱ����2�������յ����յ������ռ����п���Ϣʱ����3����֤֧��2.0����̨����ʱ��ѡKey=value��ʽ��������д�ο�����Ԫ˵����
		'customerInfo'=> customerInfo(),//���п���֤��Ϣ�������Ϣ--C
		//PC1��ǰ̨�����ѽ���ʱ����2����֤֧��2.0����̨����ʱ��ѡ
		'orderTimeout'=> '',//�������ճ�ʱʱ�䣨������ʹ�ã�--O
		//��
		'termId'=> '',//�ն˺�--O
		//�̻��Զ��屣���򣬽���Ӧ��ʱ��ԭ������
		'reqReserved'=> '',//���󷽱�����--O
		//�������� ��� marketId  �ƶ�֧����������ʱ���ض��̻�����ͨ���������͸ö���֧���μӵĻ��
		'reserved'=> '',//������--O
		//��ʽ���£�{������1=ֵ&������2=ֵ&������3=ֵ}
		'riskRateInfo'=> '',//������Ϣ��--O
		//��ʹ��������Կ�����������Ϣʱ�������ͼ���֤���CertID��˵��һ�£�Ŀǰ�̻���������ҳ��ͳһ��
		'encryptCertId'=> '',//����֤��ID--C
		//ǰ̨���ѽ������̻����ʹ��ֶΣ�����֧��ʧ��ʱ��ҳ����ת���̻���URL������������Ϣ������ת��
		'frontFailUrl'=> '',//ʧ�ܽ���ǰ̨��ת��ַ--O
		//���ڸ���ף��̻���ѡ�������Ϣʱ�������� ������������Ԫ˵��
		'instalTransInfo'=> '',//���ڸ�����Ϣ��--C
		//C���˺�����Ϊ02-����ʱ����д��ǰ̨�ཻ��ʱ��дĬ�����д��룬֧��ֱ����ת�������̻��������п���ϵͳӦ�𷵻�
		'issInsCode'=> '',//������������--O
		//�ƶ�֧��ҵ����Ҫ����
		'userMac'=> '',//�ն���Ϣ��--O
		//ǰ̨���ף���IP������Ҫ����̻�����
		'customerIp'=> '',//�ֿ���IP--C
		//������ ������ʱ��д ����Ψһ��ʶ�󶨹�ϵ
		'bindId'=> '',//�󶨱�ʶ��--O
		//�����������̻����׿����ã��������룩
		'payCardType'=> '',//֧��������--C
		//�п����ױ����п�������Ϣ��
		'cardTransData'=> '',//�п�������Ϣ��--C
		//��������Ϊ����֧��ʱʹ��
		'vpcTransData'=> '',//VPC������Ϣ��--C
		//�ƶ�֧������
		'orderDesc'=> '',//��������--C
);
//$params_4_pin['customerInfo'] =base64_encode("{phoneNo=13764069733&pin=".encryptPin("622114000000100150","111111")."}");
     

$result_arr_1024 = array(
  "accNo"=> "9555********0001",
  "accessType"=> "0",
  "bizType"=> "000000",
  "certId"=> "3474813271258769001041842579301293446",
  "currencyCode"=> "156",
  "encoding"=> "GBK",
  "merId"=> "898340183980105",
  "orderId"=> "20141120140721",
  "payCardType"=> "01",
  "payType"=> "0301",
  "queryId"=> "201411201407211751638",
  "respCode"=> "00",
  "respMsg"=> "�ɹ�[0000000]",
  "signMethod"=> "01",
  "txnAmt"=> "1230",
  "txnSubType"=> "01",
  "txnTime"=> "20141120140721",
  "txnType"=> "01",
  "version"=> "5.0.0",
  "signature"=> "eNVMlQAL78/R0qJWzKDoMW0JlfNIQ1if4VpM1we13sMY7Np9D9dBV+AGWGxiVt5Uk5oDs9NcFtxB18hKcberTKRHehHMMAXFBojWe5iOG0Xj+KyrDUOIcqf5ueIFoV7rNqnbsS7F4VXY9gEIChlkn4UCF0nuTgRVO+ePrV1gx2ZmQrMsTtFtpIvNGgOtHC2uwlSRo+E6ewcZZ+FUQnQ6a6alW/kSAweCKhheBtCsm+//Obgs88+mM0yzO1/95PGrnGaEQsg2xYgNVlka6KsH9akUrefDz1gWolDPTylNk/CMU2FRsD/t2gzysytzAljtiPuzuCjG6h1936baEjmWuw=="
);

//echo "<br><b>params</b><br>";
//echo "SDK_SIGN_CERT_PATH��".SDK_SIGN_CERT_PATH."<br>";
//echo "SDK_SIGN_CERT_PWD��".SDK_SIGN_CERT_PWD."<br>";
//echo "SDK_VERIFY_CERT_PATH".SDK_VERIFY_CERT_PATH."<br>";
if ($flag == 1){
    // ���ܲ��ԣ�ǩ��
    sign ($params);		
    exit;
}elseif ($flag == 2 ){
    // ���ܲ��ԣ���ǩ

    $r = verify($result_arr_1024);
    echo $r ? '��ǩ�ɹ�' : '��ǩʧ��';
    exit;
}elseif ($flag == 3 ){
    // ���ܲ��ԣ�����
    $r = encryptPin("1234567890123456", "111111");
    echo $r;
    exit;
}elseif ($flag == 4 ){
}elseif ($flag == 5 ){
}elseif ($flag == 6 ){
        // ���ܲ���1
		// ����ֶ��Ƿ���Ҫ����
		encrypt_params ( $params_4_pin );		
        echo "<br /><br />";
        //echo "<br /><b>encrypt_params</b><br />";
        var_dump($params_4_pin);
        echo  var_dump($params_4_pin);
        //echo    var_dump($params_4_pin);
        
        echo "<br /><br />";
        echo "<br /><br />";
		// ǩ��
		sign ( $params_4_pin );		
        echo "<br /><br />";
        //echo "<br /><b>sign</b><br />";
        var_dump($params_4_pin);
        
        
        echo "<br /><br />";
        echo "<br /><br />";
		// ������Ϣ����̨

		$result = sendHttpRequest ($params_4_pin, SDK_BACK_TRANS_URL );


		//���ؽ��չʾ
        $result_arr = coverStringToArray ( $result );//�ַ�ת����
        echo "<br /><br />";
        echo "<br /><b>result</b><br />";
        var_dump($result_arr);
        echo "<br /><br />";
        echo "<br /><br />";
        $r = verify($result_arr);
        echo "<br /><br />";
        echo "<br /><b>verify</b><br />";
        echo $r;
        echo "<br /><br />";
        echo "<br /><br />";
        echo $r ? '��ǩ�ɹ�' : '��ǩʧ��';

		$html = create_html ( $result_arr, SDK_BACK_NOTIFY_URL );
        #echo $html;
}else{
    // ���ܲ���2

		// ����ֶ��Ƿ���Ҫ����
		//encrypt_params ( $params );		
		// ǩ��
		sign ( $params );		
		// ������Ϣ����̨
		$result = sendHttpRequest ($params, SDK_BACK_TRANS_URL );

		//���ؽ��չʾ
        $result_arr = coverStringToArray ( $result );//�ַ�ת����
        var_dump($result_arr);
        echo "<br /><br />";
        echo "<br /><br />";
        $r = verify($result_arr);
        echo "<br /><br />";
        echo "<br /><br />";
        echo $r;
        echo "<br /><br />";
        echo "<br /><br />";
        echo $r ? '��ǩ�ɹ�' : '��ǩʧ��';

		$html = create_html ( $result_arr, SDK_BACK_NOTIFY_URL );
        #echo $html;
}
		?>
