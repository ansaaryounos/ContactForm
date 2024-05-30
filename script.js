const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e)=> {
    e.preventDefault(); //Prevent form from submitting
    statusTxt.style.display = "block";

    let xhr = new XMLHttpRequest(); //creating a new xml object
    xhr.open("POST", "message.php", true); //sending post request to message.php file
    xhr.onload = ()=>{
        if (xhr.readyState == 4 && xhr.status == 200) { //if AJAX response is this, it means there are no errors
            
            let response = xhr.response;
            statusTxt.innerHTML = response;
            form.reset();
            setTimeout(()=>{
                statusTxt.style.display = "none";
            }, 3000);

        }
    }
    let formData = new FormData(form); //This FormData obj is used to send form data
    xhr.send(formData); //Sending the form data
}