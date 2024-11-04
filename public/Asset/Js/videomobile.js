document.addEventListener('DOMContentLoaded', function() {
    let video = document.getElementById('videoAC');

    // detection si l'appareil est mobile
    function isMobile() {
        return /Android|webOS|iPhone|iPad|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    if (!isMobile()) {

        video.autoplay = true;
        video.play().catch(function(error) {
            console.log("Autoplay was prevented:", error);
        });
    } else {

        video.pause();
        video.autoplay = false;
        video.controls = false;
    }
});