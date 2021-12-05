import { requestContent } from "./request";

// For chart.js
const formatMonth = [
  "Januari",
  "Februai",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "Juli",
  "Agustus",
  "September",
  "Oktober",
  "November",
  "Desember",
];
const labels = [];
const d = new Date();
const time = d.toLocaleDateString({
  timeZone: "Asia/Jakarta",
  hour12: false,
});
let month = parseInt(time.split("/")[0]);

for (let i = 0; i <= month; i++) {
  labels.push(formatMonth[i]);
}

const data = {
  labels: labels,
  datasets: [
    {
      label: "Total",
      backgroundColor: [
        "red",
        "orange",
        "yellow",
        "green",
        "blue",
        "blueviolet",
        "rgba(128, 0, 0, 0.986)",
        "rgba(229, 226, 226, 0.959)",
        "rgba(11, 102, 11, 0.952)",
        "rgba(8, 76, 99, 0.945)",
        "rgba(165, 42, 42, 0.904)",
        "rgba(127, 255, 212, 0.918)",
      ],
      borderColor: [
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
        "rgba(0, 0, 0, 0.2)",
      ],
      borderWidth: 1,
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    },
  ],
};
const config = {
  type: "bar",
  data: data,
  options: {
    plugins: {
      legend: {
        display: false,
      },
      layout: {
        padding: 0,
      },
    },
  },
};

const configPie = {
  type: "pie",
  data: data,
  options: {
    // responsive: true,
    plugins: {
      legend: {
        display: false,
      },
      layout: {
        padding: 0,
      },
    },
  },
};

export async function dashboardChart() {
  const dataVisitor = await requestContent(location.origin + "/api/visitor");
  const date = new Date();
  const visitorChartLine = document.getElementById("visitor-chart");
  const visitorChartPie = document.getElementById("visitor-chart-pie");

  if (!visitorChartLine && !visitorChartPie) {
    return false;
  }

  const getTotalVisitor = function (callback) {
    let result = [];

    dataVisitor.filter((item) => {
      let month = item.datetime.split("-")[1];

      if (parseInt(month) == parseInt(date.getMonth() + 1)) {
        callback(
          parseInt(month),
          dataVisitor.filter((item) => {
            if (item.datetime.split("-")[1] == parseInt(month)) {
              result.push({ item });

              return result;
            }
          })
        );
      } else if (parseInt(month) == parseInt(date.getMonth())) {
        callback(
          parseInt(month),
          dataVisitor.filter((item) => {
            if (item.datetime.split("-")[1] == parseInt(month)) {
              result.push({ item });

              return result;
            }
          })
        );
      }
    });
  };

  getTotalVisitor(function (month, total) {
    data.datasets[0].data[month - 1] = total.length;
  });

  if (visitorChartLine) {
    const lineChart = new Chart(visitorChartLine, config);
    lineChart.destroy();
  }

  if (visitorChartPie) {
    const pieChart = new Chart(visitorChartPie, configPie);
    pieChart.destroy();
  }
}
// End chart.js
