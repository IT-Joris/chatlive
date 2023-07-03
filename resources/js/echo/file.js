window.Echo.private(`upload-file`)
    .listen('FileEvent', (e) => {
        document.getElementById('toast').insertAdjacentHTML('beforeend', e.html);
    });
