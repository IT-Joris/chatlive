const chatAppScroll = document.getElementById('chatAppScroll');
chatAppScroll.scrollTop = chatAppScroll.scrollHeight;

const chatApp = document.getElementById('chatApp');
const user_id = document.getElementById('user_id');
let template = ``;

window.Echo.private(`channel.1`)
    .listen('SendMessageEvent', (e) => {
        //chatApp
        if (e.message.user_id !== Number(user_id.value)) {
            template = `
                <div class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                    <div>
                        <div class="bg-gray-500 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">${e.message.content}</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">${new Date(e.message.created_at).toLocaleString()}</span>
                    </div>
                </div>
            `;
        }

        if (e.message.user_id === Number(user_id.value)) {
            template = `
                <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-500 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">${e.message.content}</p>
                        </div>
                        <span class="text-xs text-gray-500">${new Date(e.message.created_at).toLocaleString()}</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </div>
            `;
        }

        chatApp.insertAdjacentHTML('beforeend', template)
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
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.log(error));
});
