function plot(id,heading,x_data,y_data){
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: x_data,
            datasets: [{
                label: heading,
                data: y_data,
                borderColor:'red',
                pointBorderColor:'blue',
                borderWidth: 2,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}
