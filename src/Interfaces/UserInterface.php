<?php

namespace Code4\View\Interfaces;

interface UserInterface {

    /**
     * Metada pobierająca ustawienie użytkownika
     * @param string $term
     * @param mixed $default
     * @return mixed
     */
    public function getSetting($term, $default = '');

    /**
     * @return string
     */
    public function getInitials();

    /**
     * @return string
     */
    public function getEmail();

}