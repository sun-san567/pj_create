<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>建設DX</title>
    <link rel="stylesheet" href="./css/request.css">
</head>

<body>
    <button id="showFormButton">新規案件登録</button>
    <!-- モーダルウィンドウ -->
    <div id="modalOverlay" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <h2>新規案件登録</h2>
            <form id="projectForm">
                <div class="form-group">
                    <label for="client_name">クライアント名:</label>
                    <input type="text" id="client_name" name="client_name" required>
                </div>
                <div class="form-group">
                    <label for="project_name">プロジェクト名:</label>
                    <input type="text" id="project_name" name="project_name" required>
                </div>
                <div class="form-group">
                    <label for="deadline">見積期限:</label>
                    <input type="date" id="deadline" name="deadline" required>
                </div>
                <div class="form-group">
                    <label for="proposal_amount">提案金額:</label>
                    <input type="number" id="proposal_amount" name="proposal_amount" required>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i>
                        保存
                    </button>
                    <button type="button" id="cancelButton" class="btn-cancel">
                        <i class="fas fa-times"></i>
                        キャンセル
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/request.js"></script>
</body>

</html>