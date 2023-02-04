$(document).ready(function () {
    var stories = gsap.utils.toArray('.stories')
    stories.forEach((story) => {
        gsap.from(story, {
            scrollTrigger: {
                trigger: story,
            },
            scale: 0.80,
            opacity: 0,
            duration: 1,
        })
    });
});