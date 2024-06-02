// document.addEventListener("DOMContentLoaded", function(){

    // fetch('/top',{
    //     method: 'GET',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    // })
    
    // .then(response => response.json())
    // .then(res => {
    //     if(res.error_msg){
    //         alert(res.error_msg);
    //     } else {
    //         // showUserData(res.user);
    //         // showChart(res.skills);
    //         // console.log(res.skills);
    //         console.log('ok');
    //     }
    // })
    
    // .catch (error => {
    //     console.log('Fetch error:', error);
    //     alert(error);
    // });


    // function showUserData(users){
        // const userName = document.getElementById('userName');
        // const userImg = document.getElementById('userImg');
        // const userContent = document.getElementById('userContent');

        // console.log(users.name);
        // console.log(users.content);
        // console.log(users.image);
    // }

    // function showChart(skills){
        
        // 間近三か月で絞る
        const currentDate = new Date();
        console.log(currentDate);
        // const months = [
        //     currentDate.toISOString().slice(0, 7),
        //     new Date(currentDate.setMonth(currentDate.getMonth() - 1)).toISOString().slice(0, 7),
        //     new Date(currentDate.setMonth(currentDate.getMonth() - 1)).toISOString().slice(0, 7)
        // ];
        
        // カテゴリ別にデータ格納
        // const categories = {1:[], 2:[], 3:[]};

        // skills.forEach(skill => {
        //     if(months.includes(skill.month)){
        //         if(!categories[skill.category_id]){
        //             categories[skill.category_id] = {'先々月': 0, '先月': 0, '今月': 0};
        //         }
        //         if(skill.month === months[0]){
        //             categories[skill.category_id]['今月'] += skill.studyhour;
        //         } else if(skill.month == months[1]){
        //             categories[skill.category_id]['先月'] += skill.studyhour;
        //         } else if(skill.month === months[2]){
        //             categories[skill.category_id]['先々月'] += skill.studyhour;
        //         }
        //     }
        // });


        // const backendData = [categories[1]['先々月'] || 0, categories[1]['先月'] || 0, categories[1]['今月'] || 0];
        // const frontendData = [categories[2]['先々月'] || 0, categories[2]['先月'] || 0, categories[2]['今月'] || 0];
        // const infraData = [categories[2]['先々月'] || 0, categories[3]['先月'] || 0, categories[4]['今月'] || 0];

        const ctx = document.getElementById("myChart").getContext('2d');
        const barChart = new Chart(ctx, {
            type: 'bar', // 棒グラフを使用
            data: {
            labels: ['先々月', '先月', '今月'],
            datasets: [
                    {
                        label: 'バックエンド',
                        data: ['23', '12', '3', '45'],
                        borderColor : "rgba(54,164,235,0.8)",
                        backgroundColor : "#ffb6c1",
                    },
                    {
                        label: 'フロントエンド',
                        data: ['3', '20', '13', '4'],
                        borderColor : "rgba(254,97,132,0.8)",
                        backgroundColor : "#f8b862",
                    },
                    {
                        label: 'インフラ',
                        data: ['13', '2', '33', '15'],
                        borderColor : "rgba(254,97,132,0.8)",
                        backgroundColor : "#f5deb3",
                    },
                    ],
            },
            options: {
                responsive: true,
                scales: {
                    xAxes: [{
                    stacked: true,
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: '',
                        fontColor: "#daa520",
                        fontFamily: 'Roboto',
                        fontSize: 18
                        },
                    ticks: {
                        //    callback: function(value, index, values){
                        //        return  value +  '代'
                        //      }
                        }
                    }],
                    yAxes: [{
                    stacked: true,
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: '',
                        fontColor: "#daa520",
                        fontFamily: 'Roboto',
                        fontSize: 18
                        },
                    ticks: {  //Y軸の最大値・最小値、目盛りの範囲などを設定する
                        suggestedMax: 100,
                        suggestedMin: 0,
                        stepSize: 10,
                        }
                    }]
                },
                maintainAspectRatio: false,
                title: {
                display: true,
                text: ''
                }
            }
        });
// }
// });