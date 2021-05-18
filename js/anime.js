function fetchData(){
    fetch("https://api.jikan.moe/v3/anime/1/characters_staff")
    .then(response =>{
        if(!response.ok){
            throw Error("ERROR");
        }
        return response.json();
    })
    .then(data =>{
        console.log(data.characters);
        const html = data.characters
        .map(anime =>{
            return `
            <div class="card">
                <div class="card-image">
                    <img src="${anime.image_url}">
                </div><br>
                <p>İsim: ${anime.name}</p>
                <p>Rol: ${anime.role}</p>
                <div class="card-action">
                    <a href="${anime.url}">Daha Fazla Öğren</a>
                </div><br>
            </div>
            `
        }).join("");
        document
        .querySelector('#app')
        .insertAdjacentHTML('afterbegin',html);
    })
    .catch(error =>{
        console.log(error);
    });
}
fetchData();
