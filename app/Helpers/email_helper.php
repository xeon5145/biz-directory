<?php

if (!function_exists('send_brevo_email')) {
    function send_brevo_email($to, $subject, $message, $isHtml = true)
    {
        $brevo = service('brevo');
        
        if ($isHtml) {
            return $brevo->sendEmail($to, $subject, $message);
        } else {
            return $brevo->sendEmail($to, $subject, null, $message);
        }
    }
}

if (!function_exists('send_brevo_template')) {
    function send_brevo_template($to, $templateId, $params = [])
    {
        $brevo = service('brevo');
        return $brevo->sendTemplateEmail($to, $templateId, $params);
    }
}