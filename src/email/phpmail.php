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
require './vendor/phpmailer/class.phpmailer.php';

class phpmail extends EmailSender{
	protected $邮件头;
	protected $发件人;
	protected $服务器;
	protected $需要验证=true;
	protected $用户名;
	protected $密码; 

	public function __construct(){
		parent::__construct();
		
	}

	public function send($email,$title='',$body=''){
		$mail=new \PHPMailer();
	    // 设置PHPMailer使用SMTP服务器发送Email
	    $mail->IsSMTP();
	    // 设置邮件的字符编码，若不指定，则为'UTF-8'
	    $mail->CharSet='UTF-8';
	    // 添加收件人地址，可以多次使用来添加多个收件人
	    $mail->AddAddress($email);
	    // 设置邮件正文
	    $mail->Body=$body;
	    // 设置邮件头的From字段。
	    $mail->From=$this->邮件头;
	    // 设置发件人名字
	    $mail->FromName=$this->发件人;
	    // 设置邮件标题
	    $mail->Subject=$title;
	    // 设置SMTP服务器。
	    $mail->Host=$this->服务器;
	    // 设置为"需要验证"
	    $mail->SMTPAuth=$this->需要验证;
	    // 设置用户名和密码。
	    $mail->Username=$this->用户名;
	    $mail->Password=$this->密码;
	    // 发送邮件。
	    return($mail->Send());
	}

	public function configShortDescription(){
		return "phpmailer";
	}

	public function configDescription(){
		return "phpmailer邮件发送";
	}

	public function configLogo(){
		return "/config/plugins/email/phpmailer.png";
	}

	public function config邮件头(){
		return $this->邮件头;
	} 

	public function config发件人(){
		return $this->发件人;
	}

	public function config服务器(){
		return $this->服务器;
	}

	public function config需要验证(){
		return $this->需要验证;
	}

	public function config用户名(){
		return $this->用户名;
	}

	public function config密码(){
		return $this->密码;
	}
}