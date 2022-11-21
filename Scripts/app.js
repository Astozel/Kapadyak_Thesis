const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('move');
        } else{
            entry.target.classList.remove('move');
        }
    });
});


const hiddenElements = document.querySelectorAll('.page-two-bike');
hiddenElements.forEach((el) => observer.observe(el));

const observer2 = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        } else{
            entry.target.classList.remove('show');
        }
    });
});

const hiddenElements2 = document.querySelectorAll('.page-three-map');
hiddenElements2.forEach((el) => observer2.observe(el));

const observer3 = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('slide');
        } else{
            entry.target.classList.remove('slide');
        }
    });
});

const hiddenElements3 = document.querySelectorAll('.about-page-two-text');
hiddenElements3.forEach((el) => observer3.observe(el));

const observer4 = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('slide');
        } else{
            entry.target.classList.remove('slide');
        }
    });
});
const hiddenElements4 = document.querySelectorAll('.about-logo');
hiddenElements4.forEach((el) => observer4.observe(el));

const observer5 = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('opac');
        } else{
            entry.target.classList.remove('opac');
        }
    });
});
const hiddenElements5 = document.querySelectorAll('.about-page-three-title');
hiddenElements5.forEach((el) => observer5.observe(el));