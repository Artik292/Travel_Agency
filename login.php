<?php

require 'vendor/autoload.php';

use \atk4\ui\Button;

/*session_start();
if (isset($_SESSION)) {
  echo $_SESSION['try_admin'];
  echo 'work';
} */

//use \atk4\ui\Button;

$app = new \atk4\ui\App('Log in');
$app->initLayout('Centered');

$button = new Button();
$button->set('Log out');
$button->set(['primary'=>true]);
$button->set(['size big'=>true]);
$button->link('logout.php');
$app->add($button);

session_start();

if (isset($_SESSION['try_admin'])) {
    if ($_SESSION['try_admin'] == '1234') {
        $a = [];
        $m_register = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
        $m_register->addField('password', ['type'=>'password']);

        $f = $app->add(new \atk4\ui\Form(['segment'=>true]));
        $f->setModel($m_register);

        $f->onSubmit(function ($f) {
            if ($f->model['password'] == '') {
                return $f->error('name', "This place can't be empty.");
            }
            if ($f->model['password'] == 'password') {
                //session_start();
        $_SESSION['user_name'] = 'admin';

                return new \atk4\ui\jsExpression('document.location = "main.php" ');
            }
      //require 'logout.php';
      unset($_SESSION['try_admin']);

            return new \atk4\ui\jsExpression('document.location = "index.php" ');
        });
    }
} else {
    $a = [];
    $m_register = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
    $m_register->addField('name');

    $f = $app->add(new \atk4\ui\Form(['segment'=>true]));
    $f->setModel($m_register);

    $f->onSubmit(function ($f) {
        if ($f->model['name'] == '') {
            return $f->error('name', "This place can't be empty.");
        }
        if ($f->model['name'] == 'admin') {
            //session_start();
                $_SESSION['try_admin'] = '1234';

            return new \atk4\ui\jsExpression('document.location = "login.php" ');
        } else {
            //session_start();
            $_SESSION['user_name'] = $f->model['name'];

            return new \atk4\ui\jsExpression('document.location = "main.php" ');
        }
    }

    );
}

//$app->layout->add(new /*ui\*/loginForm());

/*$db = new
\atk4\data\Persistence_SQL('mysql:host=127.0.0.1;dbname=register;charset=utf8', 'root', ''); */

/* making form for user and connecting to table in database */

/* class user extends \atk4\data\Model {
    public $table = 'users';

function init() {
    parent::init();
  $this->addField('email');
  $this->addField('password', ['type'=>'password']);


}
}

$form = $app->layout->add('Form');
$form->setModel(new user($db));
$form->onSubmit(function($form) {
    If ($form->model['email'] == '') {
        return $form->error('email', "Please, enter your e-mail");
    }
        If ($form->model['password'] == '') {
        return $form->error('password', "Please, enter your password");
    }
  tryLoadBy('email',$form->model['email']);

    //return $form->success('You were successfully registered');
  return new \atk4\ui\jsExpression('document.location = "main.php" ');
}); */

/* $a = [];
$m_register = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
$m_register->addField('e-mail');
$m_register->addField('password');


$f = $app->add(new \atk4\ui\Form(['segment'=>TRUE]));
$f->setModel($m_register);

$f->onSubmit(function ($f) {
    if ($f->model['e-mail'] == '') {
       return $f->error('e-mail', "This place can't be empty.");
    if ($f->model['password'] == '') {
      return $f->error('password', "This place can't be empty.");
    }
  }

}); */
