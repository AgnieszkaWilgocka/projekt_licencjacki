// document.addEventListener('scroll', function () {
//     const windowHeight = window.innerHeight;
//     const scrollValue = window.scrollY;
//
//     const column1 = document.querySelectorAll('.column1');
//     const column2 = document.querySelectorAll('.column2');
//     const column3 = document.querySelectorAll('.column3');
//
//     const column1FromTop = column1.offsetTop;
//     const column1Height = column1.offsetHeight;
//
//     const column2FromTop = column2.offsetTop;
//     const column2Height = column2.offsetHeight;
//
//     const column3FromTop = column3.offsetTop;
//     const column3Height = column3.offsetHeight;
//
//     if (scrollValue > column1FromTop + column1Height - windowHeight) {
//         column1.classList.add('active');
//     }
//
//     if (scrollValue > column2FromTop + column2Height - windowHeight) {
//         column2.classList.add('active');
//     }
//
//     if (scrollValue > column3FromTop + column3Height - windowHeight) {
//         column3.classList.add('active');
//     }
//
// });