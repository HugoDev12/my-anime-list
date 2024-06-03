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
    console.log(e.target.previousElementSibling.firstChild);
    e.target.previousElementSibling.firstChild.textContent = "";
    e.target.classList.remove("close");

})


// // display img name file when selected
// let imgFile = document.getElementById("image");
// let div = document.createElement('div');
// let span = document.getElementsByClassName("img-added");

// imgFile.addEventListener("change", function(){
//     const [file] = imgFile.files;
//     console.log(span[0], span[0].firstChild);
//     span[0].firstChild.textContent = file["name"];
//     // add cross logo in span to remove selected img on click
//     div.innerHTML = "<span class='close' onclick='removeImg(this)'></span>";
//     span[0].parentNode.insertBefore(div.firstChild, span.nextSibling);
// })

// // display cross in case an anime is updated and got an image.
// if(span[0].firstChild.textContent.length > 0){
//     span[0].parentNode.insertBefore(div.firstChild, span.nextSibling);
// }

// // remove img name file on corss clicked
// function removeImg(e){
//     // console.log(navigator.userAgent);
    // e.previousElementSibling.firstChild.textContent = "";
    // e.classList.remove("close");
// }

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

