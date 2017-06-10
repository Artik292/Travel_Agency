<?PHP

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Log in');
$app->initLayout('Centered');

class LoginForm extends \atk4\ui\Form
{
    function init() {
        parent::init();
        $this->setModel(clone $this->app->user, ['email', 'password']);
        $this->onSubmit(function($form) {
            $this->app->user->tryLoadBy('email', $form->model['email']);
            if ($this->app->user['password'] == $form->model['password']) {
                // Auth successful!
                $_SESSION['user_id'] = $this->app->user->id;

                return new \atk4\ui\jsExpression('document.location="dashboard.php"');
            } else {
                $this->app->user->unload();
                return $form->error('password', 'No such user');
            }
        });
    }
}

$app->layout->add(new LoginForm());

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
