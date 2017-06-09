<?PHP

require 'vendor/autoload.php';

//require 'conect.php';

use \atk4\ui\Button;

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=register;host=localhost','root','');

$app = new \atk4\ui\App('Registration');
$app->initLayout('Centered');

$button = new Button();
$button->set('Log in');
$button->set(['primary'=>true]);
$button->set(['size small'=>true]);
$button->link('login');
$app->add($button);

$a = [];
$m_register = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
$m_register->addField('name');
$m_register->addField('surname');
$m_register->addField('phone_number');
$m_register->addField('e-mail',['required'=>true]);
$m_register->addField('password',['type'=>'password', 'required'=>true]);

$f = $app->add(new \atk4\ui\Form(['segment'=>TRUE]));
$f->setModel($m_register);

$f->onSubmit(function ($f) {

      $f->model->save();

});
