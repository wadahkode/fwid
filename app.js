import "regenerator-runtime/runtime";
import "tailwindcss/tailwind.css";
import "./styles.css";
import { navigationDrawer } from "./src/JSLib/navigation";
import { setLabels } from "./src/JSLib/labels";
import { dashboardChart } from "./src/JSLib/chart";
import { dashboardPost } from "./src/JSLib/posts";
import "./src/JSLib/ckeditor";
import * as sw from "./src/JSLib/service-worker";

async function settings(e) {
  const settings = document.getElementById(e.dataset.target);

  if (settings) {
    settings.classList.toggle("hidden");
  }
}

async function sidebarToggle(e) {
  const sidebar = document.querySelector(e.dataset.target);

  if (sidebar) {
    sidebar.classList.toggle("hidden");
  }
}

(async function () {
  "use strict";

  navigationDrawer();
  setLabels();

  await dashboardChart();
  await dashboardPost();
})();

sw.register();
