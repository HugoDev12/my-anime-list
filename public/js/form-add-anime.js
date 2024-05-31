// effects on input text 
let inputs = Object.values(document.getElementsByClassName("effect"));
inputs.forEach(i => {
    i.addEventListener("focusout", function(){
        if(this.value.length > 0){
            this.classList.add("top-label");
        } else {
            this.classList.remove("top-label");
        }
    })
});

// display img name file when selected
let imgFile = document.getElementById("image");
imgFile.addEventListener("change", function(){
    const [file] = imgFile.files;

    let span = document.getElementById("img-added");
    span.firstChild.textContent = file["name"];
    // add cross logo in span to remove selected img on click
    let removeImg = document.createElement('div');
    removeImg.innerHTML = "<span class='close' onclick='removeImg(this)'></span>";
    span.parentNode.insertBefore(removeImg.firstChild, span.nextSibling);
})

// remove img name file on corss clicked
function removeImg(e){
    e.previousSibling.firstChild.textContent = "";
    e.remove();
}

// adjust input number value between 0 and 5
let inputRate = document.getElementById("rate");
inputRate.addEventListener("change", function(){
    console.log(this.value);
    if(this.value < 0){
        this.value = 0;
    } 
    if(this.value > 5){
        this.value = 5;
    }
})

