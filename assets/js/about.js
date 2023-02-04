$(document).ready(function () {
    gsap.from('#about-header h1', {
        opacity: 0,
        duration: 1,
    })
    gsap.from('#about-body p', {
        text: {
            value: ""
        },
        delay: 1, 
        duration: 10,
    })

});