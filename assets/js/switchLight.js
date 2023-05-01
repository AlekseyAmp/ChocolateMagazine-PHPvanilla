const text1 = document.getElementById("text1");
const text2 = document.getElementById("text2");

let counter = 0;

setInterval(() => {
    counter++;

    if (counter % 2 === 0) {
        text2.style.color = "#fcc942";
        text1.style.color = "white";

        if (text2.style.color === "white") {
            text2.classList.toggle("transparent-black-text");
        }
    } else {
        text1.style.color = "#fcc942";
        text2.style.color = "white";

        if (text1.style.color === "white") {
            text1.classList.toggle("transparent-black-text");
        }
    }
}, 1000);
