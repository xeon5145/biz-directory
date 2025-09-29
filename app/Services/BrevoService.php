<?php
namespace App\Services;

require_once APPPATH . '../vendor/autoload.php';

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\SendSmtpEmail;
use Brevo\Client\ApiException;
use GuzzleHttp\Client;

class BrevoService
{
    protected $api;
    protected $fromEmail;
    protected $fromName;
    protected $lastError = null;
    protected $lastResponse = null;

    public function __construct()
    {
        $apiKey = env('BREVO_API_KEY');
        $this->fromEmail = env('BREVO_FROM_EMAIL');
        $this->fromName  = env('BREVO_FROM_NAME');

        if (empty($apiKey)) {
            log_message('error', 'BrevoService: BREVO_API_KEY is not set.');
            throw new \RuntimeException('BREVO_API_KEY is not configured');
        }
        if (empty($this->fromEmail)) {
            log_message('error', 'BrevoService: BREVO_FROM_EMAIL is not set.');
            throw new \RuntimeException('BREVO_FROM_EMAIL is not configured');
        }
        if (empty($this->fromName)) {
            // Not fatal but helpful to set a default
            $this->fromName = 'No-Reply';
        }

        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $apiKey);
        $this->api = new TransactionalEmailsApi(new Client(), $config);
    }

    /**
     * Send raw HTML email
     */
    public function send(string $toEmail, string $toName, string $subject, string $html, array $params = [])
    {
        $this->lastError = null;
        $this->lastResponse = null;

        $email = new SendSmtpEmail([
            'sender'      => ['email' => $this->fromEmail, 'name' => $this->fromName],
            'to'          => [['email' => $toEmail, 'name' => $toName]],
            'subject'     => $subject,
            'htmlContent' => $html,
            'params'      => $params
        ]);

        try {
            $resp = $this->api->sendTransacEmail($email);
            $this->lastResponse = $resp;
            return $resp;
        } catch (ApiException $e) {
            $responseBody = method_exists($e, 'getResponseBody') ? $e->getResponseBody() : null;
            $this->lastError = [
                'type' => 'ApiException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'response' => $responseBody,
            ];
            log_message('error', 'Brevo API send error: ' . $e->getMessage() . ' Response: ' . json_encode($responseBody));
            return false;
        } catch (\Exception $e) {
            $this->lastError = [
                'type' => 'Exception',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
            log_message('error', 'Brevo API send error (general): ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send via Brevo Template
     */
    public function sendTemplate(int $templateId, string $toEmail, string $toName, array $params = [])
    {
        $this->lastError = null;
        $this->lastResponse = null;

        $email = new SendSmtpEmail();
        $email->setTemplateId($templateId);
        $email->setSender(['email' => $this->fromEmail, 'name' => $this->fromName]);
        $email->setTo([[ 'email' => $toEmail, 'name' => $toName ]]);
        $email->setParams($params);

        try {
            $resp = $this->api->sendTransacEmail($email);
            $this->lastResponse = $resp;
            return $resp;
        } catch (ApiException $e) {
            $responseBody = method_exists($e, 'getResponseBody') ? $e->getResponseBody() : null;
            $this->lastError = [
                'type' => 'ApiException',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'response' => $responseBody,
            ];
            log_message('error', 'Brevo API template send error: ' . $e->getMessage() . ' Response: ' . json_encode($responseBody));
            return false;
        } catch (\Exception $e) {
            $this->lastError = [
                'type' => 'Exception',
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
            log_message('error', 'Brevo API template send error (general): ' . $e->getMessage());
            return false;
        }
    }

    public function getLastError()
    {
        return $this->lastError;
    }

    public function getLastResponse()
    {
        return $this->lastResponse;
    }
}
