const pictureSlide = document.querySelector('.pictureSlider');
const slideImages = document.querySelectorAll('.pictureSlider img');
const options = document.querySelectorAll('.option');

//Buttons
const prevBtn = document.querySelector('#prev');
const nextBtn = document.querySelector('#next');

//Counter
let counter = 1;
const size = pictureSlide.clientWidth;


pictureSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

//Button Listeners

var myTimer = setInterval(nextSlide, 4000);

function nextSlide(){
    if(counter>=slideImages.length - 1) return;
    pictureSlide.style.transition = 'transform .3s ease-in-out';
    counter++;
    pictureSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

function prevSlide(){
    if(counter<=0) return;
    pictureSlide.style.transition = 'transform .3s ease-in-out';
    counter--;
    pictureSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

nextBtn.addEventListener('click', nextSlide);

prevBtn.addEventListener('click', prevSlide);

pictureSlide.addEventListener('transitionend',()=>{
    if(slideImages[counter].id === "lastClone"){
        pictureSlide.style.transition = 'none';
        counter = slideImages.length - 2;
        pictureSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    } 
    
    if(slideImages[counter].id === "firstClone"){
        pictureSlide.style.transition = 'none';
        counter = 1;
        pictureSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
});


