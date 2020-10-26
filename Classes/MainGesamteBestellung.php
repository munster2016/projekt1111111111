<?php
//$user = $userRepos->getById($_SESSION['userid']);
//require_once("F:\OSPanel\domains\projekt\Classes/PageInterface.php");
//require_once("F:\OSPanel\domains\projekt\Classes/RenderInterface.php");



require_once("../Classes/PageInterface.php");
require_once("../Classes/RenderInterface.php");

class MainGesamteBestellung implements PageInterface
{
    /**
     * @var FullOrder
     */
    private $_fullOrder;



    public function __construct(FullOrder $fullOrder)
    {
        $this->_fullOrder = $fullOrder;
    }

    public function isMenu(): bool
    {
        return true;
    }

    public function getTitel(): string
    {
        return 'Auswahl von Lieferanten';
    }

    public function getUserNameById($id)
    {
        $factory = new Factory();
        $userRepos = $factory->createUserRepository();

        $user = $userRepos->getById($id);

        return $user->getName();
    }

    public function getFoodNameAndPriceById($id)
    {
        $factory = new Factory();
        $foodRepos = $factory->createFoodRepository();

        $food = $foodRepos->getFoodNameAndPriceById($id);

        return $food;
    }

    public function render(EchoOut $out): void
    {
        $factory = new Factory();
        $supplierRepo = $factory->createSupplierRepository();
        $userRepos = $factory->createUserRepository();
        $user = $userRepos->getById($_SESSION['userid']);

        $suppliers = $supplierRepo->getAllSuppliers();

        $currsupplier = '';


        foreach ($suppliers as $supplier) {


            if ($supplier->getIsActive() == 'yes') {
                $currsupplier = $supplier->getName();
            }
        }
        $out->print(<<<HTML

<main style="background-color: mediumseagreen">
           <div class="container">
                <div class="container-white-background">     
        
                    <h2 style="text-align: center;font-size: 36px" class="">Gesamte Bestellung   <span style="color: #7d0219fb">{$this->_fullOrder->getDate()}</span></h2>
                    <h3 style="text-align: center;font-size: 33px" class="">Heute unser Lieferant ist : <span style="color: darkblue">{$currsupplier}</h3>
                         
                         <div style="border: 1px solid grey"><h4 style="text-align: center">Diese Mitarbeitern haben Bestellung gemacht:</h4></div> 
                         <div class="container-box">
                                                                                                           
HTML
        );

        $this->_fullOrder->getDate();    //date of full order
        $singleorder = $this->_fullOrder->getSingleOrders();

//        foreach ($singleorder as $item)
//        {
//           $item->getLieferId();
//           $item->getUserId();
//           $item->getFood();//foreach
//
//        }


        foreach ($singleorder as $item) {



            $out->print(<<<HTML

<form action="?upload=1" method="post"" enctype="multipart/form-data">
<fieldset class="fieldsetorder"">
<legend class="legendorder">{$this->getUserNameById($item->getUserId())}</legend>

                <p>hat bestellt : <span style="margin-left: 100px">
HTML
        );

            foreach ($item->getFood() as $food)
                {
                    $out->print(<<<HTML

                        <div style="border: 2px solid gray">
                        
                      <p style="text-align: center">{$this->getFoodNameAndPriceById($food)->getName()}.....
                      {$this->getFoodNameAndPriceById($food)->getPrice()} <span style="color: red">Euro</span></p>
                                
                                
                        </div>
HTML
                    );
                }

            $out->print(<<<HTML
                </span></p>
                <p>Zusatzwünsch : <span style="margin-left: 100px; color: midnightblue">{$item->getWishUser()}</span></p>
                <p>Zeit der Bestellung :<span style="margin-left: 50px">{$item->getTime()}</span></p>
                 
                <input type="hidden" name="supplierId" value="{$item->getUserId()}"> 
                
                                        
            </fieldset>
</form>
HTML
            );
        }

        $out->print(<<<HTML
<br>
        <p class="fullordr-button"><input class="ordersubmit" type="submit" value="Bestellung abschlißen"></p>
        
        <div class="container-fullorder">
        <p class="fullordr-phone-icon"><img src="..\Images\icon-phone.jpg" alt="img" width="51px" height="51px"></p>
        <p class="fullordr-email-icon"><img src="..\Images\icons-email.png" alt="img" width="51px" height="51px"></p>
</div>
                    </div> 
                    </div>
                    </div>
                    </div>
                    </main> 
                    
         
HTML
        );

    }
}