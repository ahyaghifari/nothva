$(document).ready(function () {
    gsap.from('#era-title', {
        opacity: 0,
        duration: 1,
        // ease: "expo.out"
    })
    gsap.from('#era-text > #era-description', {
        opacity: 0,
        duration: 1,
        delay: 1,
        // ease: "expo.out"
    })
    gsap.from('#era-text > #era-description > p', {
        text: {
            value: ""
        },
        duration: 5,
        delay: 1,
        // ease: "expo.out"
    })
    gsap.from('#era-faces', {
        opacity: 0,
        duration: 1,
        delay: 2,
        // ease: "expo.out"
    })

    
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        center : true,
        items: 2,
        dots: false,
        autoplay: true,
        responsive: {
            768: {
                items : 1,
            }
        }
    })
});