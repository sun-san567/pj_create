<?php
// レスポンスヘッダーの設定
header('Content-Type: application/json');

try {
    // POSTデータをJSONとして受け取る
    $postData = json_decode(file_get_contents('php://input'), true);

    // データベース接続設定
    $dbn = 'mysql:dbname=pj_data;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // データベース接続
    $pdo = new PDO($dbn, $user, $pwd);

    // SQL実行
    $sql = "INSERT INTO pj_data_detail (
    client_name, 
    project_name, 
    deadline, 
    proposal_amount, 
    created_at, 
    updated_at
) VALUES (
    :client_name, 
    :project_name, 
    :deadline, 
    :proposal_amount, 
    NOW(), 
    NOW()
)";

    $stmt = $pdo->prepare($sql);

    // パラメータバインド
    $stmt->bindValue(':client_name', $postData['client_name'], PDO::PARAM_STR);
    $stmt->bindValue(':project_name', $postData['project_name'], PDO::PARAM_STR);
    $stmt->bindValue(':deadline', $postData['deadline'], PDO::PARAM_STR);
    $stmt->bindValue(':proposal_amount', $postData['proposal_amount'], PDO::PARAM_STR); // decimalはSTRとして扱う

    // レスポンスの返却
    echo json_encode([
        "success" => $status,
        "message" => $status ? "登録成功" : "登録失敗"
    ]);
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
