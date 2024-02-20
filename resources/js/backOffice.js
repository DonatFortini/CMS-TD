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
        const active = document.querySelector('.active');
        if (active !== feature.button) {
            active?.classList.remove('active');
            feature.button.classList.add('active');
            findActiveSection()?.classList.replace('flex', 'hidden');
            sections[feature.sectionIndex]?.classList.replace('hidden', 'flex');
        }
    });
});

function findActiveSection() {
    return Array.from(sections).find(section => !section.classList.contains('hidden'));
}

document.getElementById('openAddPageModal').addEventListener('click', function () {
    document.getElementById('addPageModal').classList.remove('hidden');
});

document.getElementById('addBlocs').addEventListener('click', function () {
    const storeUrl = this.getAttribute('data-store-url');
    const pageId = this.getAttribute('data-page-id');
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const blocks = Array.from(document.querySelectorAll('#disposition_page li')).map((li, index) => {
        const blockType = li.getAttribute('data-type');
        let blockContent = '';
        if (blockType === 'image') {
            const imageSelect = li.querySelector('.image-select-dropdown');
            blockContent = imageSelect ? imageSelect.value : '';
        }

        if ( blockType === 'sous_titre' || blockType === 'titre' || blockType === 'text_zone') {
            const textArea = li.querySelector('.textarea');
            blockContent = textArea ? textArea.textContent : '';
        }
        return {
            type: blockType,
            order: index + 1,
            height: li.offsetHeight,
            contenu: blockContent
        };
    });
    fetch(storeUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify({ blocks, idPage: pageId })
    }).then(response => {
        if (response.ok) {
            alert('Blocks saved successfully!');
        } else {
            alert(response.statusText);
            alert('Error saving blocks');
        }
    });
});

function addResizeFunctionality(li) {
    const resizeHandle = document.createElement('div');
    resizeHandle.classList.add('resize-handle');
    li.appendChild(resizeHandle);
    let startY, startHeight;

    resizeHandle.addEventListener('mousedown', function (e) {
        startY = e.clientY;
        startHeight = parseInt(document.defaultView.getComputedStyle(li).height, 10);
        document.documentElement.addEventListener('mousemove', doDrag, false);
        document.documentElement.addEventListener('mouseup', stopDrag, false);
        e.preventDefault();
    });

    function doDrag(e) {
        const newHeight = startHeight + e.clientY - startY;
        li.style.height = `${newHeight}px`;
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

function setUp() {
    const blocks = document.querySelectorAll('#disposition_page li');
    let counter = 1;
    blocks.forEach(block => {
        addResizeFunctionality(block);
        block.id = `bloc_${counter}`;
        counter++;
    });
}

//// section 1

const blockTypeList = document.querySelectorAll('#listeBlocks li');
const playground = document.querySelector('#playground');
const blocksDisposition = document.querySelector('#disposition_page');
const blocklist = document.querySelectorAll('#disposition_page li');
const pages = document.querySelectorAll('[id^="page_"]');
const deleteButtons = document.querySelectorAll('[id^="deletebloc_"]');

pages.forEach(page => {
    page.addEventListener('click', () => {
        const url = new URL(window.location.href);
        url.searchParams.set('page', page.id);
        window.location.href = url.toString();
    });
});

blockTypeList.forEach(item => {
    item.setAttribute('draggable', true);
    item.addEventListener('dragstart', function (event) {
        event.dataTransfer.setData('Text', item.id);
    });
});

blocklist.forEach(bloc => {
    bloc.setAttribute('draggable', true);
    bloc.addEventListener('dragstart', function (event) {
        event.dataTransfer.setData('Text', bloc.id);
    });
});

playground.addEventListener('dragover', function (event) {
    event.preventDefault();
});

playground.addEventListener('drop', function (event) {
    const data = event.dataTransfer.getData('Text');
    
    if (!data.includes('bloc')) {
        event.preventDefault();
        const pageId = (new URLSearchParams(window.location.search)).get('page').replace('page_', '');
        const itemType = document.getElementById(data).getAttribute('data-type');
        
        const newLi = document.createElement('li');
        newLi.setAttribute('data-type', itemType);
        newLi.setAttribute('draggable', true);
        newLi.id = `block_${new Date().getTime()}`;
        newLi.classList.add('flex-col', 'bg-slate-300', 'border-2', 'border-black', 'm-5', 'rounded-3xl');
        newLi.style.height = `${defaultBlockHeights[itemType]}px`;
        
        const container = document.createElement('div');
        container.classList.add('flex', 'justify-between', 'p-2');
        
        const deleteButton = document.createElement('button');
        deleteButton.classList.add('bg-slate-400', 'rounded-3xl', 'hover:bg-red-500', 'hover:text-white', 'transition', 'duration-400', 'inline-block');
        
        const deleteIcon = document.createElement('img');
        deleteIcon.src = '/assets/trash.svg';
        deleteIcon.classList.add('w-7', 'h-7');
        
        const label = document.createElement('label');
        label.textContent = "Type " + itemType;
        label.classList.add('bg-slate-400', 'inline-block');
        
        const div = document.createElement('div');
    
        deleteButton.appendChild(deleteIcon);
        container.appendChild(deleteButton);
        container.appendChild(label);
        newLi.appendChild(container);
        
        fetch(`/get-block-content/${itemType}/${pageId}`)
            .then(response => response.text())
            .then(html => {
                div.innerHTML = html;
                newLi.appendChild(div);
                addResizeFunctionality(newLi);
                blocksDisposition.appendChild(newLi);
            })
            .catch(error => console.error('Error fetching block content:', error));
    } else {
        const item = document.getElementById(data);
        const dropPosition = event.target.closest('li');
        blocksDisposition.insertBefore(item, dropPosition.nextSibling);
    }
    
    setUp();
});

deleteButtons.forEach(button => {
    button.addEventListener('click', function () {
        const num= this.id.split('_')[1];
        const bloc = document.querySelector(`#bloc_${num}`);
        bloc.remove();
    });
});

//// section 2

const bannedWords = ['enculé', 'batard', 'fils de pute', 'connard', 'salope', 'pute', 'merde', 'nique ta mère', 'nique ta mere'];
const comments = document.querySelectorAll('.comment-box p');

comments.forEach(comment => {
    bannedWords.forEach(word => {
        const regex = new RegExp(`\\b${word}\\b`, 'gi');
        if (regex.test(comment.textContent)) {
            const replacedText = comment.innerHTML.replace(regex, `<span class="bg-red-500">${word}</span>`);
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
        const parentElement = comment.closest('.comment-box');
        if (commentText.includes(searchValue)) {
            parentElement.classList.remove('hidden');
        } else {
            parentElement.classList.add('hidden');
        }
    });
});

