// Gestion du dropdown menu dans la partie Admin

const dropdownLink = Array.from(document.querySelectorAll(".dropdown-link"));
const dropdownContent = Array.from(document.querySelectorAll(".dropdown-content"));

dropdownLink.forEach(link => {
    link.addEventListener('mouseenter', (e) => {
        for(let i = 0; i<dropdownLink.length; i++){
            if(dropdownLink[i] === e.target){
                dropdownContent[i].classList.add('active');
            }
        }
    })
})

dropdownContent.forEach(content => {
    content.addEventListener('mouseleave', (e)=> {
        for(let i = 0; i<dropdownContent.length; i++){
            dropdownContent[i].classList.remove('active');
        }
    })
})
