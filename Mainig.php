<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// $filePath = 'Key_Vip.txt';

// if (!file_exists($filePath)) {
//     echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;91m Bạn cần có cần sử dụng Key Vip để sử dụng chức năng này!\n";
//     echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;91m Nếu muốn mua liên hệ với Admin để mua Key Vip!\n";
//     echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;31m Zalo: \033[1;32m0362166863 \033[1;91m❥\033[1;32m\n";
//     echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Giá Key: \033[1;32m25.000 VNĐ/tháng \033[1;91m❥\033[1;32m\n";
//     sleep(5);
//     exit; // Dừng chương trình nếu file không tồn tại
// } else {
//     echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;32mBạn đang dùng Key Vip. Bạn có thể tiếp tục sử dụng chức năng này.";
// }

function bes4($url) {
    try {
        $response = file_get_contents($url, false, stream_context_create([
            'http' => ['timeout' => 5]
        ]));
        
        if ($response !== false) {
            $doc = new DOMDocument();
            @$doc->loadHTML($response);
            $xpath = new DOMXPath($doc);
            
            $version_tag = $xpath->query("//span[@id='version_keyADB']")->item(0);
            $maintenance_tag = $xpath->query("//span[@id='maintenance_keyADB']")->item(0);
            
            $version = $version_tag ? trim($version_tag->nodeValue) : null;
            $maintenance = $maintenance_tag ? trim($maintenance_tag->nodeValue) : null;
            
            return array($version, $maintenance);
        }
    } catch (Exception $e) {
        return array(null, null);
    }
    return array(null, null);
}


// Hàm hiển thị banner

if (!function_exists('banner')) {
    function banner() {
        system('clear');
        $banner = "
          \033[1;31m ██████╗ ███████╗████████╗████████╗ ██████╗                ██████╗ 
   \033[1;36m    ██╔══██╗██╔════╝╚══    ██╔══╝╚══██╔══╝ ██╔══██╗           ██╔══██╗
   \033[1;32m    ██████╔╝███████╗            ██║  ║            ██             ████╔██  ╝     ██║           ██║
    \033[1;34m   ██╔══██╗╚════██║             ██║              ██║               █╗         ██    ██║          ██║
    \033[1;35m   ██║  ██║███████║                  ██║             ██║              ██║         █         ██║ ╝███ 
    \033[1;31m   ╚═╝  ╚═╝╚══════╝                  ╚═╝             ╚═╝               ╚═╝          ╚═╝╚═════╝ \n
        \033[1;97mTool By: \033[1;32mTDTDEV         \033[1;97mPhiên Bản: \033[1;32m4.0     
        \033[97m════════════════════════════════════════════════  
        \033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Tool\033[1;31m     : \033[1;97m❥ \033[1;31mInstagram\033[1;33m♔ \033[1;97m
        \033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Youtube\033[1;31m  : \033[1;97m❥ \033[1;36mRS-TOOL
        \033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Telegram\033[1;31m : \033[1;97m❥\033[1;32mTdtdev🔫\033[1;97m☜
        \033[97m════════════════════════════════════════════════
        \033[1;97m[\033[1;91m❥\033[1;97m]\033[1;91m Lưu ý\033[1;31m    : \033[1;97m❥ \033[1;32mTool Sử Dụng ALL Thiết Bị\033[1;31m♔ \033[1;97m☜
        \033[97m════════════════════════════════════════════════
        ";
        foreach (str_split($banner) as $X) {
            echo $X;
            usleep(1250);
        }
    }
}


banner();
echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Địa chỉ Ip\033[1;32m  : \033[1;32m❥\033[1;31m♔ \033[1;32m192.168.1.2\033[1;31m♔ \033[1;97m☜\n";
echo "\033[1;97m════════════════════════════════════════════════\n";
// In menu lựa chọn
echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập \033[1;31m1 \033[1;33mđể vào \033[1;34mTool Instagram\033[1;33m\n"; 
echo "\033[1;31m\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mNhập 2 Để Xóa Authorization Hiện Tại'\n";

// Vòng lặp để chọn lựa chọn (Xử lý cả trường hợp chọn sai)
while (true) {
    try {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập Lựa Chọn (1 hoặc 2): ";
        $choose = trim(fgets(STDIN));
        $choose = intval($choose);
        if ($choose != 1 && $choose != 2) {
            echo "\033[1;31m\n❌ Lựa chọn không hợp lệ! Hãy nhập lại.\n";
            continue;
        }
        break;
    } catch (Exception $e) {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mSai định dạng! Vui lòng nhập số.\n";
    }
}

// Xóa Authorization nếu chọn 2
if ($choose == 2) {
    $file = "Authorization.txt";
    if (file_exists($file)) {
        if (unlink($file)) {
            echo "\033[1;32m[✔] Đã xóa $file!\n";
        } else {
            echo "\033[1;31m[✖] Không thể xóa $file!\n";
        }
    } else {
        echo "\033[1;33m[!] File $file không tồn tại!\n";
    }
    echo "\033[1;33m👉 Vui lòng nhập lại thông tin!\n";
}

// Kiểm tra và tạo file nếu chưa có
$file = "Authorization.txt";
if (!file_exists($file)) {
    if (file_put_contents($file, "") === false) {
        echo "\033[1;31m[✖] Không thể tạo file $file!\n";
        exit(1);
    }
}

// Đọc thông tin từ file
$author = "";
if (file_exists($file)) {
    $author = file_get_contents($file);
    if ($author === false) {
        echo "\033[1;31m[✖] Không thể đọc file $file!\n";
        exit(1);
    }
    $author = trim($author);
}

// Yêu cầu nhập lại nếu Authorization trống
while (empty($author)) {
    echo "\033[1;97m════════════════════════════════════════════════\n";
    echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập Authorization: ";
    $author = trim(fgets(STDIN));

    // Ghi vào file
    if (file_put_contents($file, $author) === false) {
        echo "\033[1;31m[✖] Không thể ghi vào file $file!\n";
        exit(1);
    }
}

// Chạy tool
$headers = [
    'Accept-Language' => 'vi,en-US;q=0.9,en;q=0.8',
    'Referer' => 'https://app.golike.net/',
    'Sec-Ch-Ua' => '"Not A(Brand";v="99", "Google Chrome";v="121", "Chromium";v="121"',
    'Sec-Ch-Ua-Mobile' => '?0',
    'Sec-Ch-Ua-Platform' => "Windows",
    'Sec-Fetch-Dest' => 'empty',
    'Sec-Fetch-Mode' => 'cors',
    'Sec-Fetch-Site' => 'same-site',
    'T' => 'VFZSak1FMTZZM3BOZWtFd1RtYzlQUT09',
    'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36',
    "Authorization" => $author,
    'Content-Type' => 'application/json;charset=utf-8'
];

echo "\033[1;97m════════════════════════════════════════════════\n";
echo "\033[1;32m🚀 Đăng nhập thành công! Đang vào Tool Instagram...\n";
sleep(1);

// Hàm chọn tài khoản Instagram
function chonacc() {
    global $headers;
    $json_data = array();
    $response = file_get_contents('https://gateway.golike.net/api/instagram-account', false, stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => buildHeaders($headers),
            'content' => json_encode($json_data)
        ]
    ]));
    return json_decode($response, true);
}

// Hàm nhận nhiệm vụ
function nhannv($account_id) {
    global $headers;
    $params = array(
        'instagram_account_id' => $account_id,
        'data' => 'null'
    );
    $json_data = array();
    $url = 'https://gateway.golike.net/api/advertising/publishers/instagram/jobs?' . http_build_query($params);
    $response = file_get_contents($url, false, stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => buildHeaders($headers),
            'content' => json_encode($json_data)
        ]
    ]));
    return json_decode($response, true);
}

// Hàm hoàn thành nhiệm vụ
// Ẩn tất cả lỗi và cảnh báo PHP
error_reporting(0);
ini_set('display_errors', 0);

function hoanthanh($ads_id, $account_id) {
    global $headers;
    
    $json_data = array(
        'instagram_users_advertising_id' => $ads_id,
        'instagram_account_id' => $account_id,
        'async' => true,
        'data' => null
    );

    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => buildHeaders($headers),
            'content' => json_encode($json_data),
            'ignore_errors' => true // Không hiển thị lỗi của file_get_contents
        ]
    ]);

    $response = @file_get_contents('https://gateway.golike.net/api/advertising/publishers/instagram/complete-jobs', false, $context);

    if ($response === false) {
        return ['error' => 'Không thể kết nối đến server!'];
    }

    // Lấy mã HTTP từ phản hồi
    $http_code = 0;
    if (isset($http_response_header) && preg_match('/HTTP\/\d\.\d\s(\d+)/', $http_response_header[0], $matches)) {
        $http_code = (int)$matches[1];
    }

    // Trả về lỗi nếu mã HTTP không phải 200
    if ($http_code !== 200) {
        return ['error' => "Lỗi HTTP $http_code"];
    }

    return json_decode($response, true);
}

// Hàm báo lỗi
function baoloi($ads_id, $object_id, $account_id, $loai) {
    global $headers;
    
    $json_data1 = array(
        'description' => 'Tôi đã làm Job này rồi',
        'users_advertising_id' => $ads_id,
        'type' => 'ads',
        'provider' => 'instagram',
        'fb_id' => $account_id,
        'error_type' => 6
    );
    $response1 = file_get_contents('https://gateway.golike.net/api/report/send', false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => buildHeaders($headers),
            'content' => json_encode($json_data1)
        ]
    ]));
    
    $json_data = array(
        'ads_id' => $ads_id,
        'object_id' => $object_id,
        'account_id' => $account_id,
        'type' => $loai
    );
    $response = file_get_contents('https://gateway.golike.net/api/advertising/publishers/instagram/skip-jobs', false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => buildHeaders($headers),
            'content' => json_encode($json_data)
        ]
    ]));
    return json_decode($response, true);
}

// Hàm hỗ trợ xây dựng headers
function buildHeaders($headers) {
    $headerString = "";
    foreach ($headers as $key => $value) {
        $headerString .= "$key: $value\r\n";
    }
    return $headerString;
}

function handle_follow_job($cookies, $object_id, $account_id) {
    try {
        // Xử lý token an toàn hơn
        $token = strpos($cookies, 'csrftoken=') !== false ? explode(';', explode('csrftoken=', $cookies)[1])[0] : null;

        $headers = [
            'authority: i.instagram.com',
            'accept: */*',
            'accept-language: vi,en-US;q=0.9,en;q=0.8',
            'content-type: application/x-www-form-urlencoded',
            'cookie: ' . $cookies,
            'origin: https://www.instagram.com',
            'referer: https://www.instagram.com/',
            'sec-ch-ua: "Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-fetch-dest: empty',
            'sec-fetch-mode: cors',
            'sec-fetch-site: same-site',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
            'x-asbd-id: 198387',
            'x-csrftoken: ' . $token,
            'x-ig-app-id: 936619743392459',
            'x-ig-www-claim: hmac.AR1UYU8O8XCMl4jZdv4YxiRUxEIymCA_4stpgFmc092K1Kb2',
            'x-instagram-ajax: 1006309104',
        ];

        while (true) {
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://i.instagram.com/api/v1/web/friendships/$object_id/follow/");
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                
                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                
                $responsefl = json_decode($response, true);
                
                if (isset($responsefl['status']) && $responsefl['status'] == 'ok') {
                    echo "✅ Follow thành công\n";
                    return 1;
                } else {
                    echo "❌ Follow thất bại: " . print_r($responsefl, true) . "\n";
                    return 0;
                }

            } catch (Exception $e) {
                echo "Có lỗi xảy ra: " . $e->getMessage() . " - Thử lại sau 5 giây...\n";
                sleep(5);
            }
        }

    } catch (Exception $e) {
        echo "Lỗi nghiêm trọng: " . $e->getMessage() . "\n";
        return 0;
    }
}
function handle_like_job($cookies, $idlike, $link) {
    try {
        $token = explode(';', explode('csrftoken=', $cookies)[1])[0];
        $headers = [
            'authority: www.instagram.com',
            'accept: */*',
            'accept-language: vi,en-US;q=0.9,en;q=0.8',
            'content-type: application/x-www-form-urlencoded',
            'cookie: ' . $cookies,
            'origin: https://www.instagram.com',
            'referer: ' . $link,
            'sec-ch-ua: "Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-fetch-dest: empty',
            'sec-fetch-mode: cors',
            'sec-fetch-site: same-origin',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
            'x-asbd-id: 198387',
            'x-csrftoken: ' . $token,
        ];

        // Gửi request like
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/web/likes/$idlike/like/");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Kiểm tra kết quả
        echo "Status Code: $httpCode\n";
        echo "Response: $response\n";
        
        if ($httpCode == 200) {
            if (strpos($response, 'status":"ok') !== false) {
                echo "✅ Like thành công\n";
                return true;
            } else {
                echo "FAIL ❌: $response\n";
                return false;
            }
        } elseif ($httpCode == 400 && strpos($response, 'Sorry, this photo has been deleted') !== false) {
            echo "PHOTO HAS BEEN DELETED ❌\n";
            return false;
        } else {
            echo "ERROR ❌: Status Code $httpCode\n";
            return false;
        }

    } catch (Exception $e) {
        echo "CÓ LỖI XẢY RA!!!: " . $e->getMessage() . "\n";
        return false;
    }
}

// Lấy danh sách tài khoản Instagram
$chontk_Instagram = chonacc();

// Hiển thị danh sách tài khoản
function dsacc() {
    global $chontk_Instagram;
    while (true) {
        try {
            if ($chontk_Instagram["status"] != 200) {
                echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mAuthorization hoặc T sai hãy nhập lại!!!\n";
                echo "\033[1;97m════════════════════════════════════════════════\n";
                exit();
            }
            banner();
            echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Địa chỉ Ip\033[1;32m  : \033[1;32m❥\033[1;31m♔ \033[1;32m83.86.8888\033[1;31m♔ \033[1;97m☜\n";
            echo "\033[1;97m════════════════════════════════════════════════\n";
            echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;33m Danh sách acc Instagram : \n";
            echo "\033[1;97m════════════════════════════════════════════════\n";
            for ($i = 0; $i < count($chontk_Instagram["data"]); $i++) {
                echo "\033[1;36m[".($i + 1)."] \033[1;36m✈ \033[1;97mID\033[1;32m㊪ :\033[1;93m ".$chontk_Instagram["data"][$i]["instagram_username"]." \033[1;97m|\033[1;31m㊪ :\033[1;32m Hoạt Động\n";
            }
            echo "\033[1;97m════════════════════════════════════════════════\n";
            break;
        } catch (Exception $e) {
            echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32m".json_encode($chontk_Instagram)."\n";
            sleep(10);
        }
    }
}

// Hiển thị danh sách tài khoản
dsacc();

// Chọn tài khoản Instagram
$d = 0;
while (true) {
    echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập \033[1;31mID Acc Instagram \033[1;32mlàm việc: ";
    $idacc = trim(fgets(STDIN));
    for ($i = 0; $i < count($chontk_Instagram["data"]); $i++) {
        if ($chontk_Instagram["data"][$i]["instagram_username"] == $idacc) {
            $d = 1;
            $account_id = $chontk_Instagram["data"][$i]["id"];
            break;
        }
    }
    if ($d == 0) {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mAcc này chưa được thêm vào golike or id sai\n";
        continue;
    }
    break;
}

// Nhập cookies
banner();
echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Địa chỉ Ip\033[1;32m  : \033[1;32m❥\033[1;31m♔ \033[1;32m83.86.8888\033[1;31m♔ \033[1;97m☜\n";
echo "\033[1;97m════════════════════════════════════════════════\n";
// In menu lựa chọn
// Hiển thị menu
echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập \033[1;31m1 \033[1;33mđể dùng \033[1;34mCookies cũ\033[1;33m\n"; 
echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mNhập 2 Để Xóa Cookies Hiện Tại\n";

// Vòng lặp xử lý lựa chọn
while (true) {
    echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập Lựa Chọn (1 hoặc 2): ";
    $choose = trim(fgets(STDIN));
    if (!is_numeric($choose) || ($choose != 1 && $choose != 2)) {
        echo "\033[1;31m\n❌ Lựa chọn không hợp lệ! Vui lòng nhập 1 hoặc 2.\n";
        continue;
    }
    $choose = intval($choose);
    break;
}

// Xóa cookies nếu chọn 2
if ($choose == 2) {
    $cookies = "Cookies_IG.txt";
    if (file_exists($cookies)) {
        if (unlink($cookies)) {
            echo "\033[1;32m[✔] Đã xóa $cookies!\n";
        } else {
            $error = error_get_last();
            echo "\033[1;31m[✖] Không thể xóa $cookies! Lý do: " . $error['message'] . "\n";
        }
    } else {
        echo "\033[1;33m[!] File $cookies không tồn tại!\n";
    }
    echo "\033[1;33m👉 Vui lòng nhập lại thông tin!\n";
}

// Kiểm tra và tạo file
$file = "cookies_IG.txt";
if (!file_exists($file)) {
    if (!is_writable(dirname($file))) {
        echo "\033[1;31m[✖] Không có quyền ghi vào thư mục chứa $file!\n";
        exit(1);
    }
    if (file_put_contents($file, "") === false) {
        $error = error_get_last();
        echo "\033[1;31m[✖] Không thể tạo file $file! Lý do: " . $error['message'] . "\n";
        exit(1);
    }
}

// Đọc thông tin từ file
$cookies = "";
if (file_exists($file)) {
    $cookies = file_get_contents($file);
    if ($cookies === false) {
        $error = error_get_last();
        echo "\033[1;31m[✖] Không thể đọc file $file! Lý do: " . $error['message'] . "\n";
        exit(1);
    }
    $cookies = trim($cookies);
}

// Yêu cầu nhập lại nếu cookies trống
while (empty($cookies)) {
    echo "\033[1;97m════════════════════════════════════════════════\n";
    echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập Cookies (hoặc 'exit' để thoát): ";
    $cookies = trim(fgets(STDIN));
    if (strtolower($cookies) === 'exit') {
        echo "\033[1;33m[!] Đã thoát chương trình.\n";
        exit(0);
    }
    if (!is_writable(dirname($file))) {
        echo "\033[1;31m[✖] Không có quyền ghi vào thư mục chứa $file!\n";
        exit(1);
    }
    if (file_put_contents($file, $cookies) === false) {
        $error = error_get_last();
        echo "\033[1;31m[✖] Không thể ghi vào file $file! Lý do: " . $error['message'] . "\n";
        exit(1);
    }
}
// Nhập thời gian làm job
while (true) {
    try {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập thời gian làm job : ";
        $delay = intval(trim(fgets(STDIN)));
        break;
    } catch (Exception $e) {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mSai định dạng!!!\n";
    }
}

// Nhận tiền lần 2 nếu lần 1 fail
while (true) {
    try {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhận tiền lần 2 nếu lần 1 fail? (y/n): ";
        $lannhan = trim(fgets(STDIN));
        if ($lannhan != "y" && $lannhan != "n") {
            echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mNhập sai hãy nhập lại!!!\n";
            continue;
        }
        break;
    } catch (Exception $e) {
        // Bỏ qua
    }
}

// Nhập số job fail để đổi acc Instagram
while (true) {
    try {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mSố job fail để đổi acc Instagram (nhập 1 nếu k muốn dừng) : ";
        $doiacc = intval(trim(fgets(STDIN)));
        break;
    } catch (Exception $e) {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mNhập vào 1 số!!!\n";
    }
}

// Chọn chế độ làm việc
while (true) {
    try {
        echo "\033[1;97m════════════════════════════════════════════════\n";
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập 1 : \033[1;33mChỉ nhận nhiệm vụ Follow\n";
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập 2 : \033[1;33mChỉ nhận nhiệm vụ like\n";
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mNhập 12 : \033[1;33mKết hợp cả Like và Follow\n";
        echo "\033[1;97m════════════════════════════════════════════════\n";
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;34mChọn lựa chọn: ";
        $chedo = intval(trim(fgets(STDIN)));
        
        if ($chedo == 1 || $chedo == 2 || $chedo == 12) {
            break;
        } else {
            echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mChỉ được nhập 1, 2 hoặc 12!\n";
        }
    } catch (Exception $e) {
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mNhập vào 1 số!!!\n";
    }
}

// Xác định loại nhiệm vụ
$lam = array();
if ($chedo == 1) {
    $lam = array("follow");
} elseif ($chedo == 2) {
    $lam = array("like");
} elseif ($chedo == 12) {
    $lam = array("follow", "like");
}

// Bắt đầu làm nhiệm vụ
$dem = 0;
$tong = 0;
$checkdoiacc = 0;
$checkdoiacc1 = 0;
$dsaccloi = array();
$accloi = "";
banner();
echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Địa chỉ Ip\033[1;32m  : \033[1;32m❥\033[1;31m♔ \033[1;32m83.86.8888\033[1;31m♔ \033[1;97m☜\n";
echo "\033[1;97m════════════════════════════════════════════════\n";
echo "\033[1;36m|STT\033[1;97m| \033[1;33mThời gian ┊ \033[1;32mStatus | \033[1;31mType Job | \033[1;32mID Acc | \033[1;32mXu |\033[1;33m Tổng\n";
echo "\033[1;97m════════════════════════════════════════════════\n";
while (true) {
    if ($checkdoiacc == $doiacc) {
        dsacc();
        $idacc = readline("\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mJob fail đã đạt giới hạn nên nhập id acc khác để đổi: ");
        sleep(2);
        banner();
        echo "\033[1;97m[\033[1;91m❥\033[1;97m]\033[1;97m Địa chỉ Ip\033[1;32m  : \033[1;32m❥\033[1;31m♔ \033[1;32m83.86.8888\033[1;31m♔ \033[1;97m☜\n";
        echo "\033[1;97m════════════════════════════════════════════════\n";
        $d = 0;
        for ($i = 0; $i < count($chontk_Instagram["data"]); $i++) {
            if ($chontk_Instagram["data"][$i]["instagram_username"] == $idacc) {
                $d = 1;
                $account_id = $chontk_Instagram["data"][$i]["id"];
                break;
            }
        }
        if ($d == 0) {
            echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;31mAcc chưa thêm vào Golike hoặc ID không đúng!\n";
            continue;
        }
        $checkdoiacc = 0;
    }

    echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;35mĐang Tìm Nhiệm vụ:>        \r";
    while (true) {
        try {
            $nhanjob = nhannv($account_id);
            break;
        } catch (Exception $e) {
            // pass
        }
    }

    if (isset($nhanjob["status"]) && $nhanjob["status"] == 200) {
        $ads_id = $nhanjob["data"]["id"];
        $link = $nhanjob["data"]["link"];
        $object_id = $nhanjob["data"]["object_id"];
        $loai = $nhanjob["data"]["type"];
        // $media_id = $nhanjob["data"]["object_data"]["pk"];
        // echo $media_id;

        if (!in_array($nhanjob["data"]["type"], $lam)) {
            try {
                baoloi($ads_id, $object_id, $account_id, $nhanjob["data"]["type"]);
                echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mĐã bỏ qua job {$loai}!        \r";
                sleep(1);
                continue;
            } catch (Exception $e) {
                // pass
            }
        }

        $success = false;
        if ($loai == "follow") {
            $success = handle_follow_job($cookies, $object_id, $account_id);
        } elseif ($loai == "like") {
            $media_id = $nhanjob["data"]["object_data"]["pk"];

            $success = handle_like_job($cookies, $media_id, $link);
        }
        
        for ($remaining_time = $delay; $remaining_time >= 0; $remaining_time--) {
            $colors = array(
                "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;37mH\033[1;36mu\033[1;35mo\033[1;32mn\033[1;31mg \033[1;34mD\033[1;33me\033[1;36mv\033[1;36m❥ - Tool\033[1;36m Vip \033[1;31m\033[1;32m",
                "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;34mT\033[1;31mR\033[1;37mO\033[1;36mn\033[1;32mg \033[1;35mD\033[1;37me\033[1;33mv\033[1;32m❥ - Tool\033[1;34m Vip \033[1;31m\033[1;32m",
                "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mT\033[1;37mR\033[1;36mO\033[1;33mn\033[1;35mg \033[1;32mD\033[1;34me\033[1;35mv\033[1;37m❥ - Tool\033[1;33m Vip \033[1;31m\033[1;32m",
                "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;32mT\033[1;33mR\033[1;34mO\033[1;35mn\033[1;36mg \033[1;37mD\033[1;36me\033[1;31mv\033[1;34m❥ - Tool\033[1;31m Vip \033[1;31m\033[1;32m",
                "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;37mT\033[1;34mR\033[1;35mO\033[1;36mn\033[1;32mg \033[1;33mD\033[1;31me\033[1;37mv\033[1;34m❥ - Tool\033[1;37m Vip \033[1;31m\033[1;32m",
                "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;34mT\033[1;33mR\033[1;37mO\033[1;35mn\033[1;31mg \033[1;36mD\033[1;36me\033[1;32mv\033[1;37m❥ - Tool\033[1;36m Vip \033[1;31m\033[1;32m",
                "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;36mT\033[1;35mR\033[1;31mO\033[1;34mn\033[1;37mg \033[1;35mD\033[1;32me\033[1;36mv\033[1;33m❥ - Tool\033[1;33m Vip \033[1;31m\033[1;32m",
            );
            foreach ($colors as $color) {
                echo "\r{$color}|{$remaining_time}| \033[1;31m";
                usleep(120000);
            }
        }

        echo "\r                          \r";
        echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;35mĐang Nhận Tiền Lần 1:>        \r";
        while (true) {
            try {
                $nhantien = hoanthanh($ads_id, $account_id);
                break;
            } catch (Exception $e) {
                // pass
            }
        }

        if ($lannhan == "y") {
            $checklan = 1;
        } else {
            $checklan = 2;
        }

        $ok = 0;
        while ($checklan <= 2) {
            if (isset($nhantien["status"]) && $nhantien["status"] == 200) {
                $ok = 1;
                $dem++;
                $tien = $nhantien["data"]["prices"];
                $tong += $tien;
                $local_time = getdate();
                $hour = $local_time["hours"];
                $minute = $local_time["minutes"];
                $second = $local_time["seconds"];
                $h = $hour;
                $m = $minute;
                $s = $second;
                if ($hour < 10) {
                    $h = "0" . $hour;
                }
                if ($minute < 10) {
                    $m = "0" . $minute;
                }
                if ($second < 10) {
                    $s = "0" . $second;
                }
                echo "                                                    \r";
                $chuoi = ("\033[1;31m| \033[1;36m{$dem}\033[1;31m\033[1;97m | " .
                            "\033[1;33m{$h}:{$m}:{$s}\033[1;31m\033[1;97m | " .
                            "\033[1;32msuccess\033[1;31m\033[1;97m | " .
                            "\033[1;31m{$nhantien['data']['type']}\033[1;31m\033[1;32m\033[1;32m\033[1;97m |" .
                            "\033[1;32m Ẩn ID\033[1;97m |\033[1;97m \033[1;32m+{$tien} \033[1;97m| " .
                            "\033[1;33m{$tong}");
                echo $chuoi . "\n";
                $checkdoiacc = 0;
                break;
            } else {
                $checklan++;
                if ($checklan == 3) {
                    break;
                }
                echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;35mĐang Nhận Tiền Lần 2:>        \r";
                $nhantien = hoanthanh($ads_id, $account_id);
            }
        }

        if ($ok != 1) {
            while (true) {
                try {
                    baoloi($ads_id, $object_id, $account_id, $nhanjob["data"]["type"]);
                    echo "\033[1;97m[\033[1;91m❥\033[1;97m] \033[1;36m✈ \033[1;31mĐã bỏ qua job:>        \r";
                    sleep(1);
                    $checkdoiacc++;
                    break;
                } catch (Exception $e) {
                    $qua = 0;
                    // pass
                }
            }
        }

    } else {
        sleep(10);
    }
}

?>

