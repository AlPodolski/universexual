<?php

namespace App\Actions;

class GetSort
{
    private string $default = 'tarif_id DESC, sorting DESC';

    private string $priceDesc = 'price DESC';
    private string $priceAsc = 'price ASC';

    private string $ageAsc = 'age ASC';
    private string $ageDesc = 'age DESC';

    private string $vesAsc = 'ves ASC';
    private string $vesDesc = 'ves DESC';

    private string $grudAsc = 'breast ASC';
    private string $grudDesc = 'breast DESC';

    public function get($sort): string
    {
        switch ($sort) {

            case 'default':
                return $this->default;

            case 'price_asc':
                return $this->priceAsc;
            case 'price_desc':
                return $this->priceDesc;

            case 'age_asc':
                return $this->ageAsc;
            case 'age_desc':
                return $this->ageDesc;

            case 'ves_asc':
                return $this->vesAsc;
            case 'ves_desc':
                return $this->vesDesc;

            case 'breast_asc':
                return $this->grudAsc;
            case 'breast_desc':
                return $this->grudDesc;

        }

        return $this->default;

    }
}
