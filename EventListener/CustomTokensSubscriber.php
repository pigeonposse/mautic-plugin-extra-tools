<?php 

namespace MauticPlugin\PigeonPosseExtraToolsBundle\EventListener;

// interface
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
// Page
use Mautic\PageBundle\PageEvents;
use Mautic\PageBundle\Event\PageDisplayEvent;
use Mautic\PageBundle\Event\PageBuilderEvent;
// Email
use Mautic\EmailBundle\EmailEvents;
use Mautic\EmailBundle\Event\EmailBuilderEvent;
use Mautic\EmailBundle\Event\EmailSendEvent;
// Notification
use Mautic\NotificationBundle\NotificationEvents;
use Mautic\NotificationBundle\Event\NotificationSendEvent;
// Model
use MauticPlugin\PigeonPosseExtraToolsBundle\Model\CustomTokensModel;

/**
 * Class CustomTokensSubscriber
 */
class CustomTokensSubscriber implements EventSubscriberInterface {

    /**
     * @var customtokensModel
     */
    private $customtokensModel;


    public function __construct(
        CustomTokensModel $customtokensModel
    ) {

        $this->customtokensModel       = $customtokensModel;

    }

    /**
     * @return array
     */
    static public function getSubscribedEvents() {

        return array(
            PageEvents::PAGE_ON_BUILD     => ['onPageBuild', 0],
            PageEvents::PAGE_ON_DISPLAY   => ['onPageDisplay',-255],
            EmailEvents::EMAIL_ON_BUILD   => ['onEmailBuild', 0],
            EmailEvents::EMAIL_ON_SEND    => ['onEmailGenerate', 0],
            EmailEvents::EMAIL_ON_DISPLAY => ['onEmailGenerate', 0],
        	NotificationEvents::NOTIFICATION_ON_SEND => ['onNotificationSend', 0],
        );
    }

  	/**
     * generate
     */
    private function pigeonTokens( ) {

    	$tokens 		 = $this->customtokensModel;
    	$tokensPublished = $this->customtokensModel->getCustomTokens();
    	
    	$tokensDefault['{pigeontoken="hello"}'] = "Hello <i>Pigeon fancier</i> 👋";
    	$tokensDefault['{pigeontoken="bye"}']   = "Fly high <i>Pigeon</i> 🐦";
    	$tokens = array_merge($tokensDefault, $tokensPublished);

        return $tokens;

    }

  	/**
     * ADD
     */
    private function addPigeonTokens( $event ) {

        $event->addTokens( $this->pigeonTokens( $event ) );

    }

    private function addPigeonToken( $event ) {

    	$tokens = $this->pigeonTokens();

    	foreach ( $tokens as $key => $value ) {

	        $event->addToken( $key, $value );

    	}

    }

   	/**
     * Email
     */
    public function onEmailBuild( EmailBuilderEvent $event ) {

    	$this->addPigeonToken($event);

    }

    public function onEmailDisplay( EmailSendEvent $event ) {

        $this->addPigeonTokens($event);

    }

    public function onEmailGenerate( EmailSendEvent $event ) {

    	$this->addPigeonTokens($event);

    }

   	/**
     * page
     */
    public function onPageBuild( PageBuilderEvent $event ) {

    	$this->addPigeonToken($event);

    }
    public function onPageDisplay( PageDisplayEvent $event ) {

    	$tokens  = $this->pigeonTokens();
    	$content = $event->getContent();
    	
        if (!empty($tokens)) {

	    	foreach ( $tokens as $key => $value ) {
            	$content = str_ireplace($key, $value, $content);
    		}

        }

        $event->setContent($content);

    }

   	/**
     * NOTIFICATIONs
     */
    public function onNotificationSend( EmailSendEvent $event ) {

    	$tokens  = $this->pigeonTokens();
    	$content = $event->getMessage();
    	
        if (!empty($tokens)) {

	    	foreach ( $tokens as $key => $value ) {
            	$content = str_ireplace($key, $value, $content);
    		}

        }

        $event->setMessage($content);

    }


}
