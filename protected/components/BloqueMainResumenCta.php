<?php

class BloqueMainResumenCta extends CWidget
{
    
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
        $this->render('BloqueMainResumenCta_View');
    }

}

?>
