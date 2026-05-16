const tagline = document.querySelector('.hero p');
const text = tagline.textContent;
tagline.textContent = '';

let i = 0;
function typeWriter() {
    if (i < text.length){
        tagline.textContent += text.charAt(i);
        i++;
        setTimeout(typeWriter, 50);

    }
}
window.onload = typeWriter;