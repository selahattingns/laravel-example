<?php
namespace App\Properties\Discount\Rules;

use App\Properties\Discount\RuleTypeSetting;

class CccRule extends RuleTypeSetting {

    /**
     * @var string
     */
    protected $type = "Ccc";
    /**
     * @var string
     */
    protected $description = "x ID'li kategoriden y veya daha fazla ürün satın alındığında, en ucuz ürüne %z indirim yapılır.";

    /**
     * @param $order
     * @return void
     */
    public function detectDiscountAndBindRule($order)
    {
        $rules = $this->getRules();
        foreach ($rules as $rule){
            $this->ruleDefinition($order->id, $rule->id);
        }
    }
}
