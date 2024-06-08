document.addEventListener("DOMContentLoaded", function(){

    if(window.skills){
        showChart(window.skills);
    }

    function showChart(skills){
        
        // 間近三か月で絞る
        const date = new Date();
        const year = date.getFullYear();
        const month = date.getMonth();
        const currentMonth = year + "-0" + (month + 1);
        const oneMonthAgo = year + "-0" + month;
        const twoMonthAgo = year + "-0" + (month - 1);

        // studyhourの合計値
        let backendData_currentMonth_total = 0;
        let backendData_oneMonthAgo_total = 0;
        let backendData_twoMonthAgo_total = 0;
        let frontendData_currentMonth_total = 0;
        let frontendData_oneMonthAgo_total = 0;
        let frontendData_twoMonthAgo_total = 0;
        let infraData_currentMonth_total = 0;
        let infraData_oneMonthAgo_total = 0;
        let infraData_twoMonthAgo_total = 0;

        
        for(let skill in skills){
            // 間近3か月のバックエンドのデータ
            if(skills[skill]['month'] == currentMonth && skills[skill]['category_id'] == 1){
                backendData_currentMonth_total += skills[skill]['studyhour'];
            } else if(skills[skill]['month'] == oneMonthAgo && skills[skill]['category_id'] == 1){
                backendData_oneMonthAgo_total += skills[skill]['studyhour'];
            } else if(skills[skill]['month'] == twoMonthAgo && skills[skill]['category_id'] == 1){
                backendData_twoMonthAgo_total += skills[skill]['studyhour'];
            }
            // 間近3か月のフロントエンドのデータ
            if(skills[skill]['month'] == currentMonth && skills[skill]['category_id'] == 2){
                // frontendData_currentMonth.push(skills[skill]['studyhour']);
                // frontendData_currentMonth_total = frontendData_currentMonth.reduce((sum, num) => sum + num, 0);
                frontendData_currentMonth_total += skills[skill]['studyhour'];
            } else if(skills[skill]['month'] == oneMonthAgo && skills[skill]['category_id'] == 2){
                frontendData_oneMonthAgo_total += skills[skill]['studyhour'];
            } else if(skills[skill]['month'] == twoMonthAgo && skills[skill]['category_id'] == 2){
                frontendData_twoMonthAgo_total += skills[skill]['studyhour'];
            }
            // 間近3か月のインフラのデータ
            if(skills[skill]['month'] == currentMonth && skills[skill]['category_id'] == 3){
                infraData_currentMonth_total += skills[skill]['studyhour'];
            } else if(skills[skill]['month'] == oneMonthAgo && skills[skill]['category_id'] == 3){
                infraData_oneMonthAgo_total += skills[skill]['studyhour'];
            } else if(skills[skill]['month'] == twoMonthAgo && skills[skill]['category_id'] == 3){
                infraData_twoMonthAgo_total += skills[skill]['studyhour'];
                }
        }

        // 各データを格納
        let categoryData = [
            backendData_currentMonth_total,
            backendData_oneMonthAgo_total,
            backendData_twoMonthAgo_total,
            frontendData_currentMonth_total,
            frontendData_oneMonthAgo_total,
            frontendData_twoMonthAgo_total,
            infraData_currentMonth_total,
            infraData_oneMonthAgo_total,
            infraData_twoMonthAgo_total
        ];

        // ｙ軸の最大値
        let max_xAxes = Math.max.apply(null,categoryData);
        
        // console.log(backendData_currentMonth_total);
        // console.log(backendData_oneMonthAgo_total);
        // console.log(backendData_twoMonthAgo_total);
        // console.log(frontendData_currentMonth_total);
        // console.log(frontendData_oneMonthAgo_total);
        // console.log(frontendData_twoMonthAgo_total);
        // console.log(infraData_currentMonth_total);
        // console.log(infraData_oneMonthAgo_total);
        // console.log(infraData_twoMonthAgo_total);

        // chartjs表示データ
        const data = {
            labels: ['先々月', '先月', '今月'],
            datasets: [
                {
                    label: 'バックエンド',
                    data: [backendData_twoMonthAgo_total, backendData_currentMonth_total, backendData_currentMonth_total],
                    borderColor : "rgba(54,164,235,0.8)",
                    backgroundColor : "#ffb6c1",
                },
                {
                    label: 'フロントエンド',
                    data: [frontendData_twoMonthAgo_total, frontendData_oneMonthAgo_total, frontendData_currentMonth_total],
                    borderColor : "rgba(254,97,132,0.8)",
                    backgroundColor : "#f8b862",
                },
                {
                    label: 'インフラ',
                    data: [infraData_twoMonthAgo_total, infraData_oneMonthAgo_total, infraData_currentMonth_total],
                    borderColor : "rgba(254,97,132,0.8)",
                    backgroundColor : "#f5deb3", 
                },
            ]
        }

        
        // chartjs表示オプション
        const ctx = document.getElementById("myChart").getContext('2d');
        const barChart = new Chart(ctx, {
            type: 'bar', // 棒グラフを使用
            data: data,
            options: {
                responsive: true,
                scales: {
                    x: [{
                        beginAtZero: true,
                        display: true,
                        scaleLabel: {
                            display: true,
                            fontColor: "#daa520",
                            fontFamily: 'Roboto',
                            fontSize: 18
                            },
                    }],
                    y: [{
                        beginAtZero: true,
                        display: true,
                        scaleLabel: {
                            display: true,
                            fontColor: "#daa520",
                            fontFamily: 'Roboto',
                            fontSize: 18
                            },
                        ticks: {  //Y軸の最大値・最小値、目盛りの範囲などを設定する
                            suggestedMax: max_xAxes,
                            suggestedMin: 0,
                            stepSize: 10,
                            },
                    }],
                },
                maintainAspectRatio: false, // サイズ変更の際に、元のキャンバスのアスペクト比(width / height)を維持します
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                }
            }
        });
        

        
}
});