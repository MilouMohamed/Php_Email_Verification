

function click_sender() {
  var email = document.querySelector('input[name="email"]').value;
  var pass = document.querySelector('input[name="pass"]').value;
console.log(pass ,email); 
 
  let divErr = document.querySelector("#error_msg");
  if (pass == "" || email == "") {
    divErr.innerHTML = "The Password Or Email is Empty !!!";
  } else {
    divErr.innerHTML = "";
    divErr.style.display = "block";
    // document.querySelector('#myForm').submit();

    var infoToSend = { email: email, pass: pass };
 

    fetch("connect_log.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json", // Indique que les données envoyées sont en JSON
      },
      body: JSON.stringify(infoToSend),
    })
      .then((response) => response.json())
      .then((data) => { 

        if (data.success) {
          divErr.innerHTML = data.message || "Erreur inconnue.";
          divErr.classList.add("d-none"); 
          document.querySelectorAll("input[name]").forEach((inpt) => {
            inpt.value = "";

          });
        window.location.href="dashboard.php";
        } else { 
          // Afficher un message d'erreur si la réponse est négative
          divErr.innerHTML =  data.message || "Erreur inconnue.";
            divErr.classList.remove("d-none"); 
        }
      })
      .catch((error) => {
        console.log("error ",error);
        divErr.textContent ="There was an error sending the infoToSend.";
      });
  }
}

window.onload = () => {
  console.log("loading");
};
