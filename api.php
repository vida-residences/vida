<?php

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendingEmail($fullname, $emailaddress, $MobilePhone, $geturl, $campaignName, $current_year) {
    $mail = new PHPMailer(true);
    $mail->isHTML(true); // Set email format to HTML
    $mail->CharSet = 'UTF-8'; // Set UTF-8 encoding
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'psirealestate2@gmail.com';
    $mail->Password = 'xlez pdtn pctn fbjm';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    // TCP port to connect to

    // Email content
    $body = '
        <div>
        <br class="">

        <div class="">
            <div class="">
                <table align="center" cellpadding="0" cellspacing="0" width="550">
                    <tbody class="">
                        <tr class="">
                            <td class="">
                                <table align="center" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody class="">
                                        <tr class="">
                                            <td align="center" bgcolor="#FFFFFF" class="" height="80" style="text-align: center;" width="550">
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <td class="" height="20">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table align="center" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody class="">
                                        <tr class="">
                                            <td bgcolor="#02344A" class="" colspan="3" height="10">&nbsp;</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="color: #fdfdfd; font-size: 16px; background: #02344a;" width="10">&nbsp;</td>

                                            <td class="" height="30" style="color: #fff; font-size: 16px; background: #02344a; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">'.$campaignName.'</td>

                                            <td class="" style="color: #ffffff; font-size: 16px; background: #02344a;" width="10">&nbsp;</td>
                                        </tr>

                                        <tr class="">
                                            <td bgcolor="#02344A" class="" colspan="3" height="10">&nbsp;</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" height="20">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table align="center" cellpadding="5" cellspacing="3" style="border: 1px solid #e8e6e6;" width="100%">
                                    <tbody class="">
                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Name:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$fullname.'</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Email:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$emailaddress.'</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Phone:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$MobilePhone.'</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">URL coming from:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$geturl.'</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table>
                                    <tbody class="">
                                        <tr class="">
                                            <td class="" height="10" style="line-height: 9px;">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table align="center" cellpadding="0" cellspacing="0" width="550">
                                    <tbody class="">
                                        <tr class="">
                                            <td align="center" class="" headers="20" style="background: #02344a; color: #fff; font-size: 11px; line-height: 9px; font-family: Arial,Helvetica, sans-serif;">Copyright &copy; '.$current_year.' | All
                                            Rights Reserved | Property Shop Investment</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p>&nbsp;</p>';

    try {
        $mail->msgHTML($body);
        $mail->setFrom('psirealestate2@gmail.com');
        $mail->addAddress('callcenter@psidubai.com');
        // $mail->AddCC('ameer.k@psidubai.com');
        $mail->AddCC('amer@psidubai.com');
        $mail->AddCC('akshayb@psidubai.com');
        $mail->Subject = 'New Lead - ' . $campaignName;

        $mail->send();
        return 'sent';
    } catch (Exception $e) {
        error_log('Email could not be sent. Error: ' . $mail->ErrorInfo);
        return 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }
}

if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $fname . ' ' . $lname;
    $emailaddress = $_POST['email'];
    $MobilePhone = $_POST['full_phone_number'];
    $geturl = $_POST['url'];
    $mediatype = $_POST['mediatype'];
    $medianame = $_POST['medianame'];
    $campaignName = $_POST['campaign_name'];
    $campaignId = $_POST['campaign_id'];
    $userIP = $_POST['userIp'];

    $remarks = "Client Name: " . $fullname . "</br>
    Client Email: " . $emailaddress . "</br>
    Client Phone: " . $MobilePhone . "</br> 
    URL coming from: " . $geturl;
    $remarks = urlencode($remarks);
    
    $current_year = date("Y");
    
    $curl = curl_init();

    $url = 'https://api.portal.dubai-crm.com/leads/query/create?TitleID=129929&IsForAutoRotation=false&FirstName=' . urlencode($fname) . '&FamilyName=' . urlencode($lname) . '&MobileCountryCode=0&MobileAreaCode=0&MobilePhone=' . $MobilePhone . '&TelephoneCountryCode=na&TelephoneAreaCode=na&Telephone=na&Email=' . urlencode($emailaddress) . '&NationalityID=65946&Remarks=userIP:' . $userIP .'&RequirementType=91212&ContactType=3&CountryID=65946&StateID=91578&CityID=91578&DistrictID=&CommunityID=&SubCommunityID&PropertyID=303650&UnitType=20&PropertyCampaignId=' . $campaignId . '&LanguageID=115915&MethodOfContact=115747&MediaType=' . $mediatype . '&MediaName=' . $medianame . '&Bedroom=&Bathroom=&Budget=&Budget2=&RequirementCountryID=65946&ReferredToID=4421&ReferredByID=4421&IsBulkUpload=false&ActivityAssignedTo=4421&ActivityDate=&ActivityTypeId=167234&ActivitySubject=Email%20Inquiry%20Copy&ActivityRemarks=' . $remarks . '&Phone=&APIKey=d301dba69732065cd006f90c6056b279fe05d9671beb6d29f2d9deb0206888c38239a3257ccdf4d0';


    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $response = curl_error($curl);
    }
    
    curl_close($curl);
    
     
    $data = json_decode($response, true); // convert JSON string to associative array
    $status = $data['status']; // get the value of the 'status' key
     
    
    if ($status == 'Success'){
    
    	
    			$emailResult = 'not sent';
    
    			$emailResult = sendingEmail($fullname, $emailaddress, $MobilePhone, $geturl, $campaignName, $current_year);
    			$data["result"] = $emailResult;
    			echo json_encode($data);
    
    }
}
?>
