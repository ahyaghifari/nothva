$(document).ready(function () {
    var eras = gsap.utils.toArray('.era')
    eras.forEach((era) => {
        gsap.from(era, {
            scrollTrigger: {
                trigger: era,
            },
            opacity: 0,
            rotate : '-30deg',
            duration: 1.5,
            transformOrigin: 'left bottom',
        })
    });
});