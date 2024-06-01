// const { errorMessages } = require("vue/compiler-sfc");

// fetch api
document.addEventListener("DOMContentLoaded", function(){
    const addBtn = document.getElementById('addLearning');
    const errorMessage_learningName = document.getElementById('errorMessage_learningName');
    const errorMessage_studyHour = document.getElementById('errorMessage_studyHour');

    addBtn.addEventListener('click', async (event) => {
        event.preventDefault();
    const studyHour = document.getElementById('studyHour').value;
    const learningName = document.getElementById('learningName').value;
    const section = document.getElementById('section').value;
    const selectedMonth = sessionStorage.getItem('selected_month');

    const validationError = validateInputs(studyHour, learningName)
        if(validationError.length > 0){
            displayError(validationError);
            return;
        }
    
    const postData = {
        studyHour: studyHour,
        learningName: learningName,
        section: section,
        selectedMonth: selectedMonth,
    }
    // const postData = new FormData;
    // postData.set('section', section);
    // postData.set('selected_month', selectedMonth);
    
    try {
        // const response = await fetch('/skill/store',{
        await fetch('/skill/store',{
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(postData)
        })
        .then(response => response.json())
        .then(res => {
            // console.log(res);
            if(res.success_message){
                showModal(res.success_message);
            }
            if(res.error_message){
                errorMessage_learningName.textContent = res.error_message;
            }
            if(res.e_message){
                alert(res.e_message);
            }
        })
        
            // .then(error_message => {
            //     return console.log(error_message.json());
            // })
            // .then(succsess_message => {
            //     return console.log(succsess_message.json());
            // })
            // .then(e_message => {
            //     return console.log(e_message.json());
            // })
        
    
        // const res = await response.json();
        // if(response.text().ok){
        //     if(res.message){
        //         // setTimeout(showModal(res.message), 10000);
        //         showModal(res.message);
        //     } else if(res.error_message){
        //         let learningError = document.getElementById('errorMessage');
        //         learningError.textContent = res.error_message;
        //     } else if(res.e_message){
        //         alert(res.e_message);
        //     }
        // } else {
        //     console.log(error);
        //     alert('response error :' , error);
        // }
        
        
    } catch (error){
        console.log('Fetch error:', error);
    }
});

// バリデーションのチェック
function validateInputs(studyHour, learningName){
    const errors = []
    if(learningName == ''){
        errors.push({ field: 'learningName', message: '項目名は必ず入力してください'});
        // errorMessage.textContent = '項目名は必ず入力してください';
    }
    if(learningName.length >= 50){
        errors.push({ field: 'learningName', message: '項目名は50文字以内で入力してください'});
        // errorMessage.textContent = '項目名は50文字以内で入力してください';
    }
    if(studyHour == ''){
        errors.push({ field: 'studyHour', message: '学習時間は必ず入力してください'});
        // error_studyhour.textContent = '学習時間は必ず入力してください';
    } else if(studyHour < 1){
        errors.push({ field: 'studyHour', message: '学習時間は0以上の数字で入力してください'});
        // error_studyhour.textContent = '学習時間は0以上の数字で入力してください';
    }
    return errors;
}

// バリデーションメッセージの表示
function displayError(errors){
    console.log(errors);
    errors.forEach(error => {
        if (error.field === 'learningName'){
            errorMessage_learningName.textContent = error.message;
        }
        if (error.field === 'studyHour'){
            errorMessage_studyHour.textContent = error.message;
        }
    });

    // if (!errors.some(error => error.field === 'learningName')) {
    //     errorMessage.style.display = 'none';
    // }
    // if (!errors.some(error => error.field === 'studyHour')) {
    //     error_studyhour.style.display = 'none';
    // }
}
    // モーダルウィンドウ表示
    function showModal(message){
        console.log(message);
        document.getElementById('addForm').reset();
        const modal = document.querySelector('.js-modal');
        const succcessMessage = document.getElementById('succcessMessage');
        modal.classList.add('is-open');
        succcessMessage.textContent = message;
    }
});