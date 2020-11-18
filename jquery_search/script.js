$(document).ready(() => {
	//event
	$('keyword').on('keyup', () => {
		$('#container').load('ajax/mahasiswa.php?keyword=' + $('keyword').val());
	})
})	

console.log('fuck')
