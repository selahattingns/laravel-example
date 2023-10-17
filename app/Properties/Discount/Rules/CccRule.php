<?php
namespace App\Properties\Discount\Rules;

use App\Properties\Discount\RuleInterface;
use App\Properties\Discount\RuleTypeSetting;

class CccRule extends RuleTypeSetting implements RuleInterface {

    /**
     * @var string
     */
    protected $type = "Ccc";
    /**
     * @var string
     */
    protected $description = "x ID'li kategoriden y veya daha fazla ürün satın alındığında, en ucuz ürüne %z indirim yapılır.";

    /**
     * @var string[]
     */
    protected $ruleValues = [
        "[1,2,20]"
    ];

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
