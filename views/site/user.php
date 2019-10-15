<?php include ROOT . '/views/layouts/header.php'; ?>

<header>
    <div class="head-top position-info">
    	<div class="info">
			<div class="brith">
				<?php echo  $_SESSION['data_reg']; ?>
			</div><!--brith-->
		</div>	
        <div class="initials ">
            <h1> <?php  echo  $_SESSION['name'].' '.$_SESSION['surname']; ?> </h1>
        </div><!--initials-->       
        <div class="brith"> 
            <?php echo  $_SESSION['data_rog']; ?> 
        </div><!--brith-->
    </div><!--head-top-->
</header>
<section>
	<div class="container-fluid">
		<?php  for ($i=0; $i <= count($data)-1; $i++) { ?>
			<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12 sms-box">
				<div class="box-name"><?php echo $data[$i]['name']; ?> </div>
				<div class="box-data"><?php echo $data[$i]['data_sms']; ?></div>
				<div class="box-sms"><p> <?php echo $data[$i]['text_sms']; ?> </p></div>
			</div>		
		<?php }  ?>
	</div><!--container-fluid-->
</section>
<footer class="footer">
    <div class="head-down">
		<form action="/user" method="post" class=" menu-botton">
			<button  name="Exit" class="button"> Exit </button>
			<button  name="Write" class="button"> Sms </button>
			<button  name="weather" class="button"> Погода </button>
		</form>
    </div><!--head-down-->
</footer>

<?php include ROOT . '/views/layouts/footer.php'; ?>