let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enableDarkMode();
}

toggleBtn.onclick = (e) =>{
   darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enableDarkMode();
   }else{
      disableDarkMode();
   }
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   search.classList.remove('active');
}

let search = document.querySelector('.header .flex .search-form');

document.querySelector('#search-btn').onclick = () =>{
   search.classList.toggle('active');
   profile.classList.remove('active');
}

let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () =>{
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () =>{
   sideBar.classList.remove('active');
   body.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   search.classList.remove('active');

   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}


function createPopup(link, btnNames, btnFunc) {
   const popupHtml = `
       <div class="background-popup" onclick="this.style.display = 'none'">
       <div class="popup custom-popup">
           <div class="card active" style="background: url('images/kid.jpg') center/100% 100%;"'
               onclick="${link}();"
           >
               <p>Study Without Methods</p>
           </div>
           <div class="card" style="background: url('images/kid.jpg') center/100% 100%"'>
               <div class="buttons">
                   ${btnNames.map((name, index) => `
                       <button onclick="${btnFunc[index]}();">${name}</button>
                   `).join('')}
               </div>
               <p>Study With Methods</p>
           </div>
       </div>
       </div>
   `;
   document.body.insertAdjacentHTML('beforeend', popupHtml);
}