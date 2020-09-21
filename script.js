// ambilah elemen yang dibutuhkan
let keyword = document.getElementById('keyword');
let tombolCari = document.getElementById('tombol-cari');
let tempat = document.getElementById('tempat');

// buatlah event
keyword.addEventListener('keyup', function() {
	// membuat objek ajax
	let xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onereadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {
			tempat.innerHTML = xhr.responseText;
			// console.log(tempat.innerHTML);
		}
	}

	// eksekusi ajax
	xhr.open('get', 'cari_ajax.php?keyword=' + keyword.value, true);
	xhr.send();
});