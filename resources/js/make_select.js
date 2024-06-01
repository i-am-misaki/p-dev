document.addEventListener("DOMContentLoaded", function(){
    let selectTag = document.getElementById('tsuki');
    
    // セレクトボックス作成
    let today = new Date();
    let current_year = today.getFullYear();
    let current_month = today.getMonth()+1;
    // let current_ym = current_year + '-0' + current_month;
    
    // let current_ym = today.toLocaleDateString("ja-JP", {year: "numeric", month: one_month}).replaceAll('/', '-');
    
    for( let i = 0; i <= 2; i++){
        let one_ym = current_year + '-' +(current_month - i).toString().padStart(2, '0');
        let option = document.createElement('option');
        let optionText = document.createTextNode((current_month - i) + "月");
        option.setAttribute("value", one_ym);
        option.appendChild(optionText);
        selectTag.appendChild(option);
    }

    if(window.skills){
        displayData(window.skills);
        console.log(skills);
    }
    // let currentSkills = window.currentSkills;
    // displayData(currentSkills);

    selectTag.addEventListener("change", function(){
        let selected_month = selectTag.value;
        show_month_data(selected_month);
    });

    function handleAddition(event, href){
        event.preventDefault();
        // 選択された月をセッションに保存
        let selected_month = selectTag.value;
        sessionStorage.setItem('selected_month', selected_month);

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
            let data = JSON.parse(xhr.responseText); 
            console.log(data);
            displayData(data);
        } else {
            console.log("error" + xhr.status);
        }
    };
    // リクエストを送信
    xhr.send();
}

function displayData(data){

    ['table1', 'table2', 'table3'].forEach(tableId => {
        let table = document.getElementById(tableId);
        // 見出し以外は削除
        while (table.rows.length > 1) {
            table.deleteRow(1);
        }
    });

    data.forEach(skills => {
        let tr = document.createElement('tr');
        tr.classList.add('border', 'shadow-sm', 'shadow-slate-300');
        // 項目名
        let td1 = document.createElement('td');
        td1.classList.add('w-60', 'h-12', 'py-4', 'pl-4', 'pr-10');
        let div1 = document.createElement('div');
        div1.classList.add('w-full', 'h-5');
        let h4 = document.createElement('h4');
        h4.classList.add('h-5', 'w-10', 'tracking-widest', 'font-Roboto', 'font-normal', 'text-sm');
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
        saveBtn.id = 'saveBtn';
        // saveBtn.classList.add('h-8', 'w-40', 'py-2', 'px-4', 'flex', 'items-center', 'justify-center', 'border',  'border-cyan-700', 'bg-white', 'text-cyan-900', 'text-sm', 'rounded')
        saveBtn.textContent = '学習時間を保存する';
        // 削除
        let formDelete = document.createElement('form');
        let td4 = document.createElement('td');
        td4.id = 'td4';
        let deleteBtn = document.createElement('button');
        deleteBtn.id = 'deleteBtn';
        // deleteBtn.classList.add('h-8', 'py-2', 'px-4', 'text-white', 'bg-rose-400', 'flex', 'items-center', 'justify-center', 'text-sm', 'rounded');
        deleteBtn.textContent = '削除する';

        h4.textContent = skills.name;
        input.value = skills.studyhour;
        input.type = 'number';

       
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