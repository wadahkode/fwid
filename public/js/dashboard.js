const main = document.querySelector("#main");
const mainContent = main.querySelector("#main-content");
const visitorContent = main.querySelector("#visitor-content");
const postContent = main.querySelector("#post-content");

async function getMainContent() {
  const tuts = await getPostContent(location.origin + "/api/posts/tutorial");

  return /*html*/ `
    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
      <div class="text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-person w-12 h-12" viewBox="0 0 16 16">
          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
        </svg>
      </div>
      <div class="text-gray-600">
        <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">Pengguna</h2>
        <b class="lg:text-md">Total: 0</b>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
      <div class="text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-chat-left-quote w-10 h-10" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
          <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
        </svg>
      </div>
      <div class="text-gray-600">
        <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">komentar</h2>
        <b class="lg:text-md">Total: 0</b>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
      <div class="text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-newspaper w-10 h-10" viewBox="0 0 16 16">
          <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
          <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
        </svg>
      </div>
      <div class="text-gray-600">
        <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">postingan</h2>
        <b class="lg:text-md">Total: <b id="total-postingan">${tuts.length}</b></b>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
      <div class="text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-file-earmark-text w-10 h-10" viewBox="0 0 16 16">
          <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
          <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
        </svg>
      </div>
      <div class="text-gray-600">
        <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">halaman</h2>
        <b class="lg:text-md">Total: 0</b>
      </div>
    </div>
  `;
}

async function getPostContent(url) {
  const response = await fetch(url, {
    method: "GET",
    mode: "no-cors",
  });

  return response.json();
}

// function setPostContent(item) {
//   return /*html*/ `
//     <article class="bg-white shadow-lg shadow-lg rounded-md p-3">
//       <div>
//         <h1>${item.title}</h1>
//       </div>
//     </article>
//   `;
// }

// const sidebarLinks = document.querySelectorAll("aside > ul > li > a");

// sidebarLinks.forEach((item) => {
//   item.addEventListener("click", async function () {
//     let target = item;
//     let posts = null;

//     switch (target.hash) {
//       case "#dashboard":
//         if (!postContent.parentElement.classList.contains("hidden")) {
//           postContent.parentElement.classList.add("hidden");
//         }

//         if (
//           mainContent.classList.contains("hidden") &&
//           visitorContent.classList.contains("hidden")
//         ) {
//           mainContent.classList.remove("hidden");
//           visitorContent.classList.remove("hidden");
//         }

//         mainContent.innerHTML = "";
//         mainContent.innerHTML = await getMainContent();
//         break;

//       case "#postingan":
//         if (
//           postContent.parentElement.classList.contains("hidden") &&
//           !mainContent.classList.contains("hidden") &&
//           !visitorContent.classList.contains("hidden")
//         ) {
//           postContent.parentElement.classList.remove("hidden");
//           mainContent.classList.add("hidden");
//           visitorContent.classList.add("hidden");
//         }

//         posts = await getPostContent(location.origin + "/api/posts/tutorial");

//         postContent.innerHTML = "";

//         posts.map(function (item) {
//           postContent.innerHTML += setPostContent(item);
//         });

//         break;
//     }
//   });
// });

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
        "rgba(255, 99, 132, 0.2)",
        "rgba(255, 159, 64, 0.2)",
        "rgba(255, 205, 86, 0.2)",
        "rgba(75, 192, 192, 0.2)",
        "rgba(54, 162, 235, 0.2)",
        "rgba(153, 102, 255, 0.2)",
        "rgba(201, 203, 207, 0.2)",
        "rgba(201, 203, 207, 0.2)",
        "rgba(201, 203, 207, 0.2)",
        "rgba(201, 203, 207, 0.2)",
        "rgba(54, 162, 235, 0.5)",
        "rgba(201, 203, 207, 0.2)",
      ],
      borderColor: [
        "rgb(255, 99, 132)",
        "rgb(255, 159, 64)",
        "rgb(255, 205, 86)",
        "rgb(75, 192, 192)",
        "rgb(54, 162, 235)",
        "rgb(153, 102, 255)",
        "rgb(201, 203, 207)",
        "rgb(201, 203, 207)",
        "rgb(201, 203, 207)",
        "rgb(201, 203, 207)",
        "rgb(255, 99, 133)",
        "rgb(201, 203, 207)",
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

(async function () {
  "use strict";

  const dataVisitor = await getPostContent(location.origin + "/api/visitor");
  const date = new Date();

  const getTotalVisitor = function (callback) {
    let result = [];

    for (const key in dataVisitor) {
      date.setMonth(
        dataVisitor[key].datetime.match(date.getMonth() + 1)
          ? date.getMonth()
          : date.getMonth() - 1
      );

      result.push({ [date.getMonth()]: dataVisitor[key] });

      callback(date.getMonth(), result);
    }
  };

  getTotalVisitor(function (month, total) {
    data.datasets[0].data[month] = total.length;
  });

  if (
    document.getElementById("visitor-chart") &&
    document.getElementById("visitor-chart-pie")
  ) {
    const lineChart = new Chart(
      document.getElementById("visitor-chart"),
      config
    );
    const pieChart = new Chart(
      document.getElementById("visitor-chart-pie"),
      configPie
    );

    const tuts = await getPostContent(location.origin + "/api/posts/tutorial");
    document.getElementById("total-postingan").innerHTML = tuts.length;
  }
})();
// End chart.js

// CKEditor
if (document.getElementById("editor")) {
  CKEDITOR.replace("editor", {
    height: 240,
    width: "100%",
    removeButtons: "PasteFromWord",
  });
}
// End CKEditor
