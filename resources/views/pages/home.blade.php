<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}

section {
	position: relative;
	width: 100%;
	min-height: 100vh;
	padding: 100px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	background: #fff;
}
.blur {
	filter: blur(10px);
}
.circle {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #017143;
	clip-path: circle(600px at right 800px);
	transition: background 0.5s ease-in-out;
}
/*-----------------------
Header Design---------*/
header {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	padding: 20px 100px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
header .logo {
	position: relative;
	max-width: 50px;
}
header .navigation {
	position: relative;
	display: flex;	
}
header .navigation #marker {
	position: absolute;
	left: 0;
	height: 4px;
	background: #111;
	bottom: -8px;
	transition: 0.5s ease-in-out;
	border-radius: 4px;
}
header .navigation li {
	list-style: none;
}
header .navigation li a {
	display: inline-block;
	color: #333;
	font-weight: 400;
	margin-left: 40px;
	text-decoration: none;
}
/*-----------------------
Content Design---------*/
.content {
	position: relative;
	width: 100%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
/*TextBox Design*/
.content .textBox {
	position: relative;
	max-width: 600px;
}
.content .textBox h1 {
	color: #333;
	font-size: 4em;
	line-height: 1.4em;
	font-weight: 500;
}
.content .textBox h1 span {
	color: #017143;
	font-size: 1.2em;
	font-weight: 900;
}
.content .textBox h2 {
	position: absolute;
	background: #e91e63;
	clip-path: circle(80px at 70% 50%);
	top: 0;
	left: 0;
	color: transparent;
	font-size: 4em;
	line-height: 1.4em;
	font-weight: 500;
	-webkit-text-stroke: 2px;
	-webkit-text-stroke-color: #000;
	animation: 20s circlemoves linear infinite;
	transition: background 0.5s ease-in-out;
}
.content .textBox h2 span {
	color: transparent;
	font-size: 1.2em;
	font-weight: 900;
}
.content .textBox p {
	color: #333;
}
.content .textBox a {
	display: inline-block;
	width: 150px;
	margin-top: 20px;
	padding: 8px 20px;
	background: #017143;
	color: #fff;
	border-radius: 40px;
	font-weight: 500;
	text-decoration: none;
	overflow: hidden;
	transition: all 0.5s ease-in-out;
}
.content .textBox a:hover {
	width: 300px;
}
/*-----------------------
img Design-------------*/
.content .imgBox {
	width: 600px;
	height: 500px;
	display: flex;
	justify-content: center;
	flex-direction: column;
	padding: 20px 50px;
	animation: 5s imgmoves linear infinite;
	overflow: hidden;
	transition: 0.5s ease-in-out;

}
.content .imgBox img {
	position: absolute;
	left: 15%;
	max-width: 320px;
}
.content .imgBox:hover {
	animation-play-state: paused;
	backdrop-filter: blur(10px);
	box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8);
}
.content .imgBox .contentBox {
	position: absolute;
	max-width: 400px;
	display: flex;
	bottom: 0;
	padding: 10px 20px;
	flex-direction: column;
	opacity: 0;
	transition: 0.4s ease-in-out;
}
.content .imgBox:hover .contentBox {
	opacity: 1;
	background: rgba(255,255,255,0.3);
}
.content .imgBox .contentBox h2 {
	margin-top: 10px;
	transform: translateY(50px);
	transition: 0.5s;
	font-size: 1.2em;
	font-weight: 900;
	text-transform: uppercase;
	color: #000;
	opacity: 0;
	transition-delay: calc(0.1s * var(--i)); 	
}
.content .imgBox:hover .contentBox h2 {
	opacity: 1;
	transform: translateY(0);
}
.content .imgBox .contentBox p {
	margin-top: 10px;
	transform: translateY(75px);
	transition: 0.5s;
	font-size: 0.8em; 
	font-weight: 500;
	opacity: 0;
	transition-delay: calc(0.1s * var(--i));	
}
.content .imgBox:hover .contentBox p {
	opacity: 1;
	transform: translateY(0);
}
/*-----------------------
Thumbnail Design---------*/
.thumb {
	position: absolute;
	left: 50%;
	bottom: 20px;
	transform: translateX(-50%);
	display: flex;
}
.thumb li {
	list-style: none;
	display: inline-block;
	margin: 0 20px;
	cursor: pointer;
	transition: 0.5s;
}
.thumb li:hover {
	transform: translateY(-15px);
}
.thumb li img {
	max-width: 60px;
}

/*-----------------------
Social Netxork Icons Design---------*/
.sci {
	position: absolute;
	top: 50%;
	right: 30px;
	transform: translateY(-50%);
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.sci li {
	list-style: none;
}
.sci li a {
	display: inline-block;
	margin: 30px 0;
	text-decoration: none;
	display: flex;
	justify-content: center;
	align-items: center;
}
.sci li a i {
	font-size: 25px;
	color: #000;
	filter: invert(1);
}

/*-----------------------
Circular menu---------*/
.circular-menu {
	position: fixed;
	bottom: 1em;
	right: 1em;
}
.circular-menu:after {
	display: block;
	content: '';
	width: 3.5em;
	height:3.5em;
	border-radius: 50%;
	position: absolute;
	top: 0;
	right: 0;
	z-index: -2;
	background-color: #002d1a;
	transition: all 0.3s ease;
}
.circular-menu.active:after {
	transform: scale3d(5.5, 5.5, 1);
	transition-timing-function: cubic-bezier(0.68, 1.55, 0.265, 1);
}

.circular-menu .floating-btn {
	display: block;
	width:3.5em;
	height: 3.4em;
	border-radius: 50%;
	background-color: hsl(4, 95%, 60%);
	box-shadow: 0 2px 5px 0 hsla(0, 0%, 0%, .26);
	color: #fff;
	text-align: center;
	line-height: 3.9;
	cursor: pointer;
	outline: 0;
}
.circular-menu.active .floating-btn {
	box-shadow: inset 0 0 3px hsla(0,0%, 0%, 0.3);
}
.circular-menu.floating-menu:active {
	box-shadow: 0 4px 8px 0 hsla(0, 0%, 0%, 0.4);
}
.circular-menu .floating-btn i {
	font-size: 1.3em;
	transition: transform 0.2s ease;
}
.circular-menu.active .floating-btn i {
	transform: rotate(-45deg);
}
.circular-menu .menu-item {
	position: absolute;
	top: 0.2em;
	right: 0.2em;
	z-index: -1;
	display: block;
	text-decoration: none;
	color: #fff;
	font-size: 1em;
	width: 3em;
	height: 3em;
	border-radius: 50%;
	text-align: center;
	line-height: 3;
	background-color: hsla(0, 0%, 0%, 0.1);
	transition: transform 0.3s ease, background 0.2s ease;
}
.circular-menu .menu-item:hover {
	background-color: #017143;
} 
.circular-menu.active .menu-item {
	transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.circular-menu.active .menu-item:nth-child(1) {
  transform: translate3d(1em,-7em,0);
}

.circular-menu.active .menu-item:nth-child(2) {
  transform: translate3d(-3.5em,-6.3em,0);
}

.circular-menu.active .menu-item:nth-child(3) {
  transform: translate3d(-6.5em,-3.2em,0);
}

.circular-menu.active .menu-item:nth-child(4) {
  transform: translate3d(-7em,1em,0);
}
/*-----------------------
Animations---------*/
@keyframes imgmoves {
	0% {
		transform: translateY(0);
	}
	25% {
		transform: translateY(-20px);
	}
	50% {
		transform: translateY(20px);
	}
	100% {
		transform: translateY(0);
	}
}

@keyframes circlemoves {
	0% {
		clip-path: circle(80px at 70% 50%);
	}
	50% {
		clip-path: circle(80px at 20% 50%);
	}
	100% {
		clip-path: circle(80px at 70% 50%);
	}
}

/*-----------------------
Responsive---------*/
@media (max-width: 991px) {
	header {
		padding: 40px;
	}
	section {
		padding: 150px 40px;
	}
	header .navigation {
		display: none;
	}
  	header .navigation #marker {
		display: none;
	}
	header .navigation.active {
		position: fixed;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: #017143;
		z-index: 5;
	}
	header .navigation li a {
		margin: 10px 0;
		font-size: 1.5rem;
		font-weight: 300;
		transition: 0.3s ease-in-out;
		color: #fff;
	}
	header .navigation li:hover a {
		color: #000;
		font-weight: 700;
		margin: 15px 0;
	}
	.toggle {
    	display: block;
    	position: relative;
    	width: 30px;
    	height: 30px;
    	cursor: pointer;
  	}
  	.toggle:before {
	    content: '';
	    position: absolute;
	    top: 4px;
	    width: 100%;
	    height: 3px;
	    background: #000;
	    z-index: 6;
	    box-shadow: 0 10px 0 #000;
	    transition: 0.5s ease;
	}
  	.toggle:after {
	    content: '';
	    position: absolute;
	    bottom: 4px;
	    width: 100%;
	    height: 3px;
	    background: #000;
	    z-index: 6;
	    transition: 0.5s ease;
  	}
  	.toggle.active {
  		position: fixed;
  		right: 4%;
  		z-index: 6;
  	}
	.toggle.active::before {
    	transform: translate(-50%, 325%) rotate(45deg); 
    	box-shadow: none; 
    	background: #fff;
	} 
	.toggle.active::after {
		transform: translate(-50%, -325%) rotate(-45deg);
		background: #fff;
	}
	.content {
		flex-direction: column;
	}
		.content .textBox p {
		color: #000;
	}
	.circular-menu {
		display: none;
	}
}
@media (max-width: 480px) {
	.content .textBox h1 {
		font-size: 2em;
		margin: 20px auto;
	}
	.content .textBox h1 span {
		color: #393939;
	}
	.content .textBox h2 {
		font-size: 2em;
		margin: 20px auto;
		clip-path: 
	}
	.content .textBox a {
		background: #393939;
	}
	.content .imgBox {
		max-width: 480px;
	}
	.sci {
	position: absolute;
    top: 68%;
	}

	@keyframes circlemoves {
	0% {
		clip-path: circle(50px at 70% 50%);
	}
	50% {
		clip-path: circle(50px at 20% 50%);
	}
	100% {
		clip-path: circle(50px at 70% 50%);
	}
}
}

</style>
<section>
    <div class="circle"></div>
    <header>
        <a href="#" class="logo"><img src="https://i.ibb.co/5nvjybh/Artboard-1-4x-1.png"></a>
        <div class="toggle" onclick="toggleMenu()"></div>
        <ul class="navigation">
            <div id="marker"></div>
            <li><a href="{{ route('home') }}">Home</a></li>
			<li><a href="{{ route('home') }}">Profile</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </header>
    <div class="content">
        <div class="textBox">
            <h1>SI<br><span>DALANG</span></h1>
            <h2 id="circle02">SI<br> <span>DALANG</span></h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <a href="#" id="info" onmouseover="addText()" onmouseleave="removeText()">Learn More</a>
        </div>
        <div class="imgBox">
            <img src="https://i.ibb.co/jhbdHBg/Sidalang-4x.png" href="https://imgbb.com/" class="starbucks" onmouseover="blurEffect()" onmouseleave="unblurEffect()">
            <div class="contentBox">
                <h2 id="contentBox-title" style="--i:1">Maskot SiDALANG</h2>
                <p id="contentBox-text" style="--i:2">Maskot Sidalang hadir untuk menjadi ikon positif yang mewakili aplikasi web Bank Sampah, dan ia menyiratkan pesan penting tentang pentingnya praktik-praktik berkelanjutan dan daur ulang dalam kehidupan sehari-hari. Maskot ini dapat menginspirasi pengguna aplikasi untuk berpartisipasi dalam upaya pelestarian lingkungan dan pengelolaan sampah yang bertanggung jawab.</p>	
            </div>
        </div>
    </div>
    <ul class="thumb">
        <li><img src="https://i.ibb.co/wW6nmJY/trashbin.png" onclick="imgSlider('0'); changeCircleColor('#017143'); changetext('0')"></li>
        <li><img src="https://i.ibb.co/Wk4bW5j/Apple-Garbage-1.png" onclick="imgSlider('1'); changeCircleColor('#eb7495'); changetext('1')"></li>
    </ul>
    <ul class="sci">
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
    </ul>

    <div id ="circularMenu1" class="circular-menu" onclick="menuEffect()">
        <a href="#" class="floating-btn"><i class="fa fa-bars"></i></a>
        <div class="items-wrapper">
            <a href="#" class="menu-item"><i class="fas fa-coffee"></i></a>
            <a href="#" class="menu-item"><i class="fas fa-mug-hot"></i></a>
            <a href="#" class="menu-item"><i class="fas fa-blender"></i></i></a>
            <a href="#" class="menu-item"><i class="fas fa-blender"></i></a>
        </div>
        
    </div>
</section>

<script type="text/javascript">
    var products = [ 
        {
            "name": "Menthol Smoothie",
            "image": "https://i.ibb.co/wW6nmJY/trashbin.png",
            "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"
        },
        {
            "name": " Passion Smoothie",
            "image": "https://i.ibb.co/Wk4bW5j/Apple-Garbage-1.png",
            "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"
        },
       
    ];

    text = document.querySelector('.textBox'); 
    sci = document.querySelector('.sci');
    thumb = document.querySelector('.thumb'); 
    var info = document.getElementById('info');
    var marker = document.querySelector('#marker');
    var item = document.querySelectorAll('.navigation li a')

    function imgSlider(anything) {
        document.querySelector('.starbucks').src = products[anything].image;
    }
    function changeCircleColor(color){
        const circle = document.querySelector('.circle');
        const circle2 = document.getElementById('circle02');
        circle.style.background = color;
        circle2.style.background = color;
        info.style.background = color;
    }
    function blurEffect(){ 
        text.style.filter = "blur(10px)";
        sci.style.filter = "blur(10px)";
        thumb.style.filter = "blur(10px)";
    }
    function changetext(i){
        const producttitle = document.getElementById('contentBox-title');
        const contenttext = document.getElementById('contentBox-text');
        producttitle.innerText = products[i].name;
        contenttext.innerText = products[i].description;
    }
    function unblurEffect(){
        text.style.removeProperty('filter');
        sci.style.removeProperty('filter');
        thumb.style.removeProperty('filter');
    }
    function addText(){
        setTimeout(function(){
            info.innerText = 'Learn More about our products';
        }, 500);
    }
    function removeText(){
        info.innerText ='Learn More';
    }
    function menuEffect(){
        document.getElementById('circularMenu1').classList.toggle('active')
    }
    function indicator(e) {
        marker.style.left = e.offsetLeft+"px";
        marker.style.width = e.offsetWidth+"px";
    }
    item.forEach(link => {
        link.addEventListener('click', (e) => {
            indicator(e.target);
        })
    })
    function toggleMenu(){
      var menutoggle = document.querySelector('.toggle');
      var menu = document.querySelector('.navigation');
      menutoggle.classList.toggle('active');
      menu.classList.toggle('active') 
    }	 
</script>