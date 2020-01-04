<?php

class MeMensaje extends CWidget
{

    public $title='Acceso al Sitio';
    public $visible=true;

    public function init()
    {
        if($this->visible)
        {

        }
    }

    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }

    protected function renderContent()
    {
        $form=new LoginForm;
        if(isset($_POST['LoginForm']))
        {
            $form->attributes=$_POST['LoginForm'];
            if($form->validate() && $form->login()){
                $url = $this->controller->createUrl('site/index');
                $this->controller->redirect($url);
            }
        }
        $this->render('MeMensaje_View',array('form'=>$form));
    }

}

?>
