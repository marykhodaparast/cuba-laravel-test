// column chart
var options3 = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: "rounded",
            columnWidth: "55%",
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },
    series: [
        {
            name: "New Users",
            data: [120, 190, 300, 500, 200, 300],
        }
    ],
    xaxis: {
        categories: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June"
        ],
    },
    // yaxis: {
    //     title: {
    //         text: "$ (thousands)",
    //     },
    // },
    fill: {
        opacity: 1,
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return  val ;
            },
        },
    },
    colors: [CubaAdminConfig.primary, CubaAdminConfig.secondary, "#65c15c"],
};

var chart3 = new ApexCharts(document.querySelector("#column-chart"), options3);

chart3.render();
