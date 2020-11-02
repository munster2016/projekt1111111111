<?php

//require_once ("F:\OSPanel\domains\projekt\Classes\PageInterface.php");
//require_once ("F:\OSPanel\domains\projekt\Classes\RenderInterface.php");
//require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
//require_once('F:\OSPanel\domains\projekt\Classes\EchoOut.php');
//require_once('F:\OSPanel\domains\projekt\Management\UserManagement\User.php');
//require_once('F:\OSPanel\domains\projekt\Management\SupplierManagement\Supplier.php');


require_once ("../Classes/PageInterface.php");
require_once ("../Classes/RenderInterface.php");
require_once('../Factory/Factory.php');
require_once('../Classes/EchoOut.php');
require_once('../Management/UserManagement/User.php');
require_once('../Management/SupplierManagement/Supplier.php');

class MainEinzBestellung implements PageInterface
{
    /**
     * @var string
     */
    private $_user;

    private $_error;

    public function __construct(?User $user, ?string $error)
    {
        $this->_user = $user;
        $this->_error = $error;
    }

    public function isMenu(): bool
    {
        return true;
    }

    public function getTitel(): string
    {
        return 'EinzBestellung';
    }

    public function render(EchoOut $out): void
    {

        $factory = new Factory();
        $supplierRepo = $factory->createSupplierRepository();


        $suppliers = $supplierRepo->getAllSuppliers();

        $currsupplier = '';
        $currsupplierId = '';

       foreach ($suppliers as $supplier)
        {
            if ($supplier->getIsActive() == 'yes'){
                $currsupplier = $supplier->getName();
                $currsupplierId = $supplier->getId();
            }
        }

       $menurepos = $factory->createMenuRepository();

        $menu = $menurepos->getMenuBySupplierId($currsupplierId);




        $out->print(<<<HTML
      <main class="main">
        <div class="container ">
            <div class="container-white-background">
                    <h3 class="main__text"><span style="margin-left: 50px"></span>Hallo {$this->_user->getName()}</h3>
                    
                    <div class="main__text"><p><span style="margin-left: 600px"></span>Lieferant für heute: <span style="color: #7d0219fb">{$currsupplier}</span></p></div>
                            <h3 style="color: red"><span style="margin-left: 45px"></span>Die Bestellung muss bis 11.00 Uhr ausgeführt werden</h3>

 <form class="order" action="?upload=1" method="post">
                                       <fieldset class="fieldsetorder">      
                                            <legend class="legendorder ">Speisekarte:</legend>  
                                                                                                                                
HTML
        );
        $foods = $menu->getFood();

        foreach ($foods as $food)
        {
            $out->print(<<<HTML

<div class="form-check">
            <div style="width: 390px;font-size: 32px"><input class="form-check-input" type="checkbox" name="foodId[]" value="{$food->getFoodId()}" id="defaultCheck1">
            {$food->getName()}</div>
            <div style="text-align: end;font-size: 32px"><span style="margin-right: 150px"></span> {$food->getPrice()} Euro</div>
            
</div>                            
                                                                                                       
HTML
            );
        }
        $out->print(<<<HTML
                                                                                                      
                                        </fieldset>
                                        <div style="color: red">$this->_error</div> 
                                        <br>
                                        <input type="hidden" name="supplierId" value="{$currsupplierId}"> 
                                        <textarea style="font-size: 22px" name="wish" placeholder="...noch Zusatzwünsche" id="" cols="25" rows="3"></textarea>
                                        <p><input class="ordersubmit" type="submit" value="bestellen"></p>
                                        
    
                        </div>
                    </div>
         </main>
HTML


        );
    }
}