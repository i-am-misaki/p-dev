// // モーダルウィンドウ 
// function modal(){
//     console.log('show modal');
//     // const modallog = document.querySelector('.js-modallog');
//     // const backToAddBtn = document.querySelector('.backToAdd');

// const { default: Alpine } = require("alpinejs")

    
    
//     // addLearningBtn.addEventListener('click', () =>{
//     //     modallog.classList.add('openlog');
//     // })
    
//     // backToAddBtn.addEventListener('click', () => {
//     //     modallog.classList.remove('openlog');
//     // })
// }

// --------------------------------------------------------------
// document.addEventListener("DOMContentLoaded", function(){
//     const addBtn = document.getElementById('addLearning');

//     if(addBtn){

//         addBtn.addEventListener("click", function(){
//             // const studyHour = document.getElementById('studyHour').value;
//             // const learningName = document.getElementById('learningName').value;
//             const section = document.getElementById('section').value;
//             const selected_month = sessionStorage.getItem('selected_month');
//             // console.log(selected_month);
//             // error
//         const errorMessage = document.getElementById('errorMessage');
//         // success
//         const succcessMessage = document.getElementById('succcessMessage');
        
        // phpに送信する値をまとめるため、JSON object作成
        // const  data = {
        //     learningName: learningName,
        //     studyHour: studyHour,
        //     categoryName: categoryName,
        //     month: selected_month
        // };
        
        // 非同期処理行う
        // let xhr = new XMLHttpRequest();
        // // リクエストを初期化
        // xhr.open('POST', '/skill/store', false);
        // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        // // xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        // xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        // // xhr.responseType = 'json';
        // xhr.onreadystatechange = function(){
        //     if(xhr.readyState == 4 && xhr.status == 200){
                // モーダルウィンドウ開く処理
//                 const response = JSON.parse(xhr.responseText);
//                 succcessMessage.textContent = response.message;
//                 // modal(message);
//             } else {
//                 errorMessage.textContent = response.message;
//                 errorMessage.style.color = 'red';
//                 //  console.log("error" + xhr.status);
//             }
//         };
//         // リクエストを送信
//         xhr.send(JSON.stringify({
//             section: section,
//             month: selected_month
//         }));
//     });
//     } else {
//         console.error("Element with id 'addLearning' not found.");
//     }
// });

// ------------------------------------------


// // 入力チェック
// function checkInput(){
//     let pattern = '/^[0-]+$/';
//     const studyHour = document.getElementById('studyHour').value;
//     const learningName = document.getElementById('learningName').value; 
//     const error_studyhour = document.getElementById('error_studyhour');
//     const error_learning_data = document.getElementById('error_learning_data'); 

//     if(studyHour == null){
//         error_studyhour.innerHTML = '学習時間は必ず入力してください';
//     }
//     if(pattern.test(studyHour)){
//         error_studyhour.innerHTML = '学習時間は0以上の数字で入力してください';
//     }

//     if(learningName == null){
//         error_learning_data.innerHTML = '項目名は必ず入力してください';
//     }
//     if (learningName.length >= 50) {
//         error_learning_data.innerHTML = '項目名は50文字以内で入力してください';
//     }
// }


// fetch api
// function saveLearning(){
document.addEventListener("DOMContentLoaded", function(){
    const addBtn = document.getElementById('addLearning');
    
    addBtn.addEventListener('click', async () => {
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
        const succcessMessage = document.getElementById('succcessMessage');
        succcessMessage.textContent = res.message;
        // console.log('saved successfully');
    } else {
        console.log(error);
        alert('追加できませんでした');
    }
        
        // .then(data => {
        //         console.log(data);
            
        //     })
            // .then(function (response){
            //     return response.text();
            // }).then(function (datas){
            //     succcessMessage.textContent = res.message;
            // })
            // .catch(error => console.error(error));
            // .catch(error => console.log(data));
        });

});
