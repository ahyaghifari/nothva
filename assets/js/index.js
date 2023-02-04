$(document).ready(function () {


    var tl = gsap.timeline();

    gsap.from('#index-image', {
        scale: 0,
        opacity: 0,
        duration: 1,
        ease: "expo.out"
    })
    gsap.fromTo('#index-title', {
        width: 0,
        opacity: 0,
    },
    {
        width: '100%',
        transformOrigin: 'left center',
        delay: 1,
        opacity: 100,
        duration: 1,
        ease: "expo.out"
        })
    gsap.from('#index-intro', {
        text: {
            value: ""
        },
        duration: 5,
        delay: 2,
    })

    var owl = $('.owl-carousel')
    owl.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
    })
});