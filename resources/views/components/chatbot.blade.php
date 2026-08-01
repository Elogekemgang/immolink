<div id="chatbot-button"
     class="fixed bottom-6 right-6 w-16 h-16 rounded-full bg-blue-600 hover:bg-blue-700 text-white shadow-2xl cursor-pointer flex items-center justify-center z-50">

    💬

</div>

<div id="chatbot-window"
     class="hidden fixed bottom-28 right-6 w-[400px] h-[650px] bg-white rounded-3xl shadow-2xl overflow-hidden z-50 border">

    <div class="bg-blue-600 text-white p-5 flex justify-between items-center">

        <div>

            <h2 class="font-bold text-xl">

                Assistant ImmoLink

            </h2>

            <small>

                Alimenté par Groq AI

            </small>

        </div>

        <button id="close-chat">

            ✕

        </button>

    </div>

    <div id="chat-body"
         class="h-[470px] overflow-y-auto p-5 bg-gray-100">

        <div class="flex mb-4">

            <div class="bg-white rounded-2xl p-4 shadow max-w-[85%]">

                Bonjour 👋<br><br>

                Je suis l'assistant IA d'ImmoLink.

                Posez-moi vos questions concernant :

                <ul class="list-disc ml-5 mt-3">

                    <li>vos contrats</li>

                    <li>vos annonces</li>

                    <li>les litiges</li>

                    <li>les huissiers</li>

                    <li>la plateforme</li>

                </ul>

            </div>

        </div>

    </div>

    <div class="border-t p-4">

        <div class="flex gap-2">

            <input

                id="message"

                type="text"

                class="flex-1 border rounded-xl p-3"

                placeholder="Posez votre question...">

            <button

                id="send"

                class="bg-blue-600 hover:bg-blue-700 text-white px-5 rounded-xl">

                Envoyer

            </button>

        </div>

    </div>

</div>

<script>

const button=document.getElementById('chatbot-button');

const windowChat=document.getElementById('chatbot-window');

const close=document.getElementById('close-chat');

button.onclick=()=>{

windowChat.classList.remove('hidden');

}

close.onclick=()=>{

windowChat.classList.add('hidden');

}

function appendMessage(message,type){

let body=document.getElementById('chat-body');

let div=document.createElement('div');

div.className=type=="user"
?"flex justify-end mb-4"
:"flex mb-4";

div.innerHTML=type=="user"

?`<div class="bg-blue-600 text-white rounded-2xl p-4 max-w-[80%]">${message}</div>`

:`<div class="bg-white rounded-2xl p-4 shadow max-w-[80%]">${message}</div>`;

body.appendChild(div);

body.scrollTop=body.scrollHeight;

}

document.getElementById('send').onclick=sendMessage;

document.getElementById('message').addEventListener("keypress",function(e){

if(e.key==="Enter"){

sendMessage();

}

});

function sendMessage(){

let input=document.getElementById('message');

let text=input.value.trim();

if(text=="")return;

appendMessage(text,"user");

input.value="";

appendMessage("⏳ ImmoBot réfléchit...","bot");

fetch("{{ route('assistant.chat') }}",{

method:"POST",

headers:{

"Content-Type":"application/json",

"X-CSRF-TOKEN":"{{ csrf_token() }}"

},

body:JSON.stringify({

message:text

})

})

.then(res=>res.json())

.then(data=>{

let body=document.getElementById('chat-body');

body.removeChild(body.lastChild);

appendMessage(data.reply,"bot");

})

.catch(()=>{

let body=document.getElementById('chat-body');

body.removeChild(body.lastChild);

appendMessage("Erreur de connexion avec le serveur.","bot");

});

}

</script>