(function () {
    const openUrls = () => {    
        const pathname = window.location.pathname;
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        urlParams.append('c', 'item');
        urlParams.append('a','current');

        urlParams.ge

        fetch(`${pathname}?${urlParams.toString()}`)
            .then(response => response.json())
            .then(urls => urls.forEach(element => {
                window.open(element, '_blank');
            }));
    };

    document.addEventListener("DOMContentLoaded", (event) => {
        const button = document.getElementById('newTab');
        button.addEventListener('click', () => openUrls());
    });
}());
