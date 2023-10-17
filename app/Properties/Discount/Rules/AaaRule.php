<?php
namespace App\Properties\Discount\Rules;

use App\Properties\Discount\RuleInterface;
use App\Properties\Discount\RuleTypeSetting;

class AaaRule extends RuleTypeSetting implements RuleInterface {

    /**
     * @var string
     */
    protected $type = "Aaa";
    /**
     * @var string
     */
    protected $description = "Toplam x TL ve üzerinde alışveriş yapan bir müşteri, siparişin tamamından %y indirim kazanır";

    /**
     * @var string[]
     */
    protected $ruleValues = [
        "[1000,10]",
    ];

    /**
     * @param $order
     * @return void
     */
    public function detectDiscountAndBindRule($order)
    {
        /*
         *
         */
        $rules = $this->getRules();
        foreach ($rules as $rule){
            /*
             *
             */
            $this->ruleDefinition($order->id, $rule->id);
        }
    }
}
