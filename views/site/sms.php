<?php include ROOT . '/views/layouts/header.php'; ?>

<header>
  <div class="head-top">
    <div class="logo">
      <h1>SMS</h1>
    </div><!--logo-->
  </div><!--head-top-->
</header>
<section>
  <div class="box-block">
    <form  class="form-horizontal" role="form" action="/sms" method="POST" >
      <div class="form-group">
            <label  class="col-xs-4  col-sm-4 col-md-4 col-lg-4 ">Name</label>
            <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
                <p class="form-control-static text-sms"><?php echo $_SESSION['name']; ?></p>
            </div>
      </div><!--form-group-->
      <div class="form-group">
        <label  class="col-xs-4  col-sm-4 col-md-4 col-lg-4 ">Email</label>
        <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
          <p class="form-control-static text-sms"><?php echo $_SESSION['email']; ?></p>
        </div>
      </div><!--form-group-->
      <div class="form-group">
          <label  class="col-xs-12  col-sm-12 col-md-12 col-lg-12 ">Текст сообщения</label>
          <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
            <textarea class="form-control" rows="5" name="text_sms" required></textarea>
          </div>
      </div><!--form-group-->
      <div class="form-group">
          <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
            <div class="g-recaptcha" data-sitekey="6LfZWLsUAAAAAGlc5Ex5bSfVaJmqtsKSVLeysc08"></div>
          </div> 
      </div><!--form-group-->  
      <div class="form-group">
        <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Отправить</button>
        </div>
      </div><!--form-group-->
    </form>
  </div>
</section>
<footer class="footer">
  <div class="head-down">
    <form action="/user" method="post" class=" menu-botton">
    <button  name="Exit" class="button">Exit</button>
    <button  name="weather" class="button">Погода</button>
    <button  name="user" class="button">Блог</button>
    </form>
  </div><!--head-down-->
</footer>

<?php include ROOT . '/views/layouts/footer.php'; ?>