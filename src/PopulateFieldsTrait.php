<?php
namespace Code4\ViewElements;

trait PopulateFieldsTrait
{
    /**
     * Wypełnia przesłanymi danymi istniejące pola klasy
     * @param array $fieldsArray
     */
    protected function populateFields($fieldsArray = []) {
        foreach($fieldsArray as $field => $value) {
            if (property_exists($this, $field)) {
                $this->$field = $value;
            }
        }
    }
}