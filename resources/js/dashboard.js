const siteModal=document.querySelector('#siteModal');
const newSiteBut= document.querySelector('#newSiteBut');
const modalClose= document.querySelector('#modalClose');
const siteForm= document.querySelector('#siteForm');

newSiteBut.addEventListener('click', ()=>{siteModal.style.display = "block";});
modalClose.addEventListener('click', ()=>{siteModal.style.display = "none"});
siteForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    const websiteName = document.querySelector("#website_name").value;
    if(websiteName.trim() != "") e.target.submit();
    else alert("Un nom de site est requis!");
});
