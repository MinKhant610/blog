ClassicEditor.create(document.querySelector(".editor"), {
    licenseKey: "",
  })
    .then((editor) => {
      window.editor = editor;
    })
    .catch((error) => {
      console.error("Oops, something went wrong!");
      console.error(
        "Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:"
      );
      console.warn("Build id: 4tbxn2t1nghv-vo64egvrqxia");
      console.error(error);
    });
