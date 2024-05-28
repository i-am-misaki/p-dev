
// fetch api
document.addEventListener("DOMContentLoaded", function(){
    const addBtn = document.getElementById('addLearning');
    const backToAdd = document.querySelector('.backToAdd');

    addBtn.addEventListener('click', async (event) => {
        event.preventDefault();
    const studyHour = document.getElementById('studyHour').value;
    const learningName = document.getElementById('learningName').value;
    const section = document.getElementById('section').value;
    const selectedMonth = sessionStorage.getItem('selected_month');
    
    const postData = {
        studyHour: studyHour,
        learningName: learningName,
        section: section,
        selectedMonth: selectedMonth,
    }
    
    const response = await fetch('/skill/store',{
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json',
            // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(postData)

    });

    const res = await response.json();
    if(response.ok){
        if(res.message){
            // setTimeout(showModal(res.message), 10000);
            showModal(res.message);
        } else if(res.error_message){
            let learningError = document.getElementById('errorMessage');
            learningError.textContent = res.error_message;
        } else if(res.e_message){
            alert(res.e_message);
        }
    } else {
        console.log(error);
        alert('追加できませんでした');
    }
    });
    
    // モーダルウィンドウ表示
    function showModal(message){
        // モーダルウィンドウ
        document.getElementById('addForm').reset();
        const modal = document.querySelector('.js-modal');
        const succcessMessage = document.getElementById('succcessMessage');
        succcessMessage.textContent = message;
        modal.classList.add('is-open');
    }
    // モーダルウィンドウ閉じる
    // function closeModal(){
        //     modal.classList.remove('is-open');
        // }
        

    backToAdd.addEventListener('click', clearTimeout(showModal));
});