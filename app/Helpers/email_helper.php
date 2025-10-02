<?php

if (!function_exists('sendEmail')) {
    function sendEmail($to, $subject, $message, $isHtml = true)
    {
        $brevoService = service('brevo');
        
        if ($isHtml) {
            return $brevoService->sendEmail($to, $subject, $message);
        } else {
            return $brevoService->sendEmail($to, $subject, null, $message);
        }
    }
}

if (!function_exists('sendTemplate')) {
    function sendTemplate($to, $templateId, $params = [])
    {
        $brevoService = service('brevo');
        return $brevoService->sendTemplateEmail($to, $templateId, $params);
    }
}