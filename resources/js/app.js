import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
  
    thumbnailWidth: 200,
    thumbnailHeight: 200,
    addRemoveLinks: true,
    maxFiles: 1,
    acceptedFiles: ".jpg, .jpeg, .png, .gif",
    dictDefaultMessage: "Sube aqui tu imagen",  
    dictInvalidFileType: "Formato no válido",
    dictRemoveFile: "Borrar archivo",
    uploadMultiple: false,

    init: () => {
        
            if(document.querySelector('input[name="imagen"]').value.trim()){
                
                const imagenPath = {};
                imagenPath.size = 1000;
                imagenPath.name = document.querySelector('input[name="imagen"]').value;
                this.options.addedfile.call(this, imagenPath);

                this.options.thumbnail.call(this, imagenPath, `/uploads/${imagenPath.name}`);
                imagenPath.previewElement.classList.add("dz-success", "dz-complete");
            }
            /* document.querySelector('input[name="imagen"]').value = response.imagen */
       
    }
});


/* dropzone.on("removedfile", (formData) => {
    console.log(formData)
}); */

dropzone.on("success", (file, response) => {    
    console.log(document.querySelector('[name="imagen"]').value)
    document.querySelector('input[name="imagen"]').value = response.imagen
});
dropzone.on("error", (file, message) => {    
    console.log(message)
});
dropzone.on("removedfile", () => {    
    document.querySelector('input[name="imagen"]').value = ""

});