<?php
namespace App\Services;

use App\Interfaces\CustomerInterface;
class CustomerService {
    /**
     * @var CustomerInterface
     */
    public $customerRepository;

    /**
     * @param CustomerInterface $customerRepository
     */
    public function __construct(CustomerInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param $name
     * @param $since
     * @param $revenue
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($name, $since, $revenue){
        return $this->customerRepository->firstOrCreate($name, $since, $revenue);
    }
}
