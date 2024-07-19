<?php
include('src/Mandrill.php');
try {
    $mandrill = new Mandrill('7mDeTCzNREuoAvWXqTzZ0A');
    $template_name = 'sb-0-your-vip-code-control-group';
    $template_content = array(
        array(
            'name' => 'ORDERDATE',
            'content' => 'example theme content'
        )
    );
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => 'Spring Break RARO',
        'from_email' => 'sales@tourismhq.com',
        'from_name' => 'Spring Break RARO',
        'to' => array(
            array(
                'email' => 'digant.samcomtech@gmail.com',
                'name' => 'Recipient Name',
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'message.reply@example.com'),
        'important' => false,
        'track_opens' => null,
        'track_clicks' => null,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
        'view_content_link' => null,
        'bcc_address' => 'message.bcc_address@example.com',
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
            array(
                'name' => 'CODE',
                'content' => '7878'
            ),array(
                'name' => 'NAME',
                'content' => 'Hello'
            )
            
        )
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $send_at = date('Y-m-d H:i:s');
    $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
    print_r($result);
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
?>
