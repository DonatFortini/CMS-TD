document.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('[id^="section-"]');
    const currentSection = Array.from(sections).find((section) => {
        const rect = section.getBoundingClientRect();
        return rect.top <= 0 && rect.bottom > 0;
    });

    if (currentSection) {
        const idNum = Number(currentSection.id.split('-')[1]);
        console.log(idNum);
        const nextSection = (idNum < sections.length - 1) ? document.querySelector(`#section-${idNum + 1}`) : null;
        const previousSection = (idNum !== 0) ? document.querySelector(`#section-${idNum - 1}`) : null;
        // console.log(previousSection, currentSection, nextSection);
        if (window.scrollY < currentSection.offsetTop && previousSection) {
            previousSection.scrollIntoView({ behavior: 'smooth' });
        } else if (window.scrollY > currentSection.offsetTop && nextSection) {
            nextSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
