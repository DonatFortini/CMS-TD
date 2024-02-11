const navbarSelector = document.getElementById('navbar-select');
const mainSelector = document.getElementById('main-select');
const footerSelector = document.getElementById('footer-select');
const colorPicker = document.getElementById('color-picker');

document.addEventListener('DOMContentLoaded', () => {
    const url = new URL(window.location.href);
    const navbar = url.searchParams.get('navbar');
    document.querySelector('#orientation').classList = (navbar === "vertical") ? "flex" : "flex-col";
});


navbarSelector.addEventListener('change', () => {
    const selectedValue = navbarSelector.value;
    const url = new URL(window.location.href);
    url.searchParams.set('navbar', selectedValue);
    window.location.href = url.toString();
});

mainSelector.addEventListener('change', () => {
    const selectedValue = mainSelector.value;
    const url = new URL(window.location.href);
    url.searchParams.set('main', selectedValue);
    window.location.href = url.toString();
});

footerSelector.addEventListener('change', () => {
    const selectedValue = footerSelector.value;
    const url = new URL(window.location.href);
    url.searchParams.set('footer', selectedValue);
    window.location.href = url.toString();
});

colorPicker.addEventListener('input', () => {
    const selectedValue = colorPicker.value;
    const navMain = document.querySelector('#playground nav');
    const main = document.querySelector('#playground main');
    const footer = document.querySelector('#playground footer');

    main.style.backgroundColor = selectedValue;
    const chromaValue = darkenColor(selectedValue, 20);
    const chromaValue2 = darkenColor(selectedValue, 30);
    navMain.style.backgroundColor = chromaValue;
    footer.style.backgroundColor = chromaValue2;


    const textColor = getReadableTextColor(selectedValue);
    navMain.style.color = textColor;
    main.style.color = textColor;
    footer.style.color = textColor;
    const divs = document.querySelectorAll('#playground main div');
    divs.forEach((div) => {
        if (div.classList.contains('bg-white')) {
            div.style.color = 'black';
        }
    });

});

function darkenColor(color, amount) {
    const parsedColor = parseColor(color);
    const darkerRed = Math.max(parsedColor.red - amount, 0);
    const darkerGreen = Math.max(parsedColor.green - amount, 0);
    const darkerBlue = Math.max(parsedColor.blue - amount, 0);
    return `rgb(${darkerRed}, ${darkerGreen}, ${darkerBlue})`;
}

function parseColor(color) {
    const sanitizedColor = color.replace('#', '');
    const red = parseInt(sanitizedColor.substr(0, 2), 16);
    const green = parseInt(sanitizedColor.substr(2, 2), 16);
    const blue = parseInt(sanitizedColor.substr(4, 2), 16);
    return {
        red,
        green,
        blue
    };
}


function getReadableTextColor(backgroundColor) {
    const parsedColor = parseColor(backgroundColor);
    const brightness = parsedColor.red * 0.299 + parsedColor.green * 0.587 + parsedColor.blue * 0.114;
    return brightness > 186 ? 'black' : 'white';
}







