const sendBtn = document.querySelector(".sendBtn");
let name = document.querySelector(".name");
let surname = document.querySelector(".surname");
let phone = document.querySelector(".phone");
let mainDiv = document.querySelector(".mainDiv");

sendBtn.onclick = (e) => {
  e.preventDefault();
  if (name.value == "" || surname.value == "" || phone.value == "") {
    checkInputs();
    return false;
  }
  if (phone.value.length < 7) {
    checkInputsLength();
  } else {
    fetch("insert.php", {
      method: "POST",
      body: JSON.stringify({
        name: name.value.trim(),
        surname: surname.value.trim(),
        phone: phone.value.trim(),
      }),
    })
      .then((response) => response.text())
      .then((response) => {
        name.value = "";
        surname.value = "";
        phone.value = "";
        success();
      });
  }
};
