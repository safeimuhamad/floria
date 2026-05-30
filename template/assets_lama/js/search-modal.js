// Get the modal and its content
var searchModal = document.getElementById("searchModal");
var searchModalContent = document.querySelector(".search-modal__content");

// Get the button that opens the modal
var searchModalBtn = document.getElementById("searchModalBtn");

// Get the <span> element that closes the modal
var searchModalCloseBtn = document.querySelector(".search-modal__content__close");

// Function to open the modal
function openModal() {
  searchModal.classList.add("active");
  searchModalContent.classList.add("active");
}

// Function to close the modal
function closeModal() {
  searchModal.classList.remove("active");
  searchModalContent.classList.remove("active");
}

// Event listener for the button that opens the modal
searchModalBtn.addEventListener("click", openModal);

// Event listener for the close button inside the modal
searchModalCloseBtn.addEventListener("click", closeModal);

// Event listener for clicks outside the modal to close it
window.addEventListener("click", function (event) {
  if (event.target == searchModal) {
    closeModal();
  }
});
