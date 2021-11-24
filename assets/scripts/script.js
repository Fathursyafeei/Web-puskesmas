 const ambilNav = document.getElementById("Navbar");

 const btn = ambilNav.querySelector("button");

const btnIcon = btn.querySelector("span");

btn.addEventListener('click', function(){
  btnIcon.classList.toggle("icon");
});


// Event pada saat link di  klik 
$('.page-scroll').on('click', function(e){

  // Ambil isi href
  const tujuan = $(this).attr('href');
  
  // tanggkap elemen
  const elemenTujuan = $(tujuan);
  
  $('html').animate({
    scrollTop: elemenTujuan.offset().top - 50
  },125,'easeInOutExpo');

  e.preventDefault();
});



const sections = document.querySelectorAll("section[id]");

window.addEventListener("scroll", scrollActive);

function scrollActive() {
	const scrollY = window.pageYOffset;

	sections.forEach((current) => {
		//Ambil panjang dan id dari section
		const sectionHeight = current.offsetHeight;
		const sectionTop = current.offsetTop - 50;
		const sectionId = current.getAttribute("id");

		if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
			document.querySelector(".nav-item a[href*=" + sectionId + "]").classList.add("active");
		} else {
			document.querySelector(".nav-item a[href*=" + sectionId + "]").classList.remove("active");
		}
	});
}