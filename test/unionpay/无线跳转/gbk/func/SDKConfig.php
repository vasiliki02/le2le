<?php


// cvn2���� 1������ 0:������
const SDK_CVN2_ENC = 0;
// ��Ч�ڼ��� 1:���� 0:������
const SDK_DATE_ENC = 0;
// ���ż��� 1������ 0:������
const SDK_PAN_ENC = 0;
 

// ǩ��֤��·��
const SDK_SIGN_CERT_PATH = 'D:/certs/700000000000001new1.cer.pfx';

// ǩ��֤������
 const SDK_SIGN_CERT_PWD = '000000';
 
// ��ǩ֤��
const SDK_VERIFY_CERT_PATH = 'D:/certs/UPOP_VERIFY.cer';

// �������֤��
const SDK_ENCRYPT_CERT_PATH = 'D:/certs/cert_49.cer';

// ��ǩ֤��·��
const SDK_VERIFY_CERT_DIR = 'D:/certs/cert_49 (1).cer';

// ǰ̨�����ַ
const SDK_FRONT_TRANS_URL = 'http://146.240.25.27:11000/ACP/api/frontTransReq.do';

// ��̨�����ַ
const SDK_BACK_TRANS_URL = 'http://146.240.25.27:11000/ACP/api/backTransReq.do';

// ��������
const SDK_BATCH_TRANS_URL = 'http://146.240.25.27:11000/ACP/api/batchTrans.do';

//��������״̬��ѯ
const SDK_BATCH_QUERY_URL = 'http://172.17.138.27:10086/gateway/api/batchQueryRequest.do';
//http://146.240.25.27:11000/ACP/api/queryTrans.do

//���ʲ�ѯ�����ַ
const SDK_SINGLE_QUERY_URL = 'http://146.240.25.27:11000/ACP/internal/api/backTransReq.do';

//�ļ����������ַ
const SDK_FILE_QUERY_URL = 'http://172.17.138.27:10086/gateway/api/fileTransRequest.do';

// ǰ̨֪ͨ��ַ
const SDK_FRONT_NOTIFY_URL = 'http://127.1:88/upacp_sdk_php/demo/response.php';
// ��̨֪ͨ��ַ
const SDK_BACK_NOTIFY_URL = 'http://127.1:88/upacp_sdk_php/demo/response.php';

//�ļ�����Ŀ¼ 
const SDK_FILE_DOWN_PATH = 'd:\\';

//��־ Ŀ¼ 
const SDK_LOG_FILE_PATH = 'D:/certs/UPOnlineMPIUtilPhp/logs/';

//��־����
const SDK_LOG_LEVEL = 'INFO';

//�п����׵�ַ
const SDK_Card_Request_Url = '';

//App���׵�ַ
const SDK_App_Request_Url = '';
	
?>