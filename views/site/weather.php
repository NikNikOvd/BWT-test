<?php include ROOT . '/views/layouts/header.php'; ?>

<header>
    <div class="head-top position-info">
    	<div class="info">
			<div class="brith">
			<?php echo  $_SESSION['data_reg']; ?>
			</div>
		</div>	
            <div class="initials ">
                    <h1>
	                <?php  echo  $_SESSION['name'].' '.$_SESSION['surname']; ?>
                    </h1>
            </div><!--initials-->       
            <div class="brith">
			<?php echo  $_SESSION['data_rog']; ?>
			</div>
    </div><!--head-top-->
</header>
<section>
	<div class="box-block flex">
		<div class="pogoga">
			<div class="provisions"><?php echo $data['provisions'] ?> </div>

			<div class="temperature-icon">
				<div class="icon"> <?php echo $data['icon'] ?></div>	
				<div class="temperature"> <?php echo $data['temperature'] ?></div>
			</div>
			<div class="weather-box-properties">
				<div class="wind"> <p>Ветер:</p><?php  echo $data['wind'] ?></div>
				<div class="pressure"><p> Атмосфере давление:</p> <?php echo $data['pressure'] ?></div>
				<div class="humidity"> <p>Влажность:</p><?php echo $data['humidity'] ?></div>
				<div class="temperature_water"><p>Температура воды:</p><?php echo $data['temperature_water'] ?></div>
			</div>
		</div>
	</div>
</section>
<footer class="footer">
    <div class="head-down">
		<form action="/user" method="post" class=" menu-botton">
			<button  name="Exit" class="button">Exit</button>
			<button  name="Write" class="button">Sms</button>
			<button  name="user" class="button">Блог</button>
		</form>
    </div><!--head-down-->
</footer>

<?php include ROOT . '/views/layouts/footer.php'; ?>