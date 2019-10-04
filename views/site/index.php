<?php include ROOT . '/views/layouts/header.php'; ?>

<header>
    <div class="head-top">
        <div class="logo">
            <h1>Bwt-test</h1>
        </div><!--logo-->
    </div><!--head-top-->
</header>

<section>
<div class="box-block flex">
    <div class="box-login">
		<div class="box-text">
			<span class="log-text">Account Login</span>
		</div><!--box-text-->
		<form action="/auth" method="post" class="login-form">
			<div class="box-input">
				<input class="input-log" type="text" name="login" placeholder="Login">
				<span class="focus-input100" placeholder="&#xe82a;"></span>
			</div><!--box-input-->
			<div class="box-input">
				<input class="input-log" type="password" name="password" placeholder="Password">
				<span class="input-focus" data-placeholder="&#xe80f;"></span>
			</div><!--box-input-->
			<div class=" box-botton">
				<button  name="submit" class="button-log">OK</button>
			</div><!--box-botton-->
			<p class="reg-text log-text"> <a href="/registr">Registration</a> </p>
		</form>
	</div><!--box-login-->
</div>
</section>
<footer class="footer">
    <div class="head-down">
        <div class="logo">
            <h1>Bwt-test</h1>
        </div><!--logo-->
	</div><!--head-down-->
</footer>

<?php include ROOT . '/views/layouts/footer.php'; ?>