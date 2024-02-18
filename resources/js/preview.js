const navbarSelector = document.querySelector('#navbar-select');
const mainSelector = document.querySelector('#main-select');
const footerSelector = document.querySelector('#footer-select');
const colorPicker = document.querySelector('#color-picker');
const fontSelector = document.querySelector('#font-select');
const fontColorPicker = document.querySelector('#font-color-picker');
const auteurs = document.querySelectorAll('#auteur');
const descriptions1 = document.querySelectorAll('#description1');
const descriptions2 = document.querySelectorAll('#description2');
const formDescription1 = document.getElementById('formDescription1');
const formDescription2 = document.getElementById('formDescription2');
const formAuteur = document.getElementById('formAuteur');
const logo = document.querySelector('#playground #Logo');
const siteNameInput = document.querySelector('#siteNameBar');
const final= document.querySelector('#finalisation');

siteNameInput.addEventListener('blur', () => {
    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("width", "200");
    svg.setAttribute("height", "100");
    svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");
    svg.setAttribute("xmlns:xlink", "http://www.w3.org/1999/xlink");
    svg.setAttribute("version", "1.1");
    const text = document.createElementNS("http://www.w3.org/2000/svg", "text");
    text.setAttribute("x", "10");
    text.setAttribute("y", "50");
    text.setAttribute("font-size", "20");
    text.setAttribute("font-family", "SixtyFour");
    text.textContent = siteNameInput.value || "Nom du site";
    svg.appendChild(text);
    while (logo.firstChild) {
        logo.removeChild(logo.firstChild);
    }
    logo.appendChild(svg);
});


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
    if (navMain.querySelector('#nav-content')) navMain.querySelector('#nav-content').style.backgroundColor = chromaValue;
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

fontSelector.addEventListener('change', () => {
    const selectedValue = fontSelector.value;
    const main = document.querySelector('#playground main');
    main.style.fontFamily = selectedValue;
});

fontColorPicker.addEventListener('input', () => {
    const selectedValue = fontColorPicker.value;
    const main = document.querySelector('#playground main');
    main.style.color = selectedValue;
});


[...auteurs, ...descriptions1, ...descriptions2].forEach((element) => {
    element.addEventListener('click', () => { console.log("aa"); makeEditable(element) });
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

const makeEditable = (element) => {
    element.setAttribute('contenteditable', 'true');
    element.style.border = '1px solid red';
    element.focus();
    element.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            element.setAttribute('contenteditable', 'false');
            element.style.border = 'none';
            verifyContent(element);
            const formField = "form" + element.id.charAt(0).toUpperCase() + element.id.slice(1);
            updateFormValue(element, formField);
        }
    });
};

function verifyContent(element) {
    if (element.textContent === "") {
        element.textContent = "Cliquez pour éditer";
    }
}

const updateFormValue = (element, formField) => {
    const formInput = document.getElementById(formField);
    if (element && !element.textContent.trim().startsWith('Lorem ipsum')) {
        formInput.value = element.textContent.trim();
    } else {
        formInput.value = null;
    }
    console.log(formDescription1, formDescription2, formAuteur);
};






