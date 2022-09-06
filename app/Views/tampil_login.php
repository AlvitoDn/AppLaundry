<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css">
</head>
<style>
    html,
body {
  height: 100%;
  background-image: url('assets/mountain.jpg');
  background-size: cover;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: white;
}

.card-header{
 display: flex;
 margin-left: auto;
 margin-right: auto;
 width: 100%;
 justify-content: center;
 align-items: center;
 background-color:  transparent;
}

.center{
    padding: auto; 
    margin: auto;
    margin-bottom: 20px;
    height: 60px; 
    border-radius: 50px;
    display: flex;
    width: 60px;
    background-color: #808080;
}

.form {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.card-footer{
 display: flex;
 justify-content: center;
 align-items: center;
 margin-left: auto;
 margin-right: auto;
 width: 100%;
}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="form">
            <img src="assets/ame.gif" alt="ame" class="center">
                <div class="card">
                    <form action="plogin" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Login</button>
                            <button type="close" class="btn btn-secondary">Close</button>
                        </div>
                    </form>   
                </div>
            </div>
            <?php if(!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-success">
                    <?php session()->getFlashdata('error');?>
                </div>
            <?php endif ?>
        </div>
    </div>
</body>
</html>