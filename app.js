import "tailwindcss/tailwind.css";
import "./styles.css";
import "./src/JSLib/service-worker";
import { navigationDrawer } from "./src/JSLib/navigation";
import { setLabels } from "./src/JSLib/labels";
import { dashboardChart } from "./src/JSLib/chart";
import "./src/JSLib/ckeditor";
import { dashboardPost } from "./src/JSLib/posts";

async function settings(e) {
  const settings = document.getElementById(e.dataset.target);

  settings.classList.toggle("hidden");
}

async function sidebarToggle(e) {
  const sidebar = document.querySelector(e.dataset.target);

  sidebar.classList.toggle("hidden");
}

document.addEventListener("DOMContentLoaded", async function () {
  navigationDrawer();
  setLabels();
  await dashboardChart();
  await dashboardPost();
});
