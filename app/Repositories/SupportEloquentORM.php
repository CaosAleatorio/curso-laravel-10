<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Models\Suporte;
use App\Repositories\{SupportRepositoryInterface};
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{


    public function __construct(
        protected Suporte $model
    ){}


    public function getAll(string $filter = null): Array 
    {
        return $this->model
                    ->where(function ($query) use ($filter){
                        if ($filter) {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%{$filter}%");
                        };
                    })
                    ->get()
                    ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $suporte = $this->model->find($id);
        if (!$suporte) {
            return null;
        }
        return (object) $suporte->toArray();
    }

    public function delete(string $id): void 
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto): stdClass 
    {
        $suporte = $this->model->create((array) $dto);
        return (object) $suporte->toArray();
    }
    
    public function update(UpdateSupportDTO $dto): stdClass|null 
    {
        if (!$suporte = $this->model->find($dto->id)) {
            return null;
        }

        $suporte->update((array) $dto);

        return (object) $suporte->toArray();
    }
}
