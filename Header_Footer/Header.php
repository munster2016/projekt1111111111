<?php

//require_once('F:\OSPanel\domains\projekt\Classes\PageInterface.php');
//require_once('F:\OSPanel\domains\projekt\Classes\RenderInterface.php');
//require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');

require_once('../Classes/PhpPageRenderer.php');
require_once('../Classes/PhpPageRenderer.php');
require_once('../Factory/Factory.php');

class Header implements RenderInterface
{
    /**
     * @var bool
     */
    private $_enableMenu;

    /**
     * @var string
     */
    private $_userId;

public function __construct()
{
    $this->_enableMenu = false;
    $this->_userId = $_SESSION['userid'];
}

    /**
     * @return bool
     */
    public function isEnableMenu(): bool
    {
        return $this->_enableMenu;
    }

    /**
     * @param bool $enableMain
     */
    public function setEnableMenu(bool $enableMenu): void
    {
        $this->_enableMenu = $enableMenu;
    }



    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->_userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->_userId = $userId;
    }

    public function render(EchoOut $out): void
    {
        $out->print(<<<HTML

<header>
  <nav class="navbar fixed-top navbar-expand-lg ">  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
HTML
        );

        if($this->_enableMenu) {
            $out->print(<<<HTML
      <ul class="navbar-nav mr-auto">
HTML
            );
            $factory = new Factory();
            $userRepos = $factory->createUserRepository();

            $myUserData = $userRepos->getById($this->_userId);
//var_dump($myUserData);
            if ($myUserData->getPassword() == 11) {
                $out->print(<<<HTML
      
        <li class="nav-item active">
          <a class="nav-link2" href="GesamteBestellung.php">Bestellung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link2 nav-2link" href="LieferantAuswahlFuerHeute.php">Lieferantenauswahl</a>
        </li>
        
HTML
                );
           }

            $out->print(<<<HTML


        <li class="nav-item">
           <a class="nav-link2" href="AlleLieferanten.php">Alle Lieferanten</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link2" href="EinzBestellung.php">Speisekarte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link2" href="Abmeldung.php">Abmelden</a>
        </li>
      </ul>
      
HTML
            );
        }
        $out->print(<<<HTML
        
    </div>
  </nav>
</header>  


HTML
        );
    }
}