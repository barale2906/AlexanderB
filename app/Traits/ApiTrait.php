<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ApiTrait{

    //Con este scope se busca incluir en las colecciones las relaciones con otros modelos, según el allowIncluded que se defina
    public function scopeIncluded(Builder $query){

        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included')); 
        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }


    // Este scope se usara para realizar los filtros del caso, según los campos que se elijan en el allowFilter
    public function scopeFilter(Builder $query){
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                $query->where($filter, 'LIKE' , '%' . $value . '%');
            }
        }
    }

    // Con este scope lo que se busca es ordenar las colecciones según los campos definidos en el allowSort 
    public function scopeSort(Builder $query){
        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {
            
            $direction = 'asc';

            if (substr($sortField, 0, 1) == '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }

        }
    }

    // Para paginas las colecciones se diseño este scope
    public function scopeGetOrPaginate(Builder $query){
        if (request('perPage')) {
            $perPage = intval(request('perPage'));

            if ($perPage) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}