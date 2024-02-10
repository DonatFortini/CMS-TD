document.addEventListener('wheel', (e) => {
    e.preventDefault();
    const scrollDirection = e.deltaY > 0 ? 'down' : 'up';
    const sections = document.querySelectorAll('[id^="section-"]');
    const currentSection = Array.from(sections).find((section) => section.classList.contains('active'));
    const idNum = Number(currentSection.id.split('-')[1]);
    let nextSection = null;
    if (scrollDirection === "down" && idNum !== sections.length - 1) {
        nextSection = document.querySelector(`#section-${idNum + 1}`);
    } else if (scrollDirection === "up" && idNum !== 0) {
        nextSection = document.querySelector(`#section-${idNum - 1}`);
    }
    if (nextSection) {
        nextSection.classList.add('active');
        currentSection.classList.remove('active');
        nextSection.scrollIntoView({ behavior: 'smooth' });
    }
});
