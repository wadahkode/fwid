export function navigationDrawer() {
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
