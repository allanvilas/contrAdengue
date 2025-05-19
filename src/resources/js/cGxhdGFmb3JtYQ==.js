
const map = L.map('mod-manager-map').setView([-14.736128, -49.962185], 4
);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

let facts = JSON.parse(localStorage.getItem('facts') || '[]');
facts.forEach(fact => addFactToMap(fact));

function addFactToMap(fact) {
    const { latitude, longitude } = fact;
    L.circle([latitude, longitude], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 150000
    })
        .addTo(map)
        .bindPopup(`Ocorrência: ${fact.description}`);
}

const geoRandomnessCheckbox = document.getElementById('geo_randomness');
const geoRandomnessLabel = document.getElementById('geo_randomness_label');
const geoInputFields = document.getElementById('geoInputFields');

// Módulos
const btnCitzenOption = document.getElementById('mod-citzen-button');
const btnACSOption = document.getElementById('mod-acs-button');
const btnACEOption = document.getElementById('mod-ace-button');
const btnManagerOption = document.getElementById('mod-manager-button');

const enabledModules = [btnCitzenOption, btnACEOption, btnManagerOption];

document.getElementById('mod-manager-map').hidden = document.getElementById('mod-manager').hidden;

// Adiciona evento de clique para cada botão
enabledModules.forEach((btn) => {
    btn.addEventListener('click', function () {
        // Remove a classe 'activated' de todos os botões
        enabledModules.forEach((btn) => {
            btn.classList.remove('activated');
            document.getElementById(btn.id.replace('-button', '')).hidden = true;

        });

        // Adiciona a classe 'activated' ao botão clicado
        this.classList.add('activated');
        document.getElementById(this.id.replace('-button', '')).hidden = false;

        document.getElementById('mod-manager-map').hidden = document.getElementById('mod-manager').hidden;

        // if (document.getElementById('mod-manager').hidden) {
        //     document.getElementById('mod-manager-map').classList.add('hidden');
        // } else {
        //     document.getElementById('mod-manager-map').classList.remove('hidden');
        // }

    });
});

geoRandomnessLabel.addEventListener("click", function () {
    toggleGeoRandomness();
});

function toggleGeoRandomness() {

    if (geoRandomnessCheckbox.checked) {
        geoRandomnessLabel.classList.remove('bg-blue-600');
        //geoRandomnessLabel.classList.remove('hover:bg-blue-700');
        geoInputFields.classList.remove('hidden');
    } else {
        geoRandomnessLabel.classList.add('bg-blue-600');
        //geoRandomnessLabel.classList.add('hover:bg-blue-700');
        geoInputFields.classList.add('hidden');
    }

    geoRandomnessCheckbox.checked = !geoRandomnessCheckbox.checked;
}

function gerarCoordenadaBrasil() {
    // Limites geográficos aproximados (centro ao litoral leste)
    const LAT_MIN = -25.0;
    const LAT_MAX = -5.0;
    const LNG_MIN = -60.0;
    const LNG_MAX = -35.0;

    const latitude = (Math.random() * (LAT_MAX - LAT_MIN)) + LAT_MIN;
    const longitude = (Math.random() * (LNG_MAX - LNG_MIN)) + LNG_MIN;

    return {
        latitude: parseFloat(latitude.toFixed(6)),
        longitude: parseFloat(longitude.toFixed(6))
    };
}


class Fact {
    constructor(option, description, picture, latitude = null, longitude = null, id = null, address = null) {
        this.option = option;
        this.description = description;
        this.picture = picture;
        this.address = null;

        if (id) {
            this.id = id;
        } else {
            let preId = `${Math.floor(Math.random() * 100000000000)}+${Date.now()}`;
            preId = btoa(unescape(encodeURIComponent(preId)));
            this.id = preId;
        }

        if (address) {
            this.address = address;
        }

        if (latitude && longitude) {
            this.latitude = latitude;
            this.longitude = longitude;
        } else {
            // Se checkbox está marcado, gera coordenadas aleatórias
            if (typeof geoRandomnessCheckbox !== 'undefined' && geoRandomnessCheckbox.checked || geoRandomnessCheckbox === true || (longitude === null && latitude === null)) {
                const coord = gerarCoordenadaBrasil();
                this.latitude = coord.latitude;
                this.longitude = coord.longitude;
            } else {
                // Usa os valores fornecidos ou pega do DOM
                this.latitude = latitude ?? parseFloat(document.querySelector('input[name="fact.latitude"]').value);
                this.longitude = longitude ?? parseFloat(document.querySelector('input[name="fact.longitude"]').value);
            }
        }
    }

    async fetchAddress() {
        const url = `https://nominatim.openstreetmap.org/reverse?lat=${this.latitude}&lon=${this.longitude}&format=json`;
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'User-Agent': 'ContrADengue/0.1 (allanvilasdeveloper@gmail.com)'
            }
        });
        const data = await response.json();
        this.address = data.address;
    }

    toString() {
        return `Option: ${this.option}, Description: ${this.description}, Picture: ${this.picture}, Latitude: ${this.latitude}, Longitude: ${this.longitude}`;
    }

    toJSON() {
        return {
            option: this.option,
            description: this.description,
            picture: this.picture,
            latitude: this.latitude,
            longitude: this.longitude,
            id: this.id
        };
    }

    static fromJSON(json) {
        return new Fact(json.option, json.description, json.picture, json.latitude, json.longitude, json.id);
    }

    free() {
        removerOcorrencia(this.id);
    }
}

function removerOcorrencia(id) {
    // Atualiza o localStorage
    const facts = JSON.parse(localStorage.getItem('facts') || '[]');
    const updatedFacts = facts.filter(f => f.id !== id);
    localStorage.setItem('facts', JSON.stringify(updatedFacts));

    // Remove da DOM
    const card = document.getElementById(`fact-${id}`);
    if (card) card.remove();
}

const optionsTransalte = {
    foco_de_dengue: "🦟 Foco de Dengue",
    sintomas: "🤒 Sintomas",
    outros: "📝 Outros"
};

const imgPlaceholder = [
    "../resources/img/focos_dengue/foco_dengue_1.webp",
    "../resources/img/focos_dengue/foco_dengue_2.webp",
    "../resources/img/focos_dengue/foco_dengue_3.webp",
]

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('mod-citzen-fact-form');
    const btnAddFact = document.getElementById('mod-citzen-addfact');
    const factList = document.getElementById('mod-citzen');

    // Carregar fatos salvos ao iniciar
    const savedFacts = JSON.parse(localStorage.getItem('facts') || '[]');
    savedFacts.forEach(data => {
        const fact = new Fact(data.option, data.description, data.picture, data.latitude, data.longitude, data.id || null, data.address || null);

        addFactCard(fact);
    });

    // Interceptar o envio do formulário
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // impede o envio
    });

    btnAddFact.addEventListener('click', function () {
        //console.log("Formulário enviado!");
        const option = form.querySelector('select[name="fact.option"]').value;
        const description = form.querySelector('textarea[name="fact.description"]').value;
        const picture = form.querySelector('input[name="fact.picture"]').value; // Apenas nome, pois não há upload real

        let fact = new Fact(option, description, picture);
        fact.fetchAddress();

        sleep(1000).then(() => {
            console.log(fact);
        });

        // Armazenar no localStorage
        const facts = JSON.parse(localStorage.getItem('facts') || '[]');
        facts.push(fact);

        // Adiciona o novo fato ao mapa
        addFactToMap(fact);

        // Adiciona o novo fato ao localStorage
        localStorage.setItem('facts', JSON.stringify(facts));

        // fecha formulário
        form.classList.add('hidden')
        //form.reset();

        // Adicionar card visualmente
        // Dá um pequeno delay para garantir que o DOM "percebeu" o novo item
        let newFact = addFactCard(fact);
        setTimeout(() => {
            newFact.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 200);
    });

    function addFactCard(fact) {
        const div = document.createElement('div');

        div.id = `fact-${fact.id}`;

        div.className = "relative";

        div.innerHTML = `
                    <div class=" bg-surface rounded-xl shadow-md flex flex-wrap gap-4 mb-4 hover:ring-4 hover:ring-blue-300/20 transition duration-300"> 
                        <div class="basis-7/12 flex flex-col gap-4 justify-start">
                            <div class="basis-full bg-linear-215 from-blue-400 via-violet-500 to-blue-700 px-6 mb-2 rounded-tl-xl rounded-br-full max-h-16 ring-4 ring-blue-300/20 shadow-xl shadow-indigo-500/50">
                                <h3 class="text-sm text-blue-200 text-shadow-2xs text-shadow-amber-800">Ocorrência</h3>
                                <h4 class="sm:text-3xl text-lg text-blue-100 text-shadow-2xs text-shadow-amber-800">${optionsTransalte[fact.option]}</h4>
                            </div>
                            <div class="basis-7/12 flex flex-col gap-4 justify-between ml-6 ml-6">
                                <div><p>Descrição: ${fact.description}</p></div>
                                <div>
                                    <p>📍 Geolocalização: Latitude: <span class="bg-amber-400 font-semibold text-amber-950 rounded-md px-1 ">${fact.latitude}</span>, Longitude: <span class="bg-rose-400 font-semibold text-rose-950 rounded-md px-1 ">${fact.longitude}</span></p>
                                    <p>📅 Data: ${new Date().toISOString().split('T')[0]}</p>
                                </div>
                            </div>
                        </div>
                        <div class="basis-4/12 flex justify-center items-center">
                            <img class="my-8 rounded-xl h-48 w-96 object-cover" src="${imgPlaceholder[Math.floor(Math.random() * 3)]}" alt="Imagem da Ocorrência">
                        </div>
                        <span onclick="document.getElementById('accept-fact-delete-${fact.id}').classList.remove('hidden')" class="bg-rose-500 text-xl font-bold text-rose-200 hover:bg-rose-600 text-shadow-2xs text-center p-0.5 leading-none rounded-tr-lg hover:ring-4 hover:ring-rose-300/20 rounded-bl-md py-2 px-4 absolute -translate-y-1/2 translate-x-1/2 left-auto top-5 right-5.5">X</span>
                    </div>

                    <div id="accept-fact-delete-${fact.id}" class="hidden absolute top-0 left-0 z-10 w-full h-full shadow-lg p-6 bg-black/40 backdrop-blur-sm">
                        <div class="absolute absolute -translate-y-1/2 -translate-x-1/2 top-2/4 left-1/2">
                            <p>Você tem certeza que deseja excluir esta ocorrência?</p>

                            <div class="flex flex-row">
                                <button onclick="removerOcorrencia('${fact.id}')" id="mod-citzen-deletefact" "
                                    class="basis-8/12 bg-blue-600 text-white p-3 mb-6 rounded-l-md hover:bg-blue-700 transition">
                                    Excluir
                                </button>
                                <button class="basis-4/12 bg-red-600 text-white p-3 mb-6 rounded-r-md"
                                    onclick="document.getElementById('accept-fact-delete-${fact.id}').classList.add('hidden')">
                                    Fechar
                                </button>
                            </div>
                        </div>
                    </div>
                `;

        factList.appendChild(div);

        return document.getElementById(`fact-${fact.id}`);
    }

    function addShowCaseFacts() {
        const facts = JSON.parse(localStorage.getItem('facts') || '[]');

        if (facts.length === 0) {
            const mockFacts = [
                new Fact("foco_de_dengue", "Foco de Dengue encontrado em área urbana.", imgPlaceholder[Math.floor(Math.random() * 3)], null, null, null, null),
                new Fact("sintomas", "Relato de sintomas compatíveis com dengue.", imgPlaceholder[Math.floor(Math.random() * 3)], null, null, null, null),
                new Fact("outros", "Outros relatos relacionados à dengue.", imgPlaceholder[Math.floor(Math.random() * 3)], null, null, null, null)
            ];

            mockFacts.forEach(mockFact => {
                mockFact.fetchAddress();
                sleep(1000).then(() => {
                    console.log(mockFact);
                });
                facts.push(mockFact);
                addFactCard(mockFact);
            });

            localStorage.setItem('facts', JSON.stringify(facts));
        }

    }
    // Adiciona os cards de exemplo
    addShowCaseFacts();


    // ACE mod-ace
    const btnACE = document.getElementById('mod-ace-button');

    btnACE.addEventListener('click', function () {
    });

    function aceModeLoadFacts() {

        const facts = JSON.parse(localStorage.getItem('facts') || '[]');

        facts.forEach(data => {
            const fact = new Fact(data.option, data.description, data.picture, data.latitude, data.longitude, data.id || null, data.address || null);

        });
    }
});

let currentMode = 'normal'; // ou 'reduced'

const modesSection = document.getElementById('modes');
const modesContainer = document.getElementById('modes-container');
const controller = document.getElementById('modes-controler');
const controllerFull = document.getElementById('modes-controler-full');
const ulElements = modesSection.querySelectorAll('ul');
const title = modesSection.querySelector('h2');
const containerWrapper = modesSection.querySelector('div');

let isTopControllerVisible = false;
let isBottomControllerVisible = false;

// Função para aplicar o estado normal
function applyNormalMode() {
    if (currentMode === 'normal') return; // já está nesse modo

    ulElements.forEach(ul => ul.classList.remove('hidden'));

    containerWrapper.classList.add('max-w-6xl', 'mx-auto', 'p-6');
    containerWrapper.classList.remove('rounded-b-xl', 'ring-4', 'ring-blue-200/20');

    modesSection.classList.add('py-60');
    modesSection.classList.remove('py-2','fixed', 'top-0', 'left-0', 'flex', 'items-center', 'justify-center', 'w-screen');
    title.classList.remove('hidden');

    modesContainer.classList.add('grid', 'md:grid-cols-2', 'lg:grid-cols-4', 'gap-6');
    modesContainer.classList.remove('flex', 'flex-row', 'items-center', 'justify-center', 'gap-4', 'flex-wrap');
    modesContainer.querySelectorAll('div').forEach(div => {
        div.classList.add('p-6','rounded-xl');
        div.classList.remove('px-2','py-2','rounded-md');
        div.querySelector('h3').classList.add('text-2xl');
        div.querySelector('h3').classList.remove('text-lg');
    }); 
    currentMode = 'normal';
}

// Função para aplicar o estado reduzido
function applyReducedMode() {
    if (currentMode === 'reduced') return; // já está nesse modo

    ulElements.forEach(ul => ul.classList.add('hidden'));

    containerWrapper.classList.remove('max-w-6xl', 'mx-auto', 'p-6');
    containerWrapper.classList.add('rounded-b-xl', 'ring-4', 'ring-blue-200/20');

    modesSection.classList.remove('py-60');
    modesSection.classList.add('py-2','fixed', 'top-0', 'left-0', 'flex', 'items-center', 'justify-center', 'w-screen');
    title.classList.add('hidden');

    modesContainer.classList.remove('grid', 'md:grid-cols-2', 'lg:grid-cols-4', 'gap-6');
    modesContainer.classList.add('flex', 'flex-row', 'items-center', 'justify-center', 'gap-4', 'flex-wrap');
    modesContainer.querySelectorAll('div').forEach(div => {
        div.classList.remove('p-6','rounded-xl');
        div.classList.add('px-2', 'py-2','rounded-md');
        div.querySelector('h3').classList.remove('text-2xl');
        div.querySelector('h3').classList.add('text-lg');
    }); 
    currentMode = 'reduced';
}

function controlToggleMenuMode() {
    // menu collapse eoriginal
    if (isTopControllerVisible || (isTopControllerVisible && isBottomControllerVisible)) {
        applyNormalMode();
    } else if (!isBottomControllerVisible && !isTopControllerVisible) {
        applyReducedMode();
    }

    //menu collapse alternativo
    // if(!isBottomControllerVisible) {
    //     applyReducedMode();
    // } else {
    //     if (isTopControllerVisible) {
    //         applyReducedMode();
    //         return;
    //     }
    //     applyNormalMode();
    // }
}

// Criar Observer
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Controla o bug: verifica se o modo é diferente antes de alterar
            isBottomControllerVisible = true;
        } else {
            isBottomControllerVisible = false;
        }

        controlToggleMenuMode();
    });
}, {
    threshold: 0.5 // valor mais seguro que evita gatilhos com pequenas variações
});

// Criar Observer
const observerFull = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Controla o bug: verifica se o modo é diferente antes de alterar
            isTopControllerVisible = true;
        } else {
            isTopControllerVisible = false;
        }

        controlToggleMenuMode();
    });
}, {
    threshold: 0.5 // valor mais seguro que evita gatilhos com pequenas variações
});

observer.observe(controller);
observerFull.observe(controllerFull);

