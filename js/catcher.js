const modal_catcher = document.getElementById('lead-catcher');

function openModal() {
    modal_catcher.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    modal_catcher.classList.remove('show');
    document.body.style.overflow = '';
}

// Закрытие при клике вне окна
modal_catcher.addEventListener('click', function(e) {
    if (e.target === modal_catcher) {
        closeModal();
    }
});

// Закрытие клавишей Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && modal_catcher.classList.contains('show')) {
        closeModal();
    }
});

let currentTime = Date.now();
let is_mq = false;
let now = new Date();
now.setTime(now.getTime() + 24 * 60*60 * 1000); // 24 houer will not pop up

let close_pq = document.querySelector('#m-catcher .close'); // close button
let is_catchclose = document.cookie.indexOf('name=catchclose');

if (close_pq) { // close pop up
    close_pq.addEventListener('click', ()=>{
			document.cookie = "name=catchclose; expires=" + now.toUTCString() + "; path=/"; // set cookie for not pop up second time
		});
}

/*presens at site 1 minute*/

if (!sessionStorage.getItem('startTime')) {
		sessionStorage.setItem('startTime', Date.now());
}

const enterTime = sessionStorage.getItem('startTime');

let time_catch = 1*90; // how long presens at site
let spentTime = (currentTime - enterTime) / 1000;

let int_catch = time_catch - spentTime;
let int_catch_min = int_catch/60;
let int_catch_mil = int_catch*1000;

const popup_catch=()=>{  // pop up in view cookie
		if(!is_mq){
			if (is_catchclose == -1) {
				is_mq = true;
				openModal()
			}
		}
}

if(catch_tr_tim) { //Time-on-site trigger
		if (int_catch_mil >=1 ) {
			setTimeout(popup_catch, int_catch_mil);
		}
}

if(catch_tr_out) { // leave trigger
	window.addEventListener("mouseout", function(e){
		if (e.clientY<=-1) {
			popup_catch();
		}
	});
}
