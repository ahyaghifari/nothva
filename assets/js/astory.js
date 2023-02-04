$(document).ready(function () {
    gsap.from('#stories-header h1', {
        text: {
            value: ""
        },
        opacity: 0,
        duration: 1.5,
    })
    gsap.from('#stories-body p', {
        text: {
            value: ""
        },
        duration: 10,
        delay: 1.5,
    })
});