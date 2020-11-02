function mudarImgArquivo(tipo, elemento){
    alert('caRREGOU');
    switch (tipo) {
        case 'pdf':
            document.getElementById(elemento).src = 'images/pdf.jpg';
            break;
        case 'docx':
            document.getElementById(elemento).src = 'images/docx.jpg';
            break;
        case 'png':
            document.getElementById(elemento).src = 'images/image.png';
            break;
        case 'PNG':
            document.getElementById(elemento).src = 'images/image.png';
            break;
        case 'jpg':
            document.getElementById(elemento).src = 'images/image.png';
            break;
        case 'txt':
            document.getElementById(elemento).src = 'images/txt.png';
        default:
            document.getElementById(elemento).src = 'images/file.png';
            break;
    }
    return 0;
}