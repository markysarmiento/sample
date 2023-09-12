function toggleModal(modalElement) {
    modalElement.classList.toggle('hidden');
    modalElement.classList.add('opacity-100');
}

// Code for the first modal
const modal = document.querySelector('.modal');
const showmodal = document.querySelector('.showmodal');
const closeModalButton = document.querySelector('.close-modal');

showmodal.addEventListener('click', function() {
    toggleModal(modal);
});

closeModalButton.addEventListener('click', function() {
    toggleModal(modal);
});

// Code for the second modal
const modal1 = document.querySelector('.modal1');
const showmodal1 = document.querySelector('.showmodal1');
const closeModalButton1 = document.querySelector('.close-modal1');

showmodal1.addEventListener('click', function() {
    toggleModal(modal1);
});

closeModalButton1.addEventListener('click', function() {
    toggleModal(modal1);
});
