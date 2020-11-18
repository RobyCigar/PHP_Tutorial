const keyword = document.getElementById('keyword');
const searchBtn = document.getElementById('search-btn');
const container = document.getElementById('container');

keyword.addEventListener('keyup', () => {
	let xhr = new XMLHttpRequest();
	
xhr.onreadystatechange = () => {
		if(xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}
	
	xhr.open('GET', `ajax/mahasiswa.php?keyword=${keyword.value}`, true);
	xhr.send();
	
});


