alert("Site under construction! (do this counts as pop up box?)");

document.addEventListener("DOMContentLoaded", function () {
    const scrollImages = document.querySelector(".scrollge");
    const scrollLength = scrollImages.scrollWidth - scrollImages.clientWidth;
    const leftButton = document.querySelector(".left");
    const rightButton = document.querySelector(".right");
  
    function checkScroll() {
      const currentScroll = scrollImages.scrollLeft;
      if (currentScroll === 0) {
        leftButton.setAttribute("disabled", "true");
        rightButton.removeAttribute("disabled");
      } else if (currentScroll === scrollLength) {
        rightButton.setAttribute("disabled", "true");
        leftButton.removeAttribute("disabled");
      } else {
        leftButton.removeAttribute("disabled");
        rightButton.removeAttribute("disabled");
      }
    }
  
    scrollImages.addEventListener("scroll", checkScroll);
    window.addEventListener("resize", checkScroll);
    checkScroll();
  
    function leftScroll() {
      scrollImages.scrollBy({
        left: -500,
        behavior: "smooth"
      });
    }
  
    function rightScroll() {
      scrollImages.scrollBy({
        left: 500,
        behavior: "smooth"
      });
    }
  
    leftButton.addEventListener("click", leftScroll);
    rightButton.addEventListener("click", rightScroll);
  });

  document.querySelectorAll('.accordion-trigger-input').forEach((accordionInput) => {
    accordionInput.addEventListener('change', function() {
        if (this.checked) {
            document.querySelectorAll('.accordion-trigger-input').forEach((otherAccordion) => {
                if (otherAccordion !== this) {
                    otherAccordion.checked = false;
                }
            });
        }
    });
});

function darkmode() {
  var element = document.body;
  element.classList.toggle("dark-mode");
}

const hamburger = document.querySelector('.hamburger');
const navbar = document.querySelector('.navbar');

  hamburger.addEventListener('click', function() {
  navbar.classList.toggle('show');
});