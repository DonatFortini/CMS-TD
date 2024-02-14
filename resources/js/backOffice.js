// display pages

const features = [
    { button: document.querySelector('#create'), sectionIndex: 0 },
    { button: document.querySelector('#comments'), sectionIndex: 1 },
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

// drag and drop blocks section 1

const listBlocks = document.querySelectorAll('#listeBlocks li');
const playground = document.querySelector('#playground');
const pages = document.querySelectorAll('[id^="page_"]');
const blocksDisposition = document.querySelector('#disposition_page');
let dropPosition = null;

pages.forEach(page => {
    page.addEventListener('click', () => {
        const url = new URL(window.location.href);
        url.searchParams.set('page', page.id);
        window.location.href = url.toString();
    });
});

listBlocks.forEach(item => {
    item.setAttribute('draggable', true);
    item.addEventListener('dragstart', function (event) {
        event.dataTransfer.setData('Text', item.id);
    });
});

playground.addEventListener('dragover', function (event) {
    event.preventDefault();
    const rect = playground.getBoundingClientRect();
    const mouseY = event.clientY - rect.top;
    const itemHeight = 75;
    dropPosition = Math.floor(mouseY / itemHeight);
});

playground.addEventListener('drop', function (event) {
    event.preventDefault();
    const itemId = event.dataTransfer.getData('Text');
    const newLi = document.createElement('li');
    newLi.id = `block_`;
    newLi.classList.add('flex-col', 'bg-slate-300', 'border-2', 'border-black', 'm-5', 'rounded-3xl');
    newLi.style.minHeight = '75px';
    newLi.innerHTML = `
        <div class="flex justify-between p-2 cursor-grab">
            <button class="bg-slate-400 rounded-3xl hover:bg-red-500 hover:text-white transition duration-400 inline-block">
                <img src="{{ asset('assets/trash.svg') }}" class="w-7 h-7">
            </button>
            <label for="name" class="bg-slate-400 inline-block">Type ${itemId}</label>
        </div>
        @yield(${itemId})
    `;
    blocksDisposition.appendChild(newLi);
});


// TODO finir la feature
// blocksDisposition.forEach(block => {
//     block.setAttribute('draggable', true);
//     block.addEventListener('dragstart', function (event) {
//         event.dataTransfer.setData('Text', block.id);
//     });

//     block.addEventListener('dragover', function (event) {
//         event.preventDefault();
//         const rect = block.getBoundingClientRect();
//         const mouseY = event.clientY - rect.top;
//         const itemHeight = 75;
//         dropPosition = Math.floor(mouseY / itemHeight);
//     });

//     block.addEventListener('drop', function (event) {
//         event.preventDefault();
        
//     });
        

// });


////// section 2


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
