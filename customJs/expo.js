const form = document.querySelector('#contactForm');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = {};
    const inputs = [...e.target.elements];
    inputs.forEach(input => {
        if (input.name)
            data[input.name] = input.value;
    })
    sendData(data);
})

const xhr = new XMLHttpRequest();

function sendData(formData) {
    showStatus('INFO', 'Registering...')
    xhr.open('POST', '/php/expo.php', true);
    xhr.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
    xhr.send(JSON.stringify(formData))
}

xhr.onload = function () {
    const { success, message } = JSON.parse(this.responseText);
    if (success) {
        showStatus('SUCCESS', message)
        window.location.href = 'https://padhhigh.com';
    }
    else
        showStatus('FAILED', message);
}

function showStatus(status, message) {
    const color = {
        'INFO': '#2196F3',
        'FAILED': '#f44336',
        'SUCCESS': '#4CAF50'
    }
    const el = document.querySelector('#status');
    el.innerHTML = `<span style="color:${color[status]}">${message}</span>`;
}