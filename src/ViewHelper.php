<?php
namespace Code4\View;

use Code4\View\Interfaces\UserInterface;
use Code4\View\Traits\JsTraits;
use Illuminate\Http\Request;

/**
 * @method static array  jsRedirect(\string $redirectUrl) Redirect page
 * @method static array  dismissModal(\string $modalSelector) Close modal
 * @method static array  execScript(\string $function) Execute script or function
 * @method static array  successReload() Reload page
 * @method static array  refreshNotifications() Refresh notifications
 */
class ViewHelper {

    use JsTraits;

    protected $modal = [];

    /**
     * Generuje avatar. Jeżeli ma być użyty gravatar - $text = $email
     * @param string $text initials
     * @param string $email email
     * @param string $size micro|small|medium|large|huge
     * @param string $color color-0|color-1|color-2|color-3|color-4|color-5|color-6|color-7
     * @param string $class use 'reversed' for inverted colors
     * @param bool $gravatar
     * @return string
     */
    public function avatar($text, $email, $size, $color, $class = '', $gravatar = false) {

        if ($gravatar)
        {
            $gravatar_src = \Gravatar::src($email, 100);
            $temp = '<div class="avatar '.$size.' ' . $class . '">';
            $temp .= '<div class="photo">';
            $temp .= '<img src="' . $gravatar_src . '" >';
            $temp .= '</div>';
            $temp .= '</div>';
            return $temp;
        } else {
            $temp = '<div class="avatar '.$size.' ' . $class . '">';
            $temp .= '<div class="text ' . $color . '">';
            $temp .= '<abbr class="initials-text">'.$text.'</abbr>';
            $temp .= '</div>';
            $temp .= '</div>';
            return $temp;
        }

    }

    /**
     * Używając interfejsu UserInterface pobieramy dane do generacji awatara
     * @param UserInterface $user
     * @param string $size
     * @param string $class
     * @return string
     */
    public function userAvatar(UserInterface $user, $size = 'medium', $class = '') {
        $gravatar = $user->getSetting('general_useGravatar', '1');
        $email = $user->getEmail();
        $initials = $user->getInitials();
        $color = $user->getSetting('userColor', 'color-0');

        return $this->avatar($initials, $email, $size, $color, $class, $gravatar);
    }

    /**
     * Tworzy i zwraca nowy obiekt modal
     * @param null|string $name
     * @return Elements\Modal
     */
    public function modal($name = null) {
        if (!$name) {
            return new Elements\Modal();
        } else {
            if (array_key_exists($name, $this->modal)) {
                return $this->modal[$name];
            } else {
                $this->modal[$name] = new Elements\Modal();
            }
        }
    }
}