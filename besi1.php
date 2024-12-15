<?php
echo "\n\nJoin diskusi channel https://t.me/Si_New_Bie\n\n";
function formatPhoneNumber($phone) {
    if (strpos($phone, '628') === 0) {
        $phone = '08' . substr($phone, 3);
    }
    return $phone;
}
function nama() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ex = curl_exec($ch);
    preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
    $fullName = $name[2][mt_rand(0, 14)];
    $nameParts = explode(' ', $fullName);
    
    if (count($nameParts) > 2) {
        $firstName = $nameParts[0];
        $lastName = $nameParts[1];
    } else {
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] : '';
    }
    
    return [$firstName, $lastName];
}
list($firstName, $lastName) = nama();
function generateRandomDate($year) {
    $month = rand(1, 12);
    $day = rand(1, cal_days_in_month(CAL_GREGORIAN, $month, $year));
    return sprintf('%04d-%02d-%02d', $year, $month, $day);
}
$filename = 'wa.txt';
if (file_exists($filename)) {
    $file = fopen($filename, 'r');
    while (($phone = fgets($file)) !== false) {
        $phone = trim($phone);
//        echo $phone."\n";
//echo "Masukkan nomor telepon: ";
$member_phone = formatPhoneNumber($phone); //trim(fgets(STDIN));
   echo $member_phone."\n";
$children_birthdate = generateRandomDate(2022);
//echo "$children_birthdate";
$new_date = date("m-d-Y", strtotime($children_birthdate));
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.generasimaju.co.id/api/ironc/get-result?member_phone='.$member_phone.'&child_stage=2&child_gender=M&child_dob='.$new_date.'&child_feeding_mode=FormulaFeeding&child_milk=36&child_age_month=27&question_1=3&question_2=3&question_3=3&question_4=3&question_5=3&question_6=3&question_7=3',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => 'identity',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Encoding: identity',
    'Cache-Control: no-cache, no-store, must-revalidate',
    'Cookie: ageRangeId=2; child_id=29786; question_id=18795; status_result_ironc_tools=0; stage_result_ironc_tools=2; ironcSampling=1; PHPSESSID=un8p4a3cdbchgn9su5mtepc9tg; AWSALB=4pz2hUquCdMwxza7gxCM/xJFTNsBnxh6j4esCSqcQIRzDFw5Am74jAkIh50I+gxN+wQGTFbEP9kImMu766vNyq73edx4RwC8vlRV2nEgKH8o4KaJxKelOGBK77DT7BfQ3M5phrld6TKUNOvKRzC+TDaq8WE/E3plFKwESChhOdDPOiUmpqPxRJUmo+VfuQ==; AWSALBCORS=4pz2hUquCdMwxza7gxCM/xJFTNsBnxh6j4esCSqcQIRzDFw5Am74jAkIh50I+gxN+wQGTFbEP9kImMu766vNyq73edx4RwC8vlRV2nEgKH8o4KaJxKelOGBK77DT7BfQ3M5phrld6TKUNOvKRzC+TDaq8WE/E3plFKwESChhOdDPOiUmpqPxRJUmo+VfuQ==',
    'Pragma: no-cache',
    'Range: bytes=0-',
    'Referer: https://www.generasimaju.co.id/tools/kalkulator-zat-besi/question/7',
    'sec-ch-ua: "Not A(Brand";v="8", "Chromium";v="132", "Android WebView";v="132""',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
    'User-agent: Mozilla/5.0 (Linux; Android 14; M2101K6G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.6834.33 Mobile Safari/537.36',
    'X-Requested-With: XMLHttpRequest',
    'Host: www.generasimaju.co.id',
    'Connection: Keep-Alive'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
     echo "\n" . $err . "\n";
} else {
//  echo "\n" . $response . "\n";
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.generasimaju.co.id/api/ironc/register',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2,
  CURLOPT_COOKIEJAR => 'cookie.txt',
  CURLOPT_COOKIEFILE => 'cookie.txt',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'member_fullname='.$firstName.'+'.$lastName.'&member_phone=' . urlencode($member_phone) . '&children_gender=M&children_birthdate=' . urlencode($children_birthdate),
  CURLOPT_HTTPHEADER => array(
    'Host: www.generasimaju.co.id',
    'sec-ch-ua-platform: "Android"',
    'x-requested-with: XMLHttpRequest',
    'user-agent: Mozilla/5.0 (Linux; Android 14; M2101K6G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.6834.33 Mobile Safari/537.36',
    'accept: */*',
    'sec-ch-ua: "Not A(Brand";v="8", "Chromium";v="132", "Android WebView";v="132""',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'sec-ch-ua-mobile: ?1',
    'origin: https://www.generasimaju.co.id',
    'sec-fetch-site: same-origin',
    'sec-fetch-mode: cors',
    'sec-fetch-dest: empty',
    'referer: https://www.generasimaju.co.id/tools/kalkulator-zat-besi/result',
    'accept-language: en,id-ID;q=0.9,id;q=0.8,en-US;q=0.7',
    'cookie: PHPSESSID=m6ribre3svtcfki227dp36s18n',
    'cookie: ageRangeId=2',
    'cookie: child_id=29786',
    'cookie: question_id=18795',
    'cookie: status_result_ironc_tools=0',
    'cookie: stage_result_ironc_tools=2',
    'cookie: AWSALB=n30F13XrIg1e6Bll90hIe/vwpzP0os9qZnULl/E2RkrNOoi5srG3WhL6uef4GJzkERIapBVNliMRmCNeYOBtxO9DaRNeq24mGk7CE+DIIbbCVVEsebXGMb/+1HBZ',
    'cookie: AWSALBCORS=n30F13XrIg1e6Bll90hIe/vwpzP0os9qZnULl/E2RkrNOoi5srG3WhL6uef4GJzkERIapBVNliMRmCNeYOBtxO9DaRNeq24mGk7CE+DIIbbCVVEsebXGMb/+1HBZ',
    'cookie: ironcSampling=1',
    'priority: u=1, i'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "\n" . $err . "\n";
} else {
  $response_data = json_decode($response, true);
  if ($response_data['code'] === '24') {
    echo "Akun sudah terdaftar: " . $response_data['message'] . "\n";
  } else {
    echo "$member_phone Akun belum terdaftar.\nSilahkan daftar di web: generasimaju.co.id\natau\nwhatsapp: wa.me/6281190077708?text=halo\n";
//    echo "$member_phone Akun belum terdaftar, Silahkan daftar di web/whatsapp terlebih dahulu\n";
//    exit;
continue;
  }
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.generasimaju.co.id/api/ironc/sendotp',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2,
  CURLOPT_COOKIEJAR => 'cookie.txt',
  CURLOPT_COOKIEFILE => 'cookie.txt',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'phone=' . urlencode($member_phone) . '&actionForm=login',
  CURLOPT_HTTPHEADER => array(
    'Host: www.generasimaju.co.id',
    'sec-ch-ua-platform: "Android"',
    'x-requested-with: XMLHttpRequest',
    'user-agent: Mozilla/5.0 (Linux; Android 14; M2101K6G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.6834.33 Mobile Safari/537.36',
    'accept: */*',
    'sec-ch-ua: "Not A(Brand";v="8", "Chromium";v="132", "Android WebView";v="132""',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'sec-ch-ua-mobile: ?1',
    'origin: https://www.generasimaju.co.id',
    'sec-fetch-site: same-origin',
    'sec-fetch-mode: cors',
    'sec-fetch-dest: empty',
    'referer: https://www.generasimaju.co.id/tools/kalkulator-zat-besi/result',
    'accept-language: en,id-ID;q=0.9,id;q=0.8,en-US;q=0.7',
    'cookie: PHPSESSID=m6ribre3svtcfki227dp36s18n',
    'cookie: ageRangeId=2',
    'cookie: child_id=29786',
    'cookie: question_id=18795',
    'cookie: status_result_ironc_tools=0',
    'cookie: stage_result_ironc_tools=2',
    'cookie: ironcSampling=1',
//    'cookie: AWSALB=TiOsS6O9nQk90f6klhwOqVprp+PT82wpslV8roSW+v/E+RuxggOgqoSMo0riahfR61MXi8VQ9K1gj+eOiOftqlj3tO+9LMkD+wNbxbWX/OfG3metczHjZHJY9Asa',
//    'cookie: AWSALBCORS=TiOsS6O9nQk90f6klhwOqVprp+PT82wpslV8roSW+v/E+RuxggOgqoSMo0riahfR61MXi8VQ9K1gj+eOiOftqlj3tO+9LMkD+wNbxbWX/OfG3metczHjZHJY9Asa',
    'priority: u=1, i'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "\n" . $err . "\n";
} else {
  $response_data = json_decode($response, true);
  if ($response_data['code'] === 20) {
    echo "OTP telah dikirim: " . $response_data['message'] . "\n";
  } else {
    echo "Gagal mengirim OTP\n";
//var_dump($response_data);
continue;
//    exit;
  }
}

echo "Masukkan kode OTP: ";
$otp_code = trim(fgets(STDIN));

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.generasimaju.co.id/api/ironc/verify-otp',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2,
  CURLOPT_COOKIEJAR => 'cookie.txt',
  CURLOPT_COOKIEFILE => 'cookie.txt',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'member_otp_code=' . urlencode($otp_code) . '&member_mobilephone=' . urlencode($member_phone),
  CURLOPT_HTTPHEADER => array(
    'Host: www.generasimaju.co.id',
    'sec-ch-ua-platform: "Android"',
    'x-requested-with: XMLHttpRequest',
    'user-agent: Mozilla/5.0 (Linux; Android 14; M2101K6G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.6834.33 Mobile Safari/537.36',
    'accept: application/json, text/javascript, */*; q=0.01',
    'sec-ch-ua: "Not A(Brand";v="8", "Chromium";v="132", "Android WebView";v="132""',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'sec-ch-ua-mobile: ?1',
    'origin: https://www.generasimaju.co.id',
    'sec-fetch-site: same-origin',
    'sec-fetch-mode: cors',
    'sec-fetch-dest: empty',
    'referer: https://www.generasimaju.co.id/tools/kalkulator-zat-besi/result',
    'accept-language: en,id-ID;q=0.9,id;q=0.8,en-US;q=0.7',
//    'cookie: PHPSESSID=m6ribre3svtcfki227dp36s18n',
    'cookie: ageRangeId=2',
    'cookie: child_id=29786',
    'cookie: question_id=18795',
    'cookie: status_result_ironc_tools=0',
    'cookie: stage_result_ironc_tools=2',
    'cookie: ironcSampling=1',
//    'cookie: AWSALB=9gGu/IYPch8zj+tQDvzZ9D8DlNmcc9iR6CIcuyjlsSk5pbX3JZ8XIVmbUIKpJkseiPbjfkgCtw1TK1rjhC1gVigRbm6JbLVGChOIUQkyDYr6Qzp2iYvJx+voV8P6',
//    'cookie: AWSALBCORS=9gGu/IYPch8zj+tQDvzZ9D8DlNmcc9iR6CIcuyjlsSk5pbX3JZ8XIVmbUIKpJkseiPbjfkgCtw1TK1rjhC1gVigRbm6JbLVGChOIUQkyDYr6Qzp2iYvJx+voV8P6',
    'priority: u=1, i'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "\n" . $err . "\n";
} else {
  $response_data = json_decode($response, true);
  if ($response_data['code'] === '200') {
    echo "Berhasil diverifikasi: " . $response_data['message'] . "\n";
  } else {
    echo "Gagal diverifikasi\n";
//var_dump($response_data);
continue;
//    exit;
  }
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.generasimaju.co.id/api/ironc/store-request-sampling',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2,
  CURLOPT_COOKIEJAR => 'cookie.txt',
  CURLOPT_COOKIEFILE => 'cookie.txt',
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Host: www.generasimaju.co.id',
    'sec-ch-ua-platform: "Android"',
    'x-requested-with: XMLHttpRequest',
    'user-agent: Mozilla/5.0 (Linux; Android 14; M2101K6G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.6834.33 Mobile Safari/537.36',
    'accept: */*',
    'sec-ch-ua: "Not A(Brand";v="8", "Chromium";v="132", "Android WebView";v="132""',
    'sec-ch-ua-mobile: ?1',
    'sec-fetch-site: same-origin',
    'sec-fetch-mode: cors',
    'sec-fetch-dest: empty',
    'referer: https://www.generasimaju.co.id/tools/kalkulator-zat-besi/result',
    'accept-language: en,id-ID;q=0.9,id;q=0.8,en-US;q=0.7',
    'cookie: ageRangeId=2',
    'cookie: child_id=29786',
    'cookie: question_id=18795',
    'cookie: status_result_ironc_tools=0',
    'cookie: stage_result_ironc_tools=2',
    'cookie: ironcSampling=1',
//    'cookie: AWSALB=N1HmMEEY5WjEq8KJBgUKI5hDJPaUf0xAnjyJ8Mh2ho/9H+GeQqp6mb52VAUED5yr6C1CDrGNZTQUS7iU1MhNrSlLKlmJfoA8S9wAUU3qrDCSuv68p6oHaKaT45i/',
//    'cookie: AWSALBCORS=N1HmMEEY5WjEq8KJBgUKI5hDJPaUf0xAnjyJ8Mh2ho/9H+GeQqp6mb52VAUED5yr6C1CDrGNZTQUS7iU1MhNrSlLKlmJfoA8S9wAUU3qrDCSuv68p6oHaKaT45i/',
//    'cookie: PHPSESSID=q460tleri3d39d1mqcmg6r7q2h',
//    'cookie: memberIdKbs=SGM-1615316',
    'priority: u=1, i'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "\n" . $err . "\n";
} else {
$response_data = json_decode($response, true);
  if ($response_data['code'] === '200') {
    $keterangan = $response_data["message"];
  } else {
    echo "Gagal Request Voucher\n";
$keterangan = "Gagal";
var_dump($response_data);
  //  exit;
  }
//  //var_dump($response) . "\n";
//echo "$nomor : ".json_decode($response,true)["message"];
}
$filenames = 'besi.txt';
$files = fopen($filenames, 'a');
fwrite($files, $member_phone."=>".$keterangan . PHP_EOL);
fclose($files);
echo $member_phone."=>".$keterangan;
    }

    fclose($file);
} else {
    echo "File wa.txt tidak ditemukan.\n";
}
?>
