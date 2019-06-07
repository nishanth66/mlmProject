<?php

namespace App\Repositories;

use App\Models\pin;
use App\Repositories\BaseRepository;

/**
 * Class pinRepository
 * @package App\Repositories
 * @version June 6, 2019, 7:34 am UTC
*/

class pinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pin_id',
        'owner_id',
        'user_details',
        'assigned_user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pin::class;
    }
}
