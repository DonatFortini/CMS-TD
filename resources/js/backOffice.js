// display pages

const features = [
    { button: document.querySelector('#stats'), sectionIndex: 0 },
    { button: document.querySelector('#create'), sectionIndex: 1 },
    { button: document.querySelector('#comments'), sectionIndex: 2 },
    { button: document.querySelector('#pages'), sectionIndex: 3 }
];

const sections = document.querySelectorAll('[id^="section-"]');

features.forEach(feature => {
    feature.button.addEventListener('click', function () {
        const active = findActiveFeature();
        if (active != feature.button) {
            active.classList.remove('active');
            feature.button.classList.add('active');
            findActiveSection().classList.add('hidden');
            sections[feature.sectionIndex].classList.remove('hidden');
            sections[feature.sectionIndex].classList.add('flex');
        }
    });
});

function findActiveSection() {
    let active;
    sections.forEach(section => {
        active = (!section.classList.contains('hidden')) ? section : active;
    });
    return active;
}

function findActiveFeature() {
    return document.querySelector('.active');
}

// drag and drop blocks section 2

const listItems = document.querySelectorAll('#listeBlocks li');
const playground = document.querySelector('#playground');

listItems.forEach(item => {
    item.setAttribute('draggable', true);
    item.addEventListener('dragstart', function (event) {
        event.dataTransfer.setData('text/plain', event.target.id);
    });
});

playground.addEventListener('dragover', function (event) {
    event.preventDefault();
    console.log('dragover');
});

playground.addEventListener('drop', function (event) {
    event.preventDefault();
    const itemId = event.dataTransfer.getData('text/plain');
    console.log(itemId);
    if (event.target === playground) {
        create(itemId);
    }
});

function create(itemId) {
    console.log(itemId);
}

////// section 3


const comments = document.querySelectorAll('.comment-box p');
const bannedWords = ['enculé', 'batard', 'fils de pute', 'connard', 'salope', 'pute', 'merde', 'nique ta mère', 'nique ta mere'];

comments.forEach(comment => {
    bannedWords.forEach(word => {
        const regex = new RegExp(`\\b${word}\\b`, 'gi');
        if (regex.test(comment.textContent)) {
            const replacedText = comment.textContent.replace(regex, `<span class="bg-red-500">${word}</span>`);
            comment.innerHTML = replacedText;
        }
    });
});

const searchBar = document.querySelector('#searchBar');
const searchButton = document.querySelector('#searchButton');

searchButton.addEventListener('click', function () {
    const searchValue = searchBar.value.trim().toLowerCase();
    comments.forEach(comment => {
        const commentText = comment.textContent.toLowerCase();
        if (commentText.includes(searchValue)) {
            comment.parentElement.parentElement.classList.remove('hidden');
        } else {
            comment.parentElement.parentElement.classList.add('hidden');
        }
    });
});
