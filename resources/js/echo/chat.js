const chatAppScroll = document.getElementById('chatAppScroll');
chatAppScroll.scrollTop = chatAppScroll.scrollHeight;

const chatApp = document.getElementById('chatApp');
const user_id = document.getElementById('user_id');

window.Echo.private(`channel.1`)
    .listen('SendMessageEvent', (e) => {

        if (e.user.id === Number(user_id.value)) {
            chatApp.insertAdjacentHTML('beforeend', e.html.author)
        }

        if (e.user.id !== Number(user_id.value)) {
            chatApp.insertAdjacentHTML('beforeend', e.html.other)
        }

        document.getElementById('content').value = '';
        chatAppScroll.scrollTop = chatAppScroll.scrollHeight;
    });

const form = document.getElementById('form-chat');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const message = document.getElementById('content');
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let data = {
        content: message.value,
        user_id: user_id.value,
        _token: token
    };

    fetch("/api/send-message", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    })
        .catch(error => console.log(error));
});
