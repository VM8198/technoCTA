<?php
//mail('malvivivek8198@gmail.com', 'Subject Line Here', 'Body of Message Here', 'From: malvivivek123@gmail.com');
//ini_set('display_errors',1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/**require_once('/var/www/html/app/Vendor/phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = false;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$mail->Username = 'raoinfotechp@gmail.com';
$mail->Password = 'raoinfotech@123';
$mail->setFrom('raoinfotechp@gmail.com', 'From Name (freeform string)');
$mail->addAddress('malvivivek8198@gmail.com'); //call this multiple times for multiple recipients
$mail->Subject = 'Subject';
$mail->msgHTML('<h3>Hello World</h3>');
$mail->AltBody = 'alternative body if html fails to load';
//$mail->addAttachment('/path/to/file/); //OPTIONAL attachment

if (!$mail->send()) {
    echo "Mailer Error: ";
    echo $mail->ErrorInfo;
} else {
    echo "Email sent";
}
*/

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $components = array('Auth', 'Session', 'Email', 'RequestHandler');
    public $helpers=array("Html", "Form", "Session");
}
