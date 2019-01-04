<?
/**
 * ============================================================================
 * * 版权所有 2013-2018 xtoyun.net，并保留所有权利。
 * 网站地址: http://www.xtoyun.net；
 * ============================================================================
 * $Author: xtoyun $ 
*/
namespace xto\plugins\email;

use xto\plugins\EmailSender;
use xto\plugins\libs\smtp; 

class taomail extends EmailSender{
	protected $smtpserver;
	protected $smtpserverport;
	protected $smtpusermail;
	protected $smtpuser;
	protected $smtppass; 
	protected $mailtype='HTML';

	public function __construct(){
		parent::__construct();
		
	}

	public function send($mailto,$subject='',$body=''){
		$smtp = new smtp($this->smtpserver, $this->smtpserverport, true, $this->smtpuser, $this->smtppass);
		//这里面的一个true是表示使用身份验证,否则不使用身份验证.  
		$smtp->debug = true;//是否显示发送的调试信息  
		$smtp->sendmail($mailto, $this->smtpusermail, $subject, $body, $this->mailtype);  
	}

	public function configShortDescription(){
		return "taomail";
	}

	public function configDescription(){
		return "雄韬邮件发送";
	}

	public function configLogo(){
		return "/config/plugins/email/taomail.png";
	}

	public function configSmtpserver(){
		return $this->smtpserver;
	} 

	public function configSmtpserverport(){
		return $this->smtpserverport;
	}

	public function configSmtpusermail(){
		return $this->smtpusermail;
	}

	public function configSmtpuser(){
		return $this->smtpuser;
	}

	public function configSmtppass(){
		return $this->smtppass;
	} 
	public function configMailtype(){
		return $this->mailtype;
	} 
}