// const html = document.documentElement;
// const body = document.body;
// const menuLinks = document.querySelectorAll(".admin-menu a");
// const collapseBtn = document.querySelector(".admin-menu .collapse-btn");
// const toggleMobileMenu = document.querySelector(".toggle-mob-menu");
// const switchInput = document.querySelector(".switch input");
// const switchLabel = document.querySelector(".switch label");
// const switchLabelText = switchLabel.querySelector("span:last-child");
// const collapsedClass = "collapsed";
// const lightModeClass = "light-mode";

// /*TOGGLE HEADER STATE*/
// collapseBtn.addEventListener("click", function () {
//   body.classList.toggle(collapsedClass);
//   this.getAttribute("aria-expanded") == "true"
//     ? this.setAttribute("aria-expanded", "false")
//     : this.setAttribute("aria-expanded", "true");
//   this.getAttribute("aria-label") == "collapse menu"
//     ? this.setAttribute("aria-label", "expand menu")
//     : this.setAttribute("aria-label", "collapse menu");
// });

// /*TOGGLE MOBILE MENU*/
// toggleMobileMenu.addEventListener("click", function () {
//   body.classList.toggle("mob-menu-opened");
//   this.getAttribute("aria-expanded") == "true" ? this.setAttribute("aria-expanded", "false") : this.setAttribute("aria-expanded", "true");
//   this.getAttribute("aria-label") == "open menu" ? this.setAttribute("aria-label", "close menu") : this.setAttribute("aria-label", "open menu");
// });

// /*SHOW TOOLTIP ON MENU LINK HOVER*/
// for (const link of menuLinks) {
//   link.addEventListener("mouseenter", function () {
//     if (
//       body.classList.contains(collapsedClass) &&
//       window.matchMedia("(min-width: 768px)").matches
//     ) {
//       const tooltip = this.querySelector("span").textContent;
//       this.setAttribute("title", tooltip);
//     } else {
//       this.removeAttribute("title");
//     }
//   });
// }

// /*TOGGLE LIGHT/DARK MODE*/
// if (localStorage.getItem("dark-mode") === "false") {
//     body.classList.add(lightModeClass);
//     switchInput.checked = false;
//     switchLabelText.textContent = "Light";
//   }
  

// switchInput.addEventListener("click", function () {
//   body.classList.toggle(lightModeClass);
//   if (body.classList.contains(lightModeClass)) {
//     switchLabelText.textContent = "Light";
//     localStorage.setItem("dark-mode", "false");
//   } else {
//     switchLabelText.textContent = "Dark";
//     localStorage.setItem("dark-mode", "true");
//   }
// });

$(document).ready(function(){
    $("span#users").click(function(){
        //get users
        var settings = {
            "url": "api/get_all_users.php",
            "method": "GET",
            success: function(response){
                response.forEach((user) => {
                    "<div></div>"
                });
                
            },
            error: function(error){

            }
        };

        $.ajax(settings);
    })
});
