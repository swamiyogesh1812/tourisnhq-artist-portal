<?php
include('dbconfig.php');
$template_id = $_REQUEST['template'];
$artist_id = $_REQUEST['artist'];

if($template_id != '')
{
    
mysql_query("update artists set email_status = '1' where id='$artist_id'");
include('mailchimp/src/Mandrill.php');
try {
    $mandrill = new Mandrill('WTKCvq-uFLKrBoorJYnQ4w');
    $template_name = $template_id;
    $template_content = array(
        array(
            'name' => 'ORDERDATE',
            'content' => 'example theme content'
        )
    );
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => $subject,
        'from_email' => 'artists@tourismhq.com',
        'from_name' => 'Tourismhq',
        'to' => array(
            array(
                'email' => $email,
                'name' => $name,
                'type' => 'to'
            )
        ),
        //'headers' => array('Reply-To' => 'message.reply@example.com'),
        'important' => false,
        'track_opens' => null,
        'track_clicks' => null,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
        'view_content_link' => null,
        //'bcc_address' => 'message.bcc_address@example.com',
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
            array(
                'name' => 'CODE',
                'content' => $code
            ),
            array(
                'name' => 'NAME',
                'content' => $name
            ),
            array(
                'name' => 'timestamp',
                'content' => $nxt_date
            ),
            array(
                'name' => 'Salesrepname',
                'content' => $sales_name
            ),
            array(
                'name' => 'number',
                'content' => $twilio_number
            )
        )
    );
    $async = false;
    $ip_pool = 'Main Pool';
    //$send_at = date('Y-m-d H:i:s');
    //$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);
   // print_r($result);
    /*
    update to database
    */
   
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    //throw $e;
}
}
	?>