const main = document.querySelector("#main");
const mainContent = main.querySelector("#main-content");
const postContent = main.querySelector("#post-content");

async function getMainContent() {
  return "main";
}

async function getPostContent(url) {
  const response = await fetch(url, {
    method: "GET",
    mode: "no-cors",
  });

  return response.json();
}

function setPostContent(item) {
  return `
    <article class="bg-white shadow-lg p-3">
      <div>
        <h1>${item.title}</h1>
      </div>
    </article>
  `;
}

document.addEventListener("click", async function (e) {
  let target = e.target;
  let posts = null;

  switch (target.hash) {
    case "#dashboard":
      if (!postContent.classList.contains("hidden")) {
        postContent.classList.add("hidden");
      }

      if (mainContent.classList.contains("hidden")) {
        mainContent.classList.remove("hidden");
      }

      mainContent.innerHTML = "";
      mainContent.innerHTML = await getMainContent();
      break;

    case "#postingan":
      if (
        postContent.classList.contains("hidden") &&
        !mainContent.classList.contains("hidden")
      ) {
        postContent.classList.remove("hidden");
        mainContent.classList.add("hidden");
      }

      posts = await getPostContent(
        location.origin + "/admin/dashboard/postingan"
      );

      postContent.innerHTML = "";

      posts.map(function (item) {
        postContent.innerHTML += setPostContent(item);
      });

      break;
  }
});
