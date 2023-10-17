<?php
namespace App\Properties\Discount\Rules;

use App\Properties\Discount\RuleInterface;
use App\Properties\Discount\RuleTypeSetting;

class BbbRule extends RuleTypeSetting implements RuleInterface {

    /**
     * @var string
     */
    protected $type = "Bbb";
    /**
     * @var string
     */
    protected $description = "x ID'li kategoriye ait bir üründen y adet satın alındığında, z tanesi ücretsiz olarak verilir.";

    /**
     * @var string[]
     */
    protected $ruleValues = [
        "[2,6,1]"
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
