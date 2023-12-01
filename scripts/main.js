document.querySelector("#form1").addEventListener("submit",function(event){
    event.preventDefault();
    const form = document.querySelector("#form1");
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open("POST",form.dataset.dest);
    xhr.onloadstart = function() {
        //progressbar document.querySelector("#loader").style.display = "flex";
    }
    xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
    {
        console.log(this.responseText);
    }
    if (this.status==201 && this.readyState == 4 && this.status == 200) {
        console.log("BAŞARILI");
        
        document.querySelector("#formalertsuccess").style.display = "block";
        setTimeout(function(){
                    document.querySelector("#formalertsuccess").style.display = "none";
                    form.reset();
                    location.href = "anasayfa";
                },3000);

    }else{
        document.querySelector("#formalertdanger").style.display = "block";
        setTimeout(function(){
                    document.querySelector("#formalertdanger").style.display = "none";
                },3000);
    }
    // console.log(this.responseText);
    console.log(this.readyState);
    console.log(this.status);
    //document.querySelector("#loader").style.display = "none";
    // window.location.reload();
    }
    xhr.send(formData);
});


window.onload = function(e){
    const tblView = document.querySelector(".table-content");
    tblView.firstElementChild.classList.remove("d-none");
    


};





