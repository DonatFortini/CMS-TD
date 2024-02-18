// display pages

const features = [
    { button: document.querySelector('#create'), sectionIndex: 0 },
    { button: document.querySelector('#comments'), sectionIndex: 1 },
];

const defaultBlockHeights = {
    'text_zone': 200,
    'image': 200,
    'titre': 100,
    'sous_titre': 80,
    'form': 450,
    'contact': 400
};


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


playground.addEventListener('dragover', function(event) {
    event.preventDefault();
});

playground.addEventListener('drop', function(event) {
    console.log('Drop détecté');
    event.preventDefault();

    const urlParams = new URLSearchParams(window.location.search);
    const pageId = urlParams.get('page').replace('page_', '');
    const itemId = event.dataTransfer.getData('Text');
    const itemType = document.getElementById(itemId).getAttribute('data-type');
    const newLi = document.createElement('li');
    newLi.setAttribute('data-type', itemType);
    newLi.id = `block_${new Date().getTime()}`;
    newLi.classList.add('flex-col', 'bg-slate-300', 'border-2', 'border-black', 'm-5', 'rounded-3xl');
    newLi.style.height = defaultBlockHeights[itemType] + 'px';
    console.log(itemId, itemType, pageId)
    fetch(`/get-block-content/${itemType}/${pageId}`)
        .then(response => response.text())
        .then(html => {
            newLi.innerHTML = html;
            addResizeFunctionality(newLi);
            blocksDisposition.appendChild(newLi);
        })
        .catch(error => console.error('Erreur lors de la récupération du contenu du bloc :', error));
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

document.addEventListener('DOMContentLoaded', () => {
    const pageItems = document.querySelectorAll('#liste_page li');
    const urlParams = new URLSearchParams(window.location.search);
    const pageId = urlParams.get('page');

    pageItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            window.history.pushState({}, '', '?page=' + this.id.replace('page_', ''));
            highlightSelectedItem(this);
        });

        if (item.id === pageId) {
            highlightSelectedItem(item);
        }
    });

    function highlightSelectedItem(item) {
        pageItems.forEach(it => it.classList.remove('bg-purple-500', 'text-white'));
        item.classList.add('bg-purple-500', 'text-white');
    }
});

document.getElementById('openAddPageModal').addEventListener('click', function () {
    document.getElementById('addPageModal').classList.remove('hidden');
});


document.getElementById('addBlocs').addEventListener('click', function() {
    const storeUrl = this.getAttribute('data-store-url');
    const pageId = this.getAttribute('data-page-id');
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const blocks = [];
    document.querySelectorAll('#disposition_page li').forEach((li, index) => {
        const blockHeight = li.offsetHeight;
        blocks.push({
            type: li.getAttribute('data-type'),
            order: index + 1,
            height: blockHeight
        });
   });
    console.log(blocks)
    fetch(storeUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify({
            blocks: blocks,
            idPage: pageId
        })
    }).then(response => {
        if (response.ok) {
            alert('Blocs enregistrés avec succès!');
        } else {
            alert(response.statusText);
            alert('Erreur lors de l\'enregistrement des blocs');
        }
    });
});
function addResizeFunctionality(li) {
    const resizeHandle = document.createElement('div');
    resizeHandle.classList.add('resize-handle');
    li.appendChild(resizeHandle);

    let startY, startHeight;

    resizeHandle.addEventListener('mousedown', function(e) {
        startY = e.clientY;
        startHeight = parseInt(document.defaultView.getComputedStyle(li).height, 10);
        document.documentElement.addEventListener('mousemove', doDrag, false);
        document.documentElement.addEventListener('mouseup', stopDrag, false);
        e.preventDefault();
    });

    function doDrag(e) {
        const newHeight = startHeight + e.clientY - startY;
        li.style.height = newHeight + 'px';

        const contentDivs = li.querySelectorAll('div.content');
        contentDivs.forEach(div => {
            div.style.height = '100%';
        });

        if (newHeight + li.getBoundingClientRect().top > window.innerHeight) {
            li.scrollIntoView({ behavior: 'smooth', block: 'end' });
        }
    }

    function stopDrag() {
        document.documentElement.removeEventListener('mousemove', doDrag, false); 
        document.documentElement.removeEventListener('mouseup', stopDrag, false);
    }
}

document.querySelectorAll('#disposition_page li').forEach(li => {
    addResizeFunctionality(li);
});

