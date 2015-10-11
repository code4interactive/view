<?php
namespace Code4\View;

class View {

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