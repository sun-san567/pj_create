
const showFormButton = document.getElementById('showFormButton'); // 案件登録
const cancelButton = document.getElementById('cancelButton'); //キャンセル
const modalOverlay = document.getElementById('modalOverlay'); //モーダル
const projectForm = document.getElementById('projectForm'); // 送信
const clientNameInput = document.getElementById('client_name'); // 顧客名
const projectNameInput = document.getElementById('project_name'); //案件名
const deadlineInput = document.getElementById('deadline'); // 期限
const proposalAmountInput = document.getElementById('proposal_amount'); //提案金額

// 新規案件登録ボタンのクリックイベント
showFormButton.addEventListener('click', function() {
    modalOverlay.style.display = 'flex';
});

// キャンセルボタンのクリックイベント
cancelButton.addEventListener('click', function() {
    modalOverlay.style.display = 'none';
});

// モーダルオーバーレイのクリックイベント
modalOverlay.addEventListener('click', function(e) {
    if (e.target === this) {
        this.style.display = 'none';
    }
});

// フォーム送信イベント
projectForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = {
        client_name: clientNameInput.value,
        project_name: projectNameInput.value,
        deadline: deadlineInput.value + ' 00:00:00', // datetime形式に変換
        proposal_amount: Number(proposalAmountInput.value), // decimal型に変換
        created_at: new Date().toISOString().slice(0, 19).replace('T', ' '),
        updated_at: new Date().toISOString().slice(0, 19).replace('T', ' ')
    };

    fetch('save_project.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // 成功時の処理
            modalOverlay.style.display = 'none';
            projectForm.reset();
            alert('登録が完了しました');
        } else {
            // 失敗時の処理
            alert('登録に失敗しました: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('エラーが発生しました');
    });
});