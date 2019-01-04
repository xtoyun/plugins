<?
namespace xto\plugins\email;

use xto\plugins\EmailSender;


class sendcloud extends EmailSender{
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
		
	}

	public function configShortDescription(){
		return "sendcloud";
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