<?php include ROOT . '/views/layouts/header.php'; ?>

<header>
    <div class="head-top">
        <div class="logo">
            <h1><p class="text-center">Registration</p></h1>
        </div><!--logo-->
    </div><!--head-top-->
</header>
<section>
<div class="box-block flex">
    <form class="form-horizontal" role="form" action="/reg" method="POST">
        <div class="form-group row">
            <label for="input_na" class="col-xs-7  col-sm-4 col-md-4 col-lg-4 control-label">Имя</label>
            <input name="name" class="col-xs-12  col-sm-8 col-md-8 col-lg-8 " type="text"  placeholder="Введите имя" maxlength="25" required><br>
        </div><!--container-fluid-->
        <div class="form-group">
            <label for="input_pas" class="col-xs-7  col-sm-4 col-md-4 col-lg-4 control-label">Фамилия</label>
            <input name="famile" class="col-xs-12  col-sm-8 col-md-8 col-lg-8" type="text" placeholder="Введите фамилию" maxlength="30" required><br>
        </div><!--container-fluid-->
        <div class="form-group">
            <label for="input_em" class="col-xs-7  col-sm-4 col-md-4 col-lg-4 control-label">Email</label>
            <input name="email" class="col-xs-12  col-sm-8 col-md-8 col-lg-8" type="text" placeholder="Введите email" maxlength="25" required><br>
        </div><!--container-fluid-->
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <label for="r1" class="form-check-inline "> Пол: </label> 
                <input class="form-check" type="radio" name="Radio" id="inlineRadio1" value="Мужчина">
                <label for="r1" class="form-check-inline "> М </label>
                <input class="form-check" type="radio" name="Radio" id="inlineRadio2" value="Женщина"> 
                <label for="r2" class="form-check-inline"> Ж </label>         
            </div> 
        </div><!--container-fluid-->
        <div class="form-group">
            <label for="input_da" class="col-xs-7  col-sm-6 col-md-6 col-lg-6 control-label">Дата рождения:</label>
            <input name="date_r" class="col-xs-12  col-sm-6 col-md-6 col-lg-6" type="date" ><br>
        </div><!--form-group-->
        <div class="form-group">
            <label for="input_lg" class="col-xs-7  col-sm-4 col-md-4 col-lg-4 control-label">Login</label>
            <input name="login" class="col-xs-12  col-sm-8 col-md-8 col-lg-8" type="text" placeholder="Введите логин" maxlength="20" required><br>
        </div><!--form-group-->       
        <div class="form-group">
                <label for="input_pas" class="col-xs-7  col-sm-4 col-md-4 col-lg-4 control-label">Password</label>
                <input name="password" class="col-xs-12  col-sm-8 col-md-8 col-lg-8" type="password" placeholder="Введите пароль" maxlength="25" required><br>
        </div><!--form-group-->  
        <div class="form-group">
                <label for="input_rpas" class="col-xs-7  col-sm-4 col-md-4 col-lg-4 control-label">Password </label>
                <input name="password_c" class="col-xs-12  col-sm-8 col-md-8 col-lg-8" type="password" placeholder="Введите повторно пароль" maxlength="25" required><br>
        </div><!--form-group-->   
        <div class="form-group">            
                <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить</button>
        </div><!--form-group-->
    </form>
</div>
</section>

<footer class="footer">
    <div class="head-down">
        <form action="/user" method="post" class=" menu-botton">
            <button  name="Exit" class="button">Exit</button>
        </form>
    </div><!--head-down-->
</footer><!--footer-->


<?php include ROOT . '/views/layouts/footer.php'; ?>