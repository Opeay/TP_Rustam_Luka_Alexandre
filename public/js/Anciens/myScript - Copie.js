function popupCenter(url, title, w, h) {
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
function previewImage(e,id_image) {
    // e.files contient un objet FileList
    let picture = e.files[0];
    // "picture" est un objet File
    if (picture) {
        // On change l'URL de l'image
        let image=document.getElementById(id_image);
        image.src = URL.createObjectURL(picture);
    }
}

function previewPicture (e,id_image) {  // autre possibilite de preview
    // e.files contient un objet FileList
    let picture = e.files[0];

    // "picture" est un objet File
    if (picture) {
        // L'objet FileReader
        var reader = new FileReader();
        // L'événement déclenché lorsque la lecture est complète
        reader.onload = function (e) {
            // On change l'URL de l'image (base64)
            let image=document.getElementById(id_image);
            image.src = e.target.result
        }
        // On lit le fichier "picture" uploadé
        reader.readAsDataURL(picture)
    }
}