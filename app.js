import "regenerator-runtime/runtime";
import "tailwindcss/tailwind.css";
import "./styles.css";
import { navigationDrawer } from "./JSLib/navigation";
import { setLabels } from "./JSLib/labels";
import { dashboardChart } from "./JSLib/chart";
import { dashboardPost } from "./JSLib/posts";
import "./JSLib/ckeditor";
import * as sw from "./JSLib/service-worker";

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
