<div class="row clearfix f-space10"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>Daftar Brands</h2>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="about-company-container">
        <div class="row" >
          
         
            
        	
			<?php
			$jumlah = count($data_seller);
			for($a=0;$a < $jumlah; $a++)
			{
				if(($jumlah % 2) == 0)
				{
					$warna = 'blue';
				}
				elseif(($jumlah % 2) == $a)
				{
					$warna = 'red';
				}
				else
				{
					
					$warna = 'brown';
				}
				echo $a;
			}
			
			foreach ($data_seller as $key => $value) {

                        ?>



                         <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">

      <div class="rec-banner red" >

                                <div class="banner" style="text-align:center;background:<?=$warna?>; border-radius:30px;border:1px solid #000;"><img src="<?=base_url('assets/front-end/images/bandungsnack.png')?>">
<a class="menu-title" href="<?=base_url('Brands/product/'.$value->id_seller)?>"><h2><?=$value->seller_name?></h2></a>
                                
                              
        </div>

      </div>			
      </div>			
			<?php }?>
            
           
          
        </div>
      </div>
    </div>
  </div>
</div>


<!-- end: big unit -->
<div class="row clearfix f-space30"></div>