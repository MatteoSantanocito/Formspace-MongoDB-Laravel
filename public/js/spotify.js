function SearchMusic(event){
    event.preventDefault();
    //prelevo l'input del titolo selezionando il form "element"
    const element = document.querySelector('#text').value;
    const text = encodeURIComponent(element);
    console.log('Ricerca per : ' + text);
    //prendo il titolo e faccio la fetch alla function in profilecontroller dopo prendo la risposta e la metto in un file Json
    //in seguito passo alla funzione onJsonMusic che mi mostra la musica
    fetch("/spotify_track/" + encodeURIComponent(text)).then(onResponseMusic).then(onJsonMusic);
}

function onResponseMusic(response){
    console.log('Response ricevuto');
    console.log(response);
    return response.json();
}

function onJsonMusic(json){
    const container = document.getElementById('view');
    container.innerHTML = ''; //lo svuoto se c'è già qualcosa
    container.classList.remove('hidden');
    container.classList.add('new');
    console.log('JSON ricevuto');
    console.log(json);

    if(json.tracks.items.length > 1){
        json.tracks.items.length = 1;
    }


    for (const track in json.tracks.items) {

        const all = document.createElement('div');
        all.classList.add('all');

        const card = document.createElement('div');
        card.dataset.id = json.tracks.items[track].id;
        card.classList.add('track');

        const img = document.createElement('img');
        img.classList.add('imgSpotify');
        img.src = json.tracks.items[track].album.images[0].url;

        const info = document.createElement('div');
        info.classList.add('info');

        const title = document.createElement('div');
        title.classList.add('titleSpotify');
        title.textContent = json.tracks.items[track].name;

        const author = document.createElement('div');
        author.classList.add('author');
        author.textContent = json.tracks.items[track].artists[0].name;

        const l = json.tracks.items[track].external_urls.spotify;
        const testo = 'Ascolta su spotify';
        const link = document.createElement('a');
        link.href = l;
        link.textContent = testo;
        link.classList.add('link');


        all.appendChild(card);
        all.appendChild(info);
        all.appendChild(link);
        card.appendChild(img);
        info.appendChild(title);
        info.appendChild(author);
        container.appendChild(all);
    }
}
const elem = document.querySelector('.element');
elem.addEventListener('submit', SearchMusic);

function onFocus()
{
  const text = document.getElementById('text');
  text.value = '';
}
const text = document.querySelector("input")
text.addEventListener("focus", onFocus);