let checkDelete = document.querySelectorAll(".check-delete");
checkDelete.forEach((element) => {
  element.onclick = deleteArt;
});
function deleteArt(event) {
  event.preventDefault();
  let intBtn = confirm("Удалить контакт?");
  if (intBtn == true) {
    location.href = "./delete_contact.php?id=" + this.getAttribute("data");
  } else {
    return false;
  }
}
