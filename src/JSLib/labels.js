export function setLabels() {
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
