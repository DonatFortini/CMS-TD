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

// drag and drop blocks

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