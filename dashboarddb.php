<?php
include('dbconfig.php');

session_start();

$fb_id = $_SESSION['UID'];
$dj_name = isset($_REQUEST['dj_name']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['dj_name'])) : '';
$fname = isset($_REQUEST['fname']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['fname'])) : '';
$lname = isset($_REQUEST['lname']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['lname'])) : '';
$profile_pic = 'images.jpg';
$artist_bio = isset($_REQUEST['artist_bio']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['artist_bio'])) : '';
$dj_page_id = isset($_REQUEST['dj_fb_page']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['dj_fb_page'])) : '';
$soundcloud = isset($_REQUEST['soundcloud']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['soundcloud'])) : '';
$instagram = isset($_REQUEST['instagram']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['instagram'])) : '';
$prior_trip = isset($_REQUEST['prior_trip']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['prior_trip'])) : '';
$largest_gig = isset($_REQUEST['largest_gig']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['largest_gig'])) : '';
$priorities = isset($_REQUEST['priorities']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['priorities'])) : '';
$perform_in_nz = isset($_REQUEST['perform_in_nz']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['perform_in_nz'])) : '';
$promoter = isset($_REQUEST['promoter']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['promoter'])) : '';
$fb_page = isset($_REQUEST['fb_page']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['fb_page'])) : '';
$phone = isset($_REQUEST['phone']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['phone'])) : '';
$email = isset($_REQUEST['email']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['email'])) : '';
$criminal_convictions = isset($_REQUEST['criminal_convictions']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['criminal_convictions'])) : '';
$specialize = isset($_REQUEST['specialize']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['specialize'])) : '';
$track = isset($_REQUEST['track']) ? strip_tags(mysqli_real_escape_string($conn, $_REQUEST['track'])) : '';

if (isset($_FILES["profile_pic"]) && $_FILES["profile_pic"]["tmp_name"] != '') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
    $profile_pic = $_FILES["profile_pic"]["name"];
} else {
    $profile_pic = isset($_REQUEST['hidden_image']) ? strip_tags($_REQUEST['hidden_image']) : 'images.jpg';
}

//$query_select = mysql_query("select * from artists where fb_id = '$fb_id' and directory = '1'");
//if(mysql_num_rows($query_select) > 0)
//{
//    mysql_query("delete from artists where fb_id = '$fb_id' and directory = '1'");
//}
//$query_select_cnt = mysql_query("select * from artists where directory = '1'");
//$num = mysql_num_rows($query_select_cnt);
//$seq = $num+1;




//$query = mysql_query("insert into artists(`id`, `fb_id`, `dj_name`, `fname`, `lname`, `profile_pic`, `soundcloud`, `instagram`, `prior_trip`, `largest_gig`, `priorities`, `perform_in_nz`, `is_promoter`, `artists_bio`, `dj_fb_page`, `event_id`, `fb_page`, `phone`, `email`, `email_status`, `approved`, `sequence_num`,`directory`,criminal_convictions,specialize,track) values('','$fb_id','$dj_name','$fname','$lname','$profile_pic','$soundcloud','$instagram','$prior_trip','$largest_gig','$priorities','$perform_in_nz','$promoter','$artist_bio','$dj_page_id','','$fb_page','$phone','$email','0','0','$seq','1','$criminal_convictions','$specialize','$track')");
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_REQUEST['step'] == '1') {
    $query_select = mysqli_query($conn, "SELECT * FROM artists WHERE fb_id = '$fb_id' AND directory = '1'");
    
    if (mysqli_num_rows($query_select) > 0) {
        mysqli_query($conn, "UPDATE artists SET dj_name='$dj_name', fname='$fname', lname='$lname', phone='$phone', email='$email' WHERE fb_id='$fb_id' AND directory='1'");
    } else {
        $query_select_cnt = mysqli_query($conn, "SELECT * FROM artists WHERE directory = '1'");
        $num = mysqli_num_rows($query_select_cnt);
        $seq = $num + 1;
        mysqli_query($conn, "INSERT INTO artists (fb_id, dj_name, fname, lname, phone, email, sequence_num, directory) VALUES ('$fb_id', '$dj_name', '$fname', '$lname', '$phone', '$email', '$seq', '1')");
    }
}

if ($_REQUEST['step'] == '2') {
    mysqli_query($conn, "UPDATE artists SET profile_pic='$profile_pic', artists_bio='$artist_bio' WHERE fb_id='$fb_id' AND directory='1'");
}

if ($_REQUEST['step'] == '3') {
    mysqli_query($conn, "UPDATE artists SET soundcloud='$soundcloud', instagram='$instagram', dj_fb_page='$dj_page_id', fb_page='$fb_page', prior_trip='$prior_trip' WHERE fb_id='$fb_id' AND directory='1'");
}
if($_REQUEST['step'] == '4')
{
    $sql_update = "UPDATE artists 
    SET priorities='$priorities', criminal_convictions='$criminal_convictions', perform_in_nz='$perform_in_nz', is_promoter='$promoter', specialize='$specialize', track='$track' 
    WHERE fb_id='$fb_id' AND directory='1'";
$conn->query($sql_update);

// Retrieve the updated artist information
$sql_select = "SELECT * FROM artists WHERE fb_id='$fb_id' AND directory='1'";
$result = $conn->query($sql_select);

if ($result && $result->num_rows > 0) {
$row_get = $result->fetch_assoc();
$email = $row_get['email'];
$name = $row_get['fname'];

// Update the Users table
$sql_update_users = "UPDATE Users SET profile_complete='1' WHERE Fuid='$fb_id'";
$conn->query($sql_update_users);
} else {
// Handle the case where no results are returned
$email = '';
$name = '';
}

$arr = array('fb_id' => $fb_id);
echo json_encode($arr);
exit;
// Temporarily exiting here...22-03-2024
include('mailchimp/src/Mandrill.php');
$mandrill = new Mandrill('WTKCvq-uFLKrBoorJYnQ4w');
    $template_name = 'thq-careers';
    $template_content = array(
        array(
            'name' => 'ORDERDATE',
            'content' => 'example theme content'
        )
    );
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => "We Have Received Your Application",
        'from_email' => 'team@tourismhq.com',
        'from_name' => 'TourismHQ',
        'to' => array(
            array(
                'email' => $email,
                'name' => $name,
                'type' => 'to'
            ),
            array(
                'email' => 'digant.samcomtech@gmail.com',
                'name' => $name,
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
                'content' => $code
            ),
            array(
                'name' => 'NAME',
                'content' => $name
            )
        )
    );
    
    $message1 = array(
        'html' => '<p>New user signup as artists with email '.$email.'</p>',
        'text' => 'Example text content',
        'subject' => "New user signup artists",
        'from_email' => 'sales@tourismhq.com',
        'from_name' => 'TourismHQ',
        'to' => array(
            array(
                'email' => 'olivia@tourismhq.com',
                'name' => 'Olivia',
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'olivia@tourismhq.com'),
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
            )
        )
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $result = $mandrill->messages->send($message1, $async, $ip_pool);
    
    $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);
     
   // print_r($result);

echo json_encode($arr);
exit;
}
?>
