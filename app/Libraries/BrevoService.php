<?php

namespace App\Libraries;

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use Brevo\Client\Model\SendSmtpEmailSender;
use Brevo\Client\Model\SendSmtpEmailTo;
use GuzzleHttp\Client;

class BrevoService
{
    private $apiInstance;
    private $config;

    public function __construct()
    {
        // Configure API key authorization
        $this->config = Configuration::getDefaultConfiguration()->setApiKey('api-key', getenv('BREVO_API_KEY'));
        
        // Create API instance
        $this->apiInstance = new TransactionalEmailsApi(
            new Client(),
            $this->config
        );
    }

    /**
     * Send a simple email
     */
    public function sendEmail($to, $subject, $htmlContent, $textContent = null)
    {
        try {
            $sendSmtpEmail = new SendSmtpEmail();
            
            // Set sender
            $sender = new SendSmtpEmailSender();
            $sender->setEmail(getenv('BREVO_FROM_EMAIL'));
            $sender->setName(getenv('BREVO_FROM_NAME'));
            $sendSmtpEmail->setSender($sender);
            
            // Set recipient
            $recipient = new SendSmtpEmailTo();
            $recipient->setEmail($to);
            $sendSmtpEmail->setTo([$recipient]);
            
            // Set email content
            $sendSmtpEmail->setSubject($subject);
            $sendSmtpEmail->setHtmlContent($htmlContent);
            
            if ($textContent) {
                $sendSmtpEmail->setTextContent($textContent);
            }
            
            // Send email
            $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
           
            return [
                'success' => true,
                'messageId' => $result->getMessageId(),
                'message' => 'Email sent successfully'
            ];
            
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Send email with template
     */
    public function sendTemplateEmail($to, $templateId, $templateParams = [])
    {
        try {
            $sendSmtpEmail = new SendSmtpEmail();
            
            // Set sender
            $sender = new SendSmtpEmailSender();
            $sender->setEmail(getenv('BREVO_FROM_EMAIL'));
            $sender->setName(getenv('BREVO_FROM_NAME'));
            $sendSmtpEmail->setSender($sender);
            
            // Set recipient
            $recipient = new SendSmtpEmailTo();
            $recipient->setEmail($to);
            $sendSmtpEmail->setTo([$recipient]);
            
            // Set template
            $sendSmtpEmail->setTemplateId($templateId);
            
            // Set template parameters
            if (!empty($templateParams)) {
                $sendSmtpEmail->setParams($templateParams);
            }
            
            // Send email
            $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
            
            return [
                'success' => true,
                'messageId' => $result->getMessageId(),
                'message' => 'Template email sent successfully'
            ];
            
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Send bulk emails
     */
    public function sendBulkEmail($recipients, $subject, $htmlContent, $textContent = null)
    {
        try {
            $sendSmtpEmail = new SendSmtpEmail();
            
            // Set sender
            $sender = new SendSmtpEmailSender();
            $sender->setEmail(getenv('BREVO_FROM_EMAIL'));
            $sender->setName(getenv('BREVO_FROM_NAME'));
            $sendSmtpEmail->setSender($sender);
            
            // Set recipients
            $toList = [];
            foreach ($recipients as $email) {
                $recipient = new SendSmtpEmailTo();
                $recipient->setEmail($email);
                $toList[] = $recipient;
            }
            $sendSmtpEmail->setTo($toList);
            
            // Set email content
            $sendSmtpEmail->setSubject($subject);
            $sendSmtpEmail->setHtmlContent($htmlContent);
            
            if ($textContent) {
                $sendSmtpEmail->setTextContent($textContent);
            }
            
            // Send email
            $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
            
            return [
                'success' => true,
                'messageId' => $result->getMessageId(),
                'message' => 'Bulk email sent successfully'
            ];
            
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}