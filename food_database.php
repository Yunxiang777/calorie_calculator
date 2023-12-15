
<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 確保 food 參數存在
    if (!empty($_POST['food'])) {
        $food = urlencode($_POST['food']);
        $app_id = 'e65ecd50'; // 將 'YOUR_APP_ID' 替換為你的實際應用程式 ID
        $app_key = 'd786495b8b949c1530b0e260878f9ed8'; // 將 'YOUR_APP_KEY' 替換為你的實際應用程式金鑰

        $request_url = "https://api.edamam.com/api/food-database/v2/parser?app_id={$app_id}&app_key={$app_key}&ingr={$food}&nutrition-type=cooking";

        // 從 API 端點取得數據
        $response = file_get_contents($request_url);
        // 解析 JSON 回應
        $data = json_decode($response, true);
 
        // 將 API 回應送回前端
        // 提取第一個提示 (hint) 的食物數據
            $foodData = $data['hints'][0]['food'];

            // 提取營養信息
            $calories = $foodData['nutrients']['ENERC_KCAL'];


            // 返回 JSON 數據
            echo json_encode($calories);
    } else {
        // 如果 food 參數不存在，返回錯誤訊息
        echo json_encode(['error' => 'Food parameter is missing.']);
    }
} else {
    // 如果不是 POST 請求，返回錯誤訊息
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
