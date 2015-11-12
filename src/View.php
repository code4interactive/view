<?php
namespace Code4\View;

use Code4\View\Traits\JsTraits;
/**
 * @method static array  jsRedirect(\string $redirectUrl) Redirect page
 * @method static array  dismissModal(\string $modalSelector) Close modal
 * @method static array  execScript(\string $function) Execute script or function
 * @method static array  successReload() Reload page
 * @method static array  refreshNotifications() Refresh notifications
 */
class View {

    use JsTraits;

    protected $modal = [];

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