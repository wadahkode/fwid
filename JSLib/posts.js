import { requestContent } from "./request";

const containerTuts = document.getElementById("total-postingan");
const btnPost = document.querySelectorAll(".btn-post");
const postsError = document.getElementById("posts-error");

async function setPublish(form) {
  const foto = await uploadFoto(form.foto);
  const url = location.origin + "/api/posts/publish";
  const formData = new FormData();

  if (form.title.value == "") {
    form.title.focus();

    return false;
  }

  formData.append("uuid", form.uuid.value);
  formData.append("title", form.title.value);
  formData.append("content", form.content.value);
  formData.append("foto", foto);
  formData.append("author", form.author.value);
  formData.append("label", form.label.value);
  formData.append("description", form.description.value);

  const posts = await sendData(url, formData);

  posts.map((response) => {
    if (!response.success) {
      if (response.error.type == "READY") {
        postsError.className =
          "bg-yellow-500 p-3 text-white font-semibold tracking-wides rounded-lg shadow-lg";
        postsError.innerHTML = response.error.message;
      } else {
        postsError.className =
          "bg-yellow-500 p-3 text-white font-semibold tracking-wides rounded-lg shadow-lg";
        postsError.innerHTML = response.error.message;
      }
    } else {
      postsError.className =
        "bg-green-500 p-3 text-white font-semibold tracking-wides rounded-lg shadow-lg";
      postsError.innerHTML = response.message;
    }
  });

  setTimeout(() => {
    postsError.className = "";
    postsError.innerHTML = "";
  }, 3600);
}

async function setUpdate(form) {
  const foto = await uploadFoto(form.foto);
  const url = location.origin + "/api/posts/update";
  const formData = new FormData();

  if (form.title.value == "") {
    form.title.focus();

    return false;
  }

  formData.append("uuid", form.uuid.value);
  formData.append("title", form.title.value);
  formData.append("content", form.content.value);
  formData.append("foto", foto);
  formData.append("author", form.author.value);
  formData.append("label", form.label.value);
  formData.append("description", form.description.value);
  formData.append("created_at", form.created_at.value);

  const posts = await sendData(url, formData);

  posts.map((response) => {
    if (!response.success) {
      if (response.error.type == "READY") {
        postsError.className =
          "bg-yellow-500 p-3 text-white font-semibold tracking-wides rounded-lg shadow-lg";
        postsError.innerHTML = response.error.message;
      } else {
        postsError.className =
          "bg-yellow-500 p-3 text-white font-semibold tracking-wides rounded-lg shadow-lg";
        postsError.innerHTML = response.error.message;
      }
    } else {
      postsError.className =
        "bg-green-500 p-3 text-white font-semibold tracking-wides rounded-lg shadow-lg";
      postsError.innerHTML = response.message;
    }
  });

  setTimeout(() => {
    postsError.className = "";
    postsError.innerHTML = "";
  }, 3600);
}

async function sendData(url = "", data) {
  const response = await fetch(url, {
    method: "POST",
    // mode: "cors",
    // credentials: "include",
    // headers: {
    //   "Content-Type": "application/json",
    // },
    body: data,
  });

  return response.json();
}

// function createNewPost(form) {
//   const sendData = async function () {
//     const foto = await uploadFoto(form.foto);
//     const url =
//       location.origin + (selector == ".publish")
//         ? "/api/posts/publish"
//         : "/api/posts/draft";

//     const data = {
//       id: form.uuid.value,
//       title: form.title.value,
//       content: form.content.value,
//       foto: foto,
//       label: form.label.value,
//       description: form.description.value,
//       author: form.author.value,
//       createdAt: form.createdAt.value,
//       updatedAt: form.updatedAt.value,
//     };

//     if (data.title == "") {
//       form.title.focus();
//     }

//     const config = {
//       method: "POST",
//       mode: "cors",
//       credentials: "include",
//       headers: {
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify(data),
//     };

//     return await fetch(url, config);
//   };

//   sendData().then((response) => {
//     console.log(response.json());
//   });
// }

async function uploadFoto(foto) {
  const formData = new FormData();
  const url = location.origin + "/api/upload/file";

  if (!foto.files[0]) {
    return "https://www.freeiconspng.com/uploads/no-image-icon-13.png";
  }

  formData.append("foto", foto.files[0]);

  const response = await fetch(url, { method: "POST", body: formData });

  return response.json();
}

function deletePosts(e) {
  const id = e.getAttribute("data-id");
  const url = location.origin + "/admin/dashboard/posts/delete/" + id;

  fetch(url, {
    method: "POST",
    mode: "cors",
    credentials: "include",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ id }),
  })
    .then((response) => response.json())
    .then((response) => {
      if (response) {
        location.reload();
      }
    });
}

function settingsPosts(e) {
  const settingsPosts = document.getElementById(
    "settings-posts-" + e.getAttribute("data-id")
  );

  settingsPosts.classList.toggle("hidden");
}

export async function dashboardPost() {
  const tuts = await requestContent(location.origin + "/api/posts/tutorial");

  if (btnPost) {
    btnPost.forEach((btn) => {
      btn.addEventListener("click", (e) =>
        e.currentTarget.dataset.target === ".publish"
          ? setPublish(document.querySelector(e.currentTarget.dataset.target))
          : e.currentTarget.dataset.target === ".update"
          ? setUpdate(document.querySelector(e.currentTarget.dataset.target))
          : setDraft(document.querySelector(e.currentTarget.dataset.target))
      );
    });
  }

  if (containerTuts) {
    containerTuts.innerHTML = tuts.length;
  }
}
