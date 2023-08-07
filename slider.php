<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    $(function () {
		
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });

			    });
			  </script>
			<div id="section-1" class="section">
			    <div id="top" class="callbacks_container">
			      <ul class="rslides" id="slider4">
			        <li>
			          <img src="images/Slider1.jpg" alt="">
					  <div class="caption">
			     	  		<div class="header-info">
							<h2><a href="category.php">Visitar Otomies Experiencias</a></h2>
							<lable></lable>
							<h1><a>!Centros turisticos muy agradables!</a></h1>
							</div>
			          </div>
			        </li>
			        <li>
			          <img src="images/Slider2.jpg" alt="">
			        <div class="caption">
			          	<div class="header-info">
							<h2><a href="category.php">Visitar Otomies Experiencias</a></h2>
							<lable></lable>
							<h1><a>Aventurate al extremo, ECOTURISMO</a></h1>
							</div>
			          </div>
			        </li>
			        <li>
			          <img src="images/Slider3.jpg" alt="">
			          <div class="caption">
			          	<div class="header-info">
							<h2><a href="index.php#section-4">Visita nuestra tienda GOURMENT</a></h2>
							<lable></lable>
							<h1><a>¡Sabor y cultura para gente de altura!</a></h1>
							</div>
			          </div>
			        </li>
					<li>
			          <img src="images/Slider4.jpg" alt="">
			          <div class="caption">
			          	<div class="header-info">
							<h1><a>Nuestra Galeria</a></h1>
							<lable></lable>
							<h2><a href="index.php#section-3">Artesanias! Gastronomia!, Tradiciones!.</a></h2>
							</div>
			          </div>
			        </li>
                    <li>
			          <img src="images/Slider5.jpg" alt="">
			          <div class="caption">
			          	<div class="header-info">
							<h2><a href="category.php">Hoteleria y Camping</a></h2>
							<lable></lable>
							<h1><a>!Nosotros te cotizamoooos!</a></h1>
							</div>
			          </div>
			        </li>
			      </ul>
			    </div>
			    <div class="clearfix"> </div>
				</div>
</body>
</html>
