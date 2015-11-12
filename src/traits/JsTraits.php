<?php

namespace Code4\View\Traits;

trait JsTraits
{

    /**
     * Zwraca przez json do przeglądarki komendę redirectu
     * @param $redirectUrl
     * @return array
     */
    public function jsRedirect($redirectUrl) {
        return ['status' => 'success', 'redirect'=>$redirectUrl];
    }

    /**
     * Zwraca do przeglądarki komendę zamknięcia okna modal
     * @param $modalSelector - selector jQuery okna modal
     * @return array
     */
    public function dismissModal($modalSelector) {
        return ['status' => 'success', 'dismissModal'=>$modalSelector];
    }

    /**
     * Zwraca do przeglądarki skrypt (inline) do wykonania
     * @param $function
     * @return array
     */
    public function execScript($function) {
        return ['status' => 'success', 'eval'=>$function];
    }

    /**
     * Zwraca do przeglądarki komendę przeładowania
     * @return array
     */
    public function successReload() {
        return ['status' => 'success', 'eval'=>'window.location.reload(true)'];
    }

    public function refreshNotifications() {
        return ['status' => 'success', 'notifications'=>'refresh'];
    }
}