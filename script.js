const inputs = document.querySelectorAll(".input");
const editBtns = document.querySelectorAll(".editBtn");
const okBtns = document.querySelectorAll(".ok");

editBtns.forEach((btn, index) => {
   btn.addEventListener("click", (e) => {
      editBtns.forEach((b) => b.classList.remove("hidden"));
      inputs.forEach((i) => {
         i.setAttribute("readonly", null);
         i.classList.remove("editable");
      });
      okBtns.forEach((b) => b.setAttribute("hidden", null));

      btn.classList.add("hidden");
      inputs[index].removeAttribute("readonly");
      inputs[index].classList.add("editable");
      okBtns[index].removeAttribute("hidden");

      inputs[index].focus();
   });
});
