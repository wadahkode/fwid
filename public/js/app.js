function navigationDrawer() {
  const btnMenu = document.getElementById("btn-menu");
  const sidebar = document.querySelector(".sidebar");
  const sidebarOpacity = document.querySelector(".sidebar-opacity");

  btnMenu.onclick = function () {
    if (
      sidebar.classList.contains("hidden") &&
      sidebarOpacity.classList.contains("hidden")
    ) {
      sidebar.classList.remove("hidden");
      sidebar.classList.add("transition");
      sidebar.classList.add("duration-700");
      sidebar.classList.add("ease-in-out");
      sidebarOpacity.classList.remove("hidden");
      sidebarOpacity.classList.add("transition");
      sidebarOpacity.classList.add("duration-700");
      sidebarOpacity.classList.add("ease-in-out");
    }
  };

  sidebarOpacity.onclick = function () {
    if (
      !sidebar.classList.contains("hidden") &&
      !sidebarOpacity.classList.contains("hidden")
    ) {
      sidebar.classList.add("hidden");
      sidebar.classList.add("transition");
      sidebar.classList.add("duration-700");
      sidebar.classList.add("ease-in-out");
      sidebarOpacity.classList.add("hidden");
      sidebarOpacity.classList.add("transition");
      sidebarOpacity.classList.add("duration-700");
      sidebarOpacity.classList.add("ease-in-out");
    }
  };
}

function setLabels() {
  const labelTypes = {
    html: "bg-red-500 border-gray-200 px-3 rounded w-max text-xs font-semibold tracking-wides py-1 text-white",
    css: "bg-blue-500 border border-gray-200 px-3 rounded w-max text-xs font-semibold tracking-wides py-1 text-white",
    js: "bg-yellow-500 border border-gray-200 px-3 rounded w-max text-xs font-semibold tracking-wides py-1",
  };

  if (document.getElementById("label")) {
    const label = document.getElementById("label");
    let labels = [];

    if (label.innerHTML.match(/,/)) {
      label.split(",").map((i) => labels.push(i));
    }

    if (labels.length > 1) {
      labels.forEach((item) => {
        label.innerHTML += `
          <div class="${labelTypes[item]}">${item}</div>
        `;
      });
    } else {
      label.className =
        labelTypes[label.innerHTML] === undefined
          ? "border border-gray-200 px-3 rounded w-max text-xs font-semibold tracking-wides py-1"
          : labelTypes[label.innerHTML];
    }
  }
}

(function () {
  "use strict";

  navigationDrawer();
  setLabels();
})();
