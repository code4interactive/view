<?php

namespace Code4\View\Interfaces;

interface UserInterface {

    /**
     * Metada pobierająca ustawienie użytkownika
     * @param $term
     * @param $default
     * @return mixed
     */
    public function getSetting($term, $default);

}