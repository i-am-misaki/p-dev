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

    data.forEach(skills => {
        let study_name1 = document.getElementById('study_name1');
        let study_name2 = document.getElementById('study_name2');
        let study_name3 = document.getElementById('study_name3');
        let study_hour1 = document.getElementById('study_hour1');
        let study_hour2 = document.getElementById('study_hour2');
        let study_hour3 = document.getElementById('study_hour3');
        let table1 = document.getElementById('table1');
        let table2 = document.getElementById('table2');
        let table3 = document.getElementById('table3');
        let tr = document.getElementById('tr');

        if (skills.category_id === 1){
            table1.appendChild(tr);
            study_name1.textContent = `${skills.name}`;
            study_hour1.value = `${skills.studyhour}`;
        } else if(skills.category_id === 2){
            table2.appendChild(tr);
            study_name2.textContent = `${skills.name}`;
            study_hour2.value = `${skills.studyhour}`;
        } else if(skills.category_id === 3){
            table3.appendChild(tr);
            study_name3.textContent = `${skills.name}`;
            study_hour3.value = `${skills.studyhour}`;
        }
    });
}