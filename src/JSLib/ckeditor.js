// CKEditor
if (document.getElementById("editor")) {
  const editor = CKEDITOR.replace("editor", {
    height: 240,
    width: "100%",
    removeButtons: "PasteFromWord",
  });

  editor.on("change", function (e) {
    document.getElementById("content").value = e.editor.getData();
  });
}
// End CKEditor
