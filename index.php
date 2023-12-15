<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
    <h1 id="output"></h1>
    <input type="text" id="food">
    <button id="send">計算</button>

    <script>
        $('#send').click(() => {
            var food = $('#food').val();

            // 使用 $.ajax 來發送 GET 請求
            $.ajax({
                url: './food_database.php', // 將 'YOUR_API_ENDPOINT' 替換為你的實際 API 端點
                method: 'POST',
                data: { food: food }, // 傳遞食物參數
                success: function (response) {
                    // 請求成功時的處理
                    console.log(response);
                    $('#output').text(response+'大卡'); // 將 API 回應顯示在 #output 元素中
                },
                error: function (error) {
                    // 請求失敗時的處理
                    console.log('Error:', error);
                    $('#output').text('Error occurred'); // 顯示錯誤訊息
                }
            });
        });
    </script>
</body>
</html>