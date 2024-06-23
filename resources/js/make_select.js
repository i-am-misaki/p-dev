document.addEventListener("DOMContentLoaded", function(){
    let selectTag = document.getElementById('tsuki');

    let today = new Date();
    let current_year = today.getFullYear();
    let current_month = today.getMonth()+1;
    let current_ym = current_year + '-0' + current_month;

    let selected_month = current_ym;
    // sessionStorage.setItem('selected_month', selected_month);

    // let current_ym = today.toLocaleDateString("ja-JP", {year: "numeric", month: one_month}).replaceAll('/', '-');

    // セレクトボックス作成
    for( let i = 0; i <= 2; i++){
        let one_ym = current_year + '-' +(current_month - i).toString().padStart(2, '0');
        let option = document.createElement('option');
        let optionText = document.createTextNode((current_month - i) + "月");
        option.setAttribute("value", one_ym);
        option.appendChild(optionText);
        selectTag.appendChild(option);
        // sessionStorage.setItem('selected_month', selected_month);
        }


    if(window.skills){
        displayData(window.skills, selected_month);
    }
    // let currentSkills = window.currentSkills;

    // 月の選択
    selectTag.addEventListener("change", function(){
        let selected_month = selectTag.value;
        // 選択された月をセッションに保存
        sessionStorage.setItem('selected_month', selected_month);
        // console.log('setstorage' + selected_month);
        show_month_data(selected_month);
        });

        // カテゴリ別遷移
        function handleAddition(event, href){
            event.preventDefault();
            window.location.href = href;
        }

    document.getElementById('addition1').addEventListener("click", function(event){
        handleAddition(event, this.href);
    })
    document.getElementById('addition2').addEventListener("click", function(event){
        handleAddition(event, this.href);
    })
    document.getElementById('addition3').addEventListener("click", function(event){
        handleAddition(event, this.href);
    })
});



// learning_dataの表示
function show_month_data(selected_month){

    // 非同期処理行う
    let xhr = new XMLHttpRequest();
    // リクエストを初期化
    xhr.open('GET', '/skill/top-select?tsuki=' + selected_month, true);
    // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.setRequestHeader("Content-Type", "application/json");
    // xhr.responseType = 'json';
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            let skilldatas = JSON.parse(xhr.responseText);
            displayData(skilldatas, selected_month);
        } else {
            console.log("error" + xhr.status);
        }
    };
    // リクエストを送信
    xhr.send();
}


// selected_monthのlearning_data一覧表示
function displayData(skilldatas, selected_month){
    ['table1', 'table2', 'table3'].forEach(tableId => {
        let table = document.getElementById(tableId);
        // 見出し以外は削除
        while (table.rows.length > 1) {
            table.deleteRow(1);
        }
    });

    skilldatas.forEach(skills => {
        let tr = document.createElement('tr');
        tr.classList.add('border', 'shadow-sm', 'shadow-slate-300');
        // 項目名
        let td1 = document.createElement('td');
        td1.classList.add('w-60', 'h-12', 'pl-4', 'pr-10'); // , 'py-4'
        let div1 = document.createElement('div');
        div1.classList.add('w-full');
        let h4 = document.createElement('h4');
        h4.classList.add('text-middle', 'w-48', 'font-Roboto', 'font-normal', 'text-sm', 'break-all'); //'w-10', 'tracking-widest',
        // 学習時間
        let td2 = document.createElement('td');
        td2.classList.add('w-60', 'h-16', 'p-4');
        let div2 = document.createElement('div')
        div2.classList.add('w-40', 'h-10', 'gap-2.5');
        let input = document.createElement('input');
        input.classList.add('opacity-100', 'w-40', 'h-10', 'rounded');
        // 保存
        let formSave = document.createElement('form');
        let td3 = document.createElement('td');
        td3.classList.add('p-4');
        let saveBtn = document.createElement('button');
        saveBtn.classList.add('saveBtn');
        saveBtn.id = `saveBtn-${skills.id}`;
        saveBtn.dataset.id = skills.id;
        saveBtn.textContent = '学習時間を保存する';
        // 学習時間変更イベントリスナー
        saveBtn.addEventListener('click', function(event){
            event.preventDefault();
            // selected_month = sessionStorage.getItem('selected_month');
            // console.log("call savestudyhour");
            // console.log(selected_month);
            SaveStudyHour(skills.id, input, selected_month);
        });
        // 削除
        let formDelete = document.createElement('form');
        let td4 = document.createElement('td');
        td4.id = 'td4';
        let deleteBtn = document.createElement('button');
        deleteBtn.classList.add('deleteBtn');
        deleteBtn.id = `deleteBtn-${skills.id}`;
        deleteBtn.dataset.id = skills.id;
        deleteBtn.textContent = '削除する';
        // learning_data削除イベントリスナー
        deleteBtn.addEventListener('click', function(event){
            event.preventDefault();
            // selected_month = sessionStorage.getItem('selected_month');

            DeleteLearningData(skills.id, selected_month);
        });

        h4.textContent = skills.name;
        input.value = skills.studyhour;
        input.type = 'number';
        input.min = 1;


        let table1 = document.getElementById('table1');
        let table2 = document.getElementById('table2');
        let table3 = document.getElementById('table3');

        if (skills.category_id === 1){
            table1.appendChild(tr);
            // 項目名
            tr.appendChild(td1);
            td1.appendChild(div1);
            div1.appendChild(h4);
            // 学習時間
            tr.appendChild(td2);
            td2.appendChild(div2);
            div2.appendChild(input);
            // 保存
            tr.appendChild(td3);
            td3.appendChild(formSave);
            formSave.appendChild(saveBtn);
            // 削除
            tr.appendChild(td4);
            td4.appendChild(formDelete);
            formDelete.appendChild(deleteBtn);
        } else if(skills.category_id === 2){
            table2.appendChild(tr);
            // 項目名
            tr.appendChild(td1);
            td1.appendChild(div1);
            div1.appendChild(h4);
            // 学習時間
            tr.appendChild(td2);
            td2.appendChild(div2);
            div2.appendChild(input);
            // 保存
            tr.appendChild(td3);
            td3.appendChild(formSave);
            formSave.appendChild(saveBtn);
            // 削除
            tr.appendChild(td4);
            td4.appendChild(formDelete);
            formDelete.appendChild(deleteBtn);
        } else if(skills.category_id === 3){
            table3.appendChild(tr);
            // 項目名
            tr.appendChild(td1);
            td1.appendChild(div1);
            div1.appendChild(h4);
            // 学習時間
            tr.appendChild(td2);
            td2.appendChild(div2);
            div2.appendChild(input);
            // 保存
            tr.appendChild(td3);
            td3.appendChild(formSave);
            formSave.appendChild(saveBtn);
            // 削除
            tr.appendChild(td4);
            td4.appendChild(formDelete);
            formDelete.appendChild(deleteBtn);
        }
    });
}


// 学習時間変更
function SaveStudyHour(skillId, input, selected_month){
    // console.log("function savestudyhour");
    // console.log(selected_month);
    const studyHour = input.value;

    if(studyHour < 1){
        // saveBtn.disable = true
        // errorMessage_studyHour.textContent = '学習時間は0以上の数字で入力してください';
        alert('学習時間は0以上の数字で入力してください')
    } else {
        const postData = {
            learningId: skillId,
            studyHour: studyHour
        };
        // console.log(postData);

        fetch('/skill/edit',{
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
                // console.log("call showmodal");
                // console.log(selected_month);
                showModal(res.success_message, selected_month);
            }
            if(res.error_message){
                alert(res.error_message);
            }
        })

        .catch (error => {
            console.log('Fetch error:', error);
            alert(error);
        });

    }

};


// learning_data削除
function DeleteLearningData(skillsId, selected_month){

    const postData = {
        learningId: skillsId
    }

    fetch('/skill/destroy',{
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
            // console.log(selected_month);
            showModal(res.success_message, selected_month);
        }
        if(res.error_message){
            alert(res.error_message);
        }
    })

    .catch (error => {
        console.log('Fetch error:', error);
        alert(error);
    });
};


// モーダルウィンドウ表示
function showModal(message, selected_month){
    // console.log("showmodal");
    // console.log(selected_month);
    const modal = document.querySelector('.js-modal');
    const succcessMessage = document.getElementById('succcessMessage');
    modal.classList.add('is-open');
    succcessMessage.textContent = message;
    const backtoAdd = document.getElementById('backToAdd');
    backtoAdd.addEventListener('click', function(){
        selected_month = sessionStorage.getItem('selected_month');
        // console.log("after sessionstorage");
        // console.log(selected_month);
        show_month_data(selected_month);
        modal.classList.remove('is-open');
    })
}