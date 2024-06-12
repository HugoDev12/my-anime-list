// effects on input text and labels 
let inputs = Object.values(document.getElementsByClassName("effect"));
inputs.forEach(i => {

    // case update anime where input has value, set labels on top
    if(i.value.length > 0){
        i.classList.add("top-label");
    }


    // set labels on top on input's focus
    i.addEventListener("focus", (e) => {
        let classes = Object.values(e.target.classList);
        if(!classes.includes("top-label")){
            e.target.classList.add("top-label");
        }
    })


    // set labels on top on focus out if input has no empty value
    i.addEventListener("focusout", (e) => {
        if(e.target.value.length > 0){
            e.target.classList.add("top-label");
        }else {
            e.target.classList.remove("top-label");
        }
    })
});


let imgAdded = document.getElementById("file-upload-button");
let imgInput = document.getElementById("image");
let imgName = document.getElementById('img-added');
let removeSelectedImg = document.getElementById("cross");
if(imgName.textContent.length > 0){
    removeSelectedImg.classList.add("close");
}

imgInput.addEventListener("change", ()=>{
    const [file] = imgInput.files;
    imgName.firstChild.textContent = file["name"];
    removeSelectedImg.classList.add("close");

})

removeSelectedImg.addEventListener("click", (e) => {
    // console.log(e.target.previousElementSibling);
    imgName.firstChild.textContent = "";
    // e.target.previousElementSibling.firstChild.textContent = "";
    e.target.classList.remove("close");

})

// adjust input number value between 0 and 5
let inputRate = document.getElementById("rate");
inputRate.addEventListener("change", function(){
    console.log(this.value);
    if(this.value < 1){
        this.value = 1;
    } 
    if(this.value > 5){
        this.value = 5;
    }
})

