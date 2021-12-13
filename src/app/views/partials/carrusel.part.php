<div class="row carousel-holder">
   <div class="col-md-12">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
         
         <ol class="carousel-indicators">
            <?php for ($c = 0; $c <count($carrusel); $c++) : ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?=$c?>" class="<?=($c == 0 ? 'active' : '')?>"></li> 
            <?php endfor ?>
         </ol>                     
      
         <div class="carousel-inner">
            <?php
               $c=0;
               foreach($carrusel as $productoCarrusel):                  
            ?>
               <div class="item <?=($c++ == 0 ? 'active' : '')?>">
                  <img class="slide-image" 
                  src="<?= ProyectoWeb\entity\Product::RUTA_IMAGENES_CARRUSEL . $productoCarrusel->getCarrusel();?>"
                  alt="<?= $productoCarrusel->getNombre()?>"
                  title="<?= $productoCarrusel->getNombre()?>">
               </div>
            <?php endforeach?>            
         </div>

         <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         </a>
         <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         </a>
      </div>
   </div>
</div>