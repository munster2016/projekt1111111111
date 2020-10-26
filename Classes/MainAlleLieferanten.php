<?php

//require_once ("F:\OSPanel\domains\projekt\Classes\PageInterface.php");
//require_once ("F:\OSPanel\domains\projekt\Classes\RenderInterface.php");
//require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');

require_once ("../Classes/PageInterface.php");
require_once ("../Classes/RenderInterface.php");
require_once('../Factory/Factory.php');


class MainAlleLieferanten implements PageInterface
{
    /**
     * @var Supplier[]
     */
    private $_suppliersArray;

    /**
     * @var User
     */
    private $_user;

    public function __construct(array $suppliers, User $user)
    {
        $this->_suppliersArray = $suppliers;
        $this->_user = $user;
    }

    /**
     * @return bool
     */
    public function isMenu(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getTitel(): string
    {
        return 'Alle Lieferanten';
    }

    /**
     * @param EchoOut $out
     */
    public function render(EchoOut $out): void
    {

        foreach ($this->_suppliersArray as $supplier)
        {
            if ($supplier->getIsActive() == 'yes'){
                $currsupplier = $supplier->getName();
            }
        }

        $out->print(<<<HTML

<main style="background-color: mediumseagreen">
           <div class="container">
                <div class="container-white-background">     
        
                    <h4 style="font-size: 36px">{$this->_user->getName()}, Lieferant für heute ist <span style="color: #7d0219fb">{$currsupplier}.</h4>
                    <h4 class="">... aber für den nächsten Tagen Du kannst an andere Lieferanten sehen</h4>
                           <div class="container-box">                                                                                 
HTML
        );

        foreach ($this->_suppliersArray as $supplier)
        {
            $out->print(<<<HTML
<form action="">
<fieldset class="fieldsetorder"">
<legend class="legendorder">{$supplier->getName()}</legend>
                <p><img src="..\Images\address.png" alt="img" width="70px" height="70px"> <span style="margin-left: 350px">{$supplier->getAddress()}</span></p>
                <p><img src="..\Images\icon-phone.jpg" alt="img" width="70px" height="70px"> <span style="margin-left: 350px">{$supplier->getPhone()}</span></p>
                <p><img src="..\Images\icons-email.png" alt="img" width="70px" height="70px"> <span style="margin-left: 350px">{$supplier->getEmail()}</span></p>
                <p><img src="..\Images\icon-opentime.png" alt="img" width="70px" height="70px"> <span style="margin-left: 350px">{$supplier->getOpentime()}</span></p>
           <br>
                                        
                <div style="margin-left: 350px"><a href = "../Pages/SpeisekarteSehen.php?supplierId={$supplier->getId()}"><span style="margin-left: 150px"></span><img src="../Images\icon-menu.png" alt="img" width="70px" height="70px"></a></div>              
            
            <br>
</fieldset>
</form>
HTML
            );
        }
        $out->print(<<<HTML
                    </div> 
                    </div>
                    </div>
                    </div>
                    </main> 
                    
         
HTML
        );
    }
}