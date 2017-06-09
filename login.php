<?PHP

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Log in');
$app->initLayout('Centered');

$a = [];
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

});
