
const modal = document.getElementById("modal");
const close = document.getElementsByClassName("close")[0];


const galleryImages = document.querySelectorAll('.brand-gallery-img img');


galleryImages.forEach(function(img) {

    img.addEventListener('click', function() {

        let modalImg = document.getElementById("modal-img");
        modalImg.src = this.src;


        modal.style.display = "block";
    });
});


close.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
