import lottieWeb from "https://cdn.skypack.dev/lottie-web";

const audioPlayerContainer = document.getElementById("audio-player-container");
const seekSlider = document.getElementById("seek-slider");
const volumeSlider = document.getElementById("volume-slider");
const muteIconContainer = document.getElementById("mute-icon");
const myAudio = document.getElementById("myAudio");
let playState = "pause";
let muteState = "unmute";

const muteAnimation = lottieWeb.loadAnimation({
    container: muteIconContainer,
    path: "https://maxst.icons8.com/vue-static/landings/animated-icons/icons/mute/mute.json",
    renderer: "svg",
    loop: false,
    autoplay: false,
    name: "Mute Animation",
});

muteIconContainer.addEventListener("click", () => {
    if (muteState === "unmute") {
        muteAnimation.playSegments([0, 15], true);
        muteState = "mute";
        myAudio.muted = true;
    } else {
        muteAnimation.playSegments([15, 25], true);
        muteState = "unmute";
        myAudio.muted = false;
    }
});

const showRangeProgress = (rangeInput) => {
    if (rangeInput === volumeSlider) {
        audioPlayerContainer.style.setProperty(
            "--seek-before-width",
            (rangeInput.value / rangeInput.max) * 100 + "%"
        );
        document.getElementById("myAudio").volume =
            rangeInput.value / rangeInput.max;
    } else {
        audioPlayerContainer.style.setProperty(
            "--volume-before-width",
            (rangeInput.value / rangeInput.max) * 100 + "%"
        );
        document.getElementById("myAudio").volume =
            rangeInput.value / rangeInput.max;
    }
};

seekSlider.addEventListener("input", (e) => {
    showRangeProgress(e.target);
});
volumeSlider.addEventListener("input", (e) => {
    showRangeProgress(e.target);
});
