
        // if ("geolocation" in navigator) {
        //     navigator.geolocation.getCurrentPosition(
        //         function (position) {
        //             latitude = position.coords.latitude;
        //             longitude = position.coords.longitude;
        //             console.log("Latitude:", latitude);
        //             console.log("Longitude:", longitude);
        //         },
        //         function (error) {
        //             console.error("Erro ao obter localização:", error.message);
        //         }
        //     );
        // } else {
        //     console.log("Geolocalização não é suportada neste navegador.");
        // }

        const map = L.map('mod-manager-map').setView([-14.736128, -49.962185], 4
        );

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // const marker = L.marker([latitude, longitude]).addTo(map)
        //     .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

        let facts = JSON.parse(localStorage.getItem('facts') || '[]');
        facts.forEach(fact => {
            const { latitude, longitude } = fact;

            // L.marker([latitude, longitude]).addTo(map)
            //     .bindPopup(`Ocorrência: ${fact.description}`);

            L.circle([latitude, longitude], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 150000
            })
                .addTo(map)
                .bindPopup(`Ocorrência: ${fact.description}`);

        });

        // const circle = L.circle([-22.585, -47.49], {
        //     color: 'red',
        //     fillColor: '#f03',
        //     fillOpacity: 0.5,
        //     radius: 50
        // }).addTo(map).bindPopup('Limeira');

        // const polygon = L.polygon([
        // 	[51.509, -0.08],
        // 	[51.503, -0.06],
        // 	[51.51, -0.047]
        // ]).addTo(map).bindPopup('I am a polygon.');


        // const popup = L.popup()
        // 	.setLatLng([51.513, -0.09])
        // 	.setContent('I am a standalone popup.')
        // 	.openOn(map);

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent(`You clicked the map at ${e.latlng.toString()}`)
                .openOn(map);
        }

        // map.on('click', onMapClick);

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
            geoRandomnessCheckbox.checked = !geoRandomnessCheckbox.checked;
            if (geoRandomnessCheckbox.checked) {
                geoRandomnessLabel.classList.add('bg-blue-600');
                geoInputFields.classList.remove('hidden');
            } else {
                geoRandomnessLabel.classList.remove('bg-blue-600');
                geoInputFields.classList.add('hidden');
            }
        }

        function init() {
            toggleGeoRandomness();
        }

        init();

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
                const response = await fetch(url , {
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
                console.log("Formulário enviado!");
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

                localStorage.setItem('facts', JSON.stringify(facts));

                // fecha formulário
                document.getElementById('mod-citzen-fact-form').classList.add('hidden')

                // Adicionar card visualmente
                let newFact = addFactCard(fact);

                 // Dá um pequeno delay para garantir que o DOM "percebeu" o novo item
                setTimeout(() => {
                    newFact.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 200);

            });


            function addFactCard(fact) {
                const div = document.createElement('div');
                div.className = "bg-surface rounded-xl shadow-md flex flex-wrap gap-4 mb-4 hover:ring-4 hover:ring-blue-300/20 transition duration-300";

                div.innerHTML = `
                    <div id="fact-${fact.id}" class="basis-7/12 flex flex-col gap-4 justify-start ">
                        <div class="basis-full bg-blue-500 px-6 mb-2 rounded-tl-xl rounded-br-full max-h-16 ring-4 ring-blue-300/20 shadow-xl shadow-indigo-500/50">
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
                `;

                factList.appendChild(div);

                return document.getElementById(`fact-${fact.id}`);
            }

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


